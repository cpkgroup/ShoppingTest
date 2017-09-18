<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "catalog_order".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $phone
 * @property string $address
 * @property string $email
 * @property string $notes
 * @property string $status
 *
 * @property User $customer
 * @property CatalogOrderItem[] $catalogOrderItems
 */
class CatalogOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'created_at', 'updated_at'], 'integer'],
            [['address', 'notes'], 'string'],
            [['phone', 'email', 'status'], 'string', 'max' => 255],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'phone' => 'Phone',
            'address' => 'Address',
            'email' => 'Email',
            'notes' => 'Notes',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(User::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogOrderItems()
    {
        return $this->hasMany(CatalogOrderItem::className(), ['catalog_order_id' => 'id']);
    }
}
