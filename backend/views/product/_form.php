<?php

use common\models\CatalogAttribute;
use common\models\CatalogAttributeOption;
use common\models\CatalogCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CatalogProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalog-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?php
    $categories = CatalogCategory::find();
    $items = ArrayHelper::map($categories->all(), 'id', 'title');
    ?>

    <?= $form->field($model, 'catalog_category_id')->dropDownList($items, ['prompt' => '--Select Category--']) ?>

    <?= $form->field($model, 'imgUrl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?php
    $attributes = CatalogAttribute::find()->where(['catalog_category_id' => $model->catalog_category_id])->all();
    foreach ($attributes as $attribute) {
        $options = CatalogAttributeOption::find()->where(['catalog_attribute_id' => $attribute->id])->all();
        $optionsItems = ArrayHelper::map($options, 'id', 'title');
        echo $form->field($model, 'attr_' . $attribute->id)
            ->dropDownList($optionsItems, ['prompt' => '--Select ' . $attribute->title . '--'])
            ->label($attribute->title);
    }
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
