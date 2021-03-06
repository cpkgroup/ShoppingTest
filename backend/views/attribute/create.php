<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CatalogAttribute */

$this->title = 'Create Attribute';
$this->params['breadcrumbs'][] = ['label' => 'Attributes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-attribute-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
