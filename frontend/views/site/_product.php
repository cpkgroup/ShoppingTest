<?php

use common\models\CatalogCategory;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\BaseHtml;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $product common\models\CatalogProduct */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-lg-6" style="padding: 5px;">
    <div style="padding: 5px; height: 250px; border: 1px solid #000">
        <h4><?= $product->title ?></h4>
        Model: <b><?= $product->model ?></b>
        <br>
        Price: <b><?= $product->price ?></b>
        <br>
        Category: <b><?= $product->getCatalogCategory()->one()->getAttribute('title') ?></b>
        <br>
        <?php
        $attributes = $product->getAttributeValues();
        foreach ($attributes as $attribute) {
            ?>
            <?= $attribute['attribute_value'] ?>: <b><?= $attribute['option_value'] ?></b>
            <br>
            <?php
        }
        ?>
        <?= $product->desc ?>
        <br>
        <?= Html::submitButton('Buy', ['class' => 'btn btn-success']) ?>
    </div>

</div>
