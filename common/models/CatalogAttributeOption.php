<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "catalog_attribute_option".
 *
 * @property integer $id
 * @property integer $catalog_attribute_id
 * @property string $title
 *
 * @property CatalogAttribute $catalogAttribute
 */
class CatalogAttributeOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_attribute_option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catalog_attribute_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['catalog_attribute_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatalogAttribute::className(), 'targetAttribute' => ['catalog_attribute_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'catalog_attribute_id' => 'Attribute ID',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogAttribute()
    {
        return $this->hasOne(CatalogAttribute::className(), ['id' => 'catalog_attribute_id']);
    }
}
