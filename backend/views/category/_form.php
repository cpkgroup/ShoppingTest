<?php

use common\models\CatalogCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CatalogCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalog-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $categories = CatalogCategory::find();
    if ($model->id) {
        $categories->where('id <> :id', [':id' => $model->id]);
    }
    $items = ArrayHelper::map($categories->all(), 'id', 'title');
    ?>

    <?= $form->field($model, 'parent_id')->dropDownList($items, ['prompt' => '--Select Category--']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
