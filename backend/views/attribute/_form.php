<?php

use common\models\CatalogCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CatalogAttribute */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalog-attribute-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $categories = CatalogCategory::find();
    $items = ArrayHelper::map($categories->all(), 'id', 'title');
    ?>

    <?= $form->field($model, 'catalog_category_id')->dropDownList($items, ['prompt' => '--Select Category--']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
