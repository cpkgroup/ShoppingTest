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

        $this->createTable('{{%catalog_category}}', [
            'id' => Schema::TYPE_PK,
            'parent_id' => Schema::TYPE_INTEGER,
            'title' => Schema::TYPE_STRING,
            'desc' => Schema::TYPE_STRING,
        ], $tableOptions);
        $this->addForeignKey('fk-category-parent_id-category-id', '{{%catalog_category}}', 'parent_id', '{{%catalog_category}}', 'id', 'CASCADE');
        $this->createTable('{{%catalog_product}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING,
            'model' => Schema::TYPE_STRING,
            'catalog_category_id' => Schema::TYPE_INTEGER,
            'imgUrl' => Schema::TYPE_STRING,
            'desc' => Schema::TYPE_TEXT,
            'price' => Schema::TYPE_INTEGER,
            'stock' => Schema::TYPE_INTEGER,
            'status' => Schema::TYPE_SMALLINT,
            'attribute_values' => 'LONGBLOB',
        ], $tableOptions);
        $this->addForeignKey('fk-product-category_id-category-id', '{{%catalog_product}}', 'catalog_category_id', '{{%catalog_category}}', 'id', 'CASCADE');
        $this->createTable('{{%catalog_attribute}}', [
            'id' => Schema::TYPE_PK,
            'catalog_category_id' => Schema::TYPE_INTEGER,
            'title' => Schema::TYPE_STRING,
            'desc' => Schema::TYPE_STRING,
        ], $tableOptions);
        $this->addForeignKey('fk-attribute-category_id-category-id', '{{%catalog_attribute}}', 'catalog_category_id', '{{%catalog_category}}', 'id', 'CASCADE');
        $this->createTable('{{%catalog_attribute_option}}', [
            'id' => Schema::TYPE_PK,
            'catalog_attribute_id' => Schema::TYPE_INTEGER,
            'title' => Schema::TYPE_STRING,
        ], $tableOptions);
        $this->addForeignKey('fk-attribute_option-attribute_id-attribute-id', '{{%catalog_attribute_option}}', 'catalog_attribute_id', '{{%catalog_attribute}}', 'id', 'CASCADE');
        $this->createTable('{{%catalog_order}}', [
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
        $this->addForeignKey('fk-order-customer_id-user-id', '{{%catalog_order}}', 'customer_id', '{{%user}}', 'id', 'CASCADE');
        $this->createTable('{{%catalog_order_item}}', [
            'id' => Schema::TYPE_PK,
            'catalog_order_id' => Schema::TYPE_INTEGER,
            'title' => Schema::TYPE_STRING,
            'price' => Schema::TYPE_MONEY,
            'catalog_product_id' => Schema::TYPE_INTEGER,
            'quantity' => Schema::TYPE_FLOAT,
        ], $tableOptions);
        $this->addForeignKey('fk-order_item-order_id-order-id', '{{%catalog_order_item}}', 'catalog_order_id', '{{%catalog_order}}', 'id', 'CASCADE');
        $this->addForeignKey('fk-order_item-product_id-product-id', '{{%catalog_order_item}}', 'catalog_product_id', '{{%catalog_product}}', 'id', 'SET NULL');
    }

    public function down()
    {
        $this->dropTable('{{%catalog_order_item}}');
        $this->dropTable('{{%catalog_order}}');
        $this->dropTable('{{%catalog_attribute_option}}');
        $this->dropTable('{{%catalog_attribute}}');
        $this->dropTable('{{%catalog_product}}');
        $this->dropTable('{{%catalog_category}}');
    }
}
