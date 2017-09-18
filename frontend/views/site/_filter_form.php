<?php

use common\models\CatalogAttribute;
use common\models\CatalogAttributeOption;
use common\models\CatalogCategory;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\BaseHtml;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\CatalogCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$form = ActiveForm::begin([
    'options' => ['data' => ['pjax' => true]],
    'method' => 'get',
    'action' => ['site/index'],
]);
?>
    <h4>Categories</h4>
    <ul>
        <?php
        $categories = CatalogCategory::find()->where(['parent_id' => null])->all();
        $filter = Yii::$app->request->get('filter');
        $selectedCategories = isset($filter['categories']) ? $filter['categories'] : [];
        foreach ($categories as $category) {
            $subCategories = CatalogCategory::find()->where(['parent_id' => $category->id])->all();
            $subCategoriesItems = ArrayHelper::map($subCategories, 'id', 'title');
            ?>
            <i><?= $category->title ?></i><br>
            <?= BaseHtml::checkboxList('filter[categories]', $selectedCategories, $subCategoriesItems) ?>
            <br>
            <?php
        }
        ?>
    </ul>

    <h4>Attributes</h4>
    <ul>
        <?php
        $attributes = CatalogAttribute::find()->all();
        $selectedAttributes = isset($filter['attributes']) ? $filter['attributes'] : [];
        foreach ($attributes as $attribute) {
            $selectedOptions = isset($selectedAttributes[$attribute->id]) ? $selectedAttributes[$attribute->id] : [];
            $options = CatalogAttributeOption::find()->where(['catalog_attribute_id' => $attribute->id])->all();
            $optionsItems = ArrayHelper::map($options, 'id', 'title');
            ?>
            <i><?= $attribute->title ?></i><br>
            <?= BaseHtml::checkboxList('filter[attributes][' . $attribute->id . ']', $selectedOptions, $optionsItems) ?>
            <br>
            <?php
        }
        ?>
    </ul>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>