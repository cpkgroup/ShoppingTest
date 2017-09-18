<?php

use yii\db\Migration;
use yii\db\Schema;

class m170918_065053_shop extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%category}}', [
            'id' => Schema::TYPE_PK,
            'parent_id' => Schema::TYPE_INTEGER,
            'title' => Schema::TYPE_STRING,
            'desc' => Schema::TYPE_STRING,
        ], $tableOptions);
        $this->addForeignKey('fk-category-parent_id-category-id', '{{%category}}', 'parent_id', '{{%category}}', 'id', 'CASCADE');
        $this->createTable('{{%product}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING,
            'category_id' => Schema::TYPE_INTEGER,
            'imgUrl' => Schema::TYPE_STRING,
            'desc' => Schema::TYPE_TEXT,
            'price' => Schema::TYPE_INTEGER,
            'stock' => Schema::TYPE_INTEGER,
            'status' => Schema::TYPE_SMALLINT,
            'attributes' => 'LONGBLOB',
        ], $tableOptions);
        $this->addForeignKey('fk-product-category_id-category-id', '{{%product}}', 'category_id', '{{%category}}', 'id', 'CASCADE');
        $this->createTable('{{%attribute}}', [
            'id' => Schema::TYPE_PK,
            'category_id' => Schema::TYPE_INTEGER,
            'title' => Schema::TYPE_STRING,
            'desc' => Schema::TYPE_STRING,
        ], $tableOptions);
        $this->addForeignKey('fk-attribute-category_id-category-id', '{{%attribute}}', 'category_id', '{{%category}}', 'id', 'CASCADE');
        $this->createTable('{{%attribute_option}}', [
            'id' => Schema::TYPE_PK,
            'attribute_id' => Schema::TYPE_INTEGER,
            'title' => Schema::TYPE_STRING,
        ], $tableOptions);
        $this->addForeignKey('fk-attribute_option-attribute_id-attribute-id', '{{%attribute_option}}', 'attribute_id', '{{%attribute}}', 'id', 'CASCADE');
        $this->createTable('{{%order}}', [
            'id' => Schema::TYPE_PK,
            'customer_id' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
            'phone' => Schema::TYPE_STRING,
            'address' => Schema::TYPE_TEXT,
            'email' => Schema::TYPE_STRING,
            'notes' => Schema::TYPE_TEXT,
            'status' => Schema::TYPE_STRING,
        ], $tableOptions);
        $this->addForeignKey('fk-order-customer_id-user-id', '{{%order}}', 'customer_id', '{{%user}}', 'id', 'CASCADE');
        $this->createTable('{{%order_item}}', [
            'id' => Schema::TYPE_PK,
            'order_id' => Schema::TYPE_INTEGER,
            'title' => Schema::TYPE_STRING,
            'price' => Schema::TYPE_MONEY,
            'product_id' => Schema::TYPE_INTEGER,
            'quantity' => Schema::TYPE_FLOAT,
        ], $tableOptions);
        $this->addForeignKey('fk-order_item-order_id-order-id', '{{%order_item}}', 'order_id', '{{%order}}', 'id', 'CASCADE');
        $this->addForeignKey('fk-order_item-product_id-product-id', '{{%order_item}}', 'product_id', '{{%product}}', 'id', 'SET NULL');
    }

    public function down()
    {
        $this->dropTable('{{%order_item}}');
        $this->dropTable('{{%order}}');
        $this->dropTable('{{%attribute_option}}');
        $this->dropTable('{{%attribute}}');
        $this->dropTable('{{%product}}');
        $this->dropTable('{{%category}}');
    }
}
