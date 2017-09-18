<?php

use common\models\CatalogAttribute;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CatalogAttributeOption */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalog-attribute-option-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $categories = CatalogAttribute::find();
    $items = ArrayHelper::map($categories->all(), 'id', 'title');
    ?>

    <?= $form->field($model, 'catalog_attribute_id')->dropDownList($items, ['prompt' => '--Select Attribute--']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
