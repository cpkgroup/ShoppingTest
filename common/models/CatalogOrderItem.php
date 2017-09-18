<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "catalog_order_item".
 *
 * @property integer $id
 * @property integer $catalog_order_id
 * @property string $title
 * @property string $price
 * @property integer $catalog_product_id
 * @property double $quantity
 *
 * @property CatalogOrder $catalogOrder
 * @property CatalogProduct $catalogProduct
 */
class CatalogOrderItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_order_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catalog_order_id', 'catalog_product_id'], 'integer'],
            [['price', 'quantity'], 'number'],
            [['title'], 'string', 'max' => 255],
            [['catalog_order_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatalogOrder::className(), 'targetAttribute' => ['catalog_order_id' => 'id']],
            [['catalog_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatalogProduct::className(), 'targetAttribute' => ['catalog_product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'catalog_order_id' => 'Order ID',
            'title' => 'Title',
            'price' => 'Price',
            'catalog_product_id' => 'Product ID',
            'quantity' => 'Quantity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogOrder()
    {
        return $this->hasOne(CatalogOrder::className(), ['id' => 'catalog_order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogProduct()
    {
        return $this->hasOne(CatalogProduct::className(), ['id' => 'catalog_product_id']);
    }
}
