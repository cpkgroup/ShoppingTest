<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "catalog_category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property string $desc
 *
 * @property CatalogAttribute[] $catalogAttributes
 * @property CatalogCategory $parent
 * @property CatalogCategory[] $catalogCategories
 * @property CatalogProduct[] $catalogProducts
 */
class CatalogCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['title', 'desc'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatalogCategory::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'title' => 'Title',
            'desc' => 'Desc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogAttributes()
    {
        return $this->hasMany(CatalogAttribute::className(), ['catalog_category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(CatalogCategory::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogCategories()
    {
        return $this->hasMany(CatalogCategory::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogProducts()
    {
        return $this->hasMany(CatalogProduct::className(), ['catalog_category_id' => 'id']);
    }
}
