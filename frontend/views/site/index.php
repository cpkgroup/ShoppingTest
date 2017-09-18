<?php

/* @var $this yii\web\View */

use yii\widgets\Pjax;
use yii\widgets\LinkPager;

$this->title = 'Bamilo Test Frontend Products';
?>
<?php
Pjax::begin([
    // Pjax options
]);
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-lg-9">
                <h2>Products</h2>

                <div class="row">
                    <?php
                    foreach ($products as $product) {
                        echo $this->render('_product', [
                            'product' => $product
                        ]);
                    }
                    ?>
                </div>

                <div class="row">
                    <?php
                    echo LinkPager::widget([
                        'pagination' => $pagination,
                    ]);
                    ?>
                </div>
            </div>
            <div class="col-lg-3">
                <h2>Filtering</h2>
                <?= $this->render('_filter_form') ?>
            </div>
        </div>

    </div>
</div>
<?php Pjax::end(); ?>
