<?php

use common\models\CatalogCategory;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\BaseHtml;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\CatalogCategory */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-lg-6" style="padding: 5px;">
    <div style="padding: 5px; height: 250px; border: 1px solid #000">
        <h4><?= $model->title ?></h4>
        Model: <b><?= $model->model ?></b>
        <br>
        Price: <b><?= $model->price ?></b>
        <br>
        Category: <b><?= $model->getCatalogCategory()->one()->getAttribute('title') ?></b>
        <br>
        <?php
        $attributes = $model->getAttributeValues();
        foreach ($attributes as $attribute) {
            ?>
            <?= $attribute['attribute_value'] ?>: <b><?= $attribute['option_value'] ?></b>
            <br>
            <?php
        }
        ?>
        <?= $model->desc ?>
        <br>
        <?= Html::submitButton('Buy', ['class' => 'btn btn-success']) ?>
    </div>

</div>
