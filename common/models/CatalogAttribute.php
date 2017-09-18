<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "catalog_attribute".
 *
 * @property integer $id
 * @property integer $catalog_category_id
 * @property string $title
 * @property string $desc
 *
 * @property CatalogCategory $catalogCategory
 * @property CatalogAttributeOption[] $catalogAttributeOptions
 */
class CatalogAttribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_attribute';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catalog_category_id'], 'integer'],
            [['title', 'desc'], 'string', 'max' => 255],
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
            'catalog_category_id' => 'Catalog Category ID',
            'title' => 'Title',
            'desc' => 'Desc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogCategory()
    {
        return $this->hasOne(CatalogCategory::className(), ['id' => 'catalog_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogAttributeOptions()
    {
        return $this->hasMany(CatalogAttributeOption::className(), ['catalog_attribute_id' => 'id']);
    }
}
