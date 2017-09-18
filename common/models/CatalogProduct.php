<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "catalog_product".
 *
 * @property integer $id
 * @property string $title
 * @property integer $catalog_category_id
 * @property string $imgUrl
 * @property string $desc
 * @property integer $price
 * @property integer $stock
 * @property integer $status
 * @property resource $attribute_values
 *
 * @property CatalogOrderItem[] $catalogOrderItems
 * @property CatalogCategory $catalogCategory
 */
class CatalogProduct extends \spinitron\dynamicAr\DynamicActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_product';
    }

    /**
     * @return string
     */
    public static function dynamicColumn()
    {
        return 'attribute_values';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catalog_category_id', 'price', 'stock', 'status'], 'integer'],
            [['desc', 'attribute_values'], 'string'],
            [['title', 'model', 'imgUrl'], 'string', 'max' => 255],
            [['catalog_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatalogCategory::className(), 'targetAttribute' => ['catalog_category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'model' => 'Model',
            'catalog_category_id' => 'Category ID',
            'imgUrl' => 'Img Url',
            'desc' => 'Desc',
            'price' => 'Price',
            'stock' => 'Stock',
            'status' => 'Status',
            'attribute_values' => 'Attribute Values',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogOrderItems()
    {
        return $this->hasMany(CatalogOrderItem::className(), ['catalog_product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogCategory()
    {
        return $this->hasOne(CatalogCategory::className(), ['id' => 'catalog_category_id']);
    }
}
