/*
 Navicat Premium Data Transfer

 Source Server         : laravel
 Source Server Type    : MySQL
 Source Server Version : 50505
 Source Host           : 192.168.10.10
 Source Database       : bamilo

 Target Server Type    : MySQL
 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 09/19/2017 10:11:30 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `auth_assignment`
-- ----------------------------
BEGIN;
INSERT INTO `auth_assignment` VALUES ('Admin', '2', '1505733696');
COMMIT;

-- ----------------------------
--  Table structure for `auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `auth_item`
-- ----------------------------
BEGIN;
INSERT INTO `auth_item` VALUES ('/admin/*', '2', null, null, null, '1505733200', '1505733200'), ('/admin/assignment/*', '2', null, null, null, '1505733200', '1505733200'), ('/admin/assignment/assign', '2', null, null, null, '1505733200', '1505733200'), ('/admin/assignment/index', '2', null, null, null, '1505733199', '1505733199'), ('/admin/assignment/revoke', '2', null, null, null, '1505733200', '1505733200'), ('/admin/assignment/view', '2', null, null, null, '1505733199', '1505733199'), ('/admin/default/*', '2', null, null, null, '1505733200', '1505733200'), ('/admin/default/index', '2', null, null, null, '1505733200', '1505733200'), ('/admin/menu/*', '2', null, null, null, '1505733200', '1505733200'), ('/admin/menu/create', '2', null, null, null, '1505733200', '1505733200'), ('/admin/menu/delete', '2', null, null, null, '1505733200', '1505733200'), ('/admin/menu/index', '2', null, null, null, '1505733200', '1505733200'), ('/admin/menu/update', '2', null, null, null, '1505733200', '1505733200'), ('/admin/menu/view', '2', null, null, null, '1505733200', '1505733200'), ('/admin/permission/*', '2', null, null, null, '1505733200', '1505733200'), ('/admin/permission/assign', '2', null, null, null, '1505733200', '1505733200'), ('/admin/permission/create', '2', null, null, null, '1505733200', '1505733200'), ('/admin/permission/delete', '2', null, null, null, '1505733200', '1505733200'), ('/admin/permission/index', '2', null, null, null, '1505733200', '1505733200'), ('/admin/permission/remove', '2', null, null, null, '1505733200', '1505733200'), ('/admin/permission/update', '2', null, null, null, '1505733200', '1505733200'), ('/admin/permission/view', '2', null, null, null, '1505733200', '1505733200'), ('/admin/role/*', '2', null, null, null, '1505733200', '1505733200'), ('/admin/role/assign', '2', null, null, null, '1505733200', '1505733200'), ('/admin/role/create', '2', null, null, null, '1505733200', '1505733200'), ('/admin/role/delete', '2', null, null, null, '1505733200', '1505733200'), ('/admin/role/index', '2', null, null, null, '1505733200', '1505733200'), ('/admin/role/remove', '2', null, null, null, '1505733200', '1505733200'), ('/admin/role/update', '2', null, null, null, '1505733200', '1505733200'), ('/admin/role/view', '2', null, null, null, '1505733200', '1505733200'), ('/admin/route/*', '2', null, null, null, '1505733200', '1505733200'), ('/admin/route/assign', '2', null, null, null, '1505733200', '1505733200'), ('/admin/route/create', '2', null, null, null, '1505733200', '1505733200'), ('/admin/route/index', '2', null, null, null, '1505733200', '1505733200'), ('/admin/route/refresh', '2', null, null, null, '1505733200', '1505733200'), ('/admin/route/remove', '2', null, null, null, '1505733200', '1505733200'), ('/admin/rule/*', '2', null, null, null, '1505733200', '1505733200'), ('/admin/rule/create', '2', null, null, null, '1505733200', '1505733200'), ('/admin/rule/delete', '2', null, null, null, '1505733200', '1505733200'), ('/admin/rule/index', '2', null, null, null, '1505733200', '1505733200'), ('/admin/rule/update', '2', null, null, null, '1505733200', '1505733200'), ('/admin/rule/view', '2', null, null, null, '1505733200', '1505733200'), ('/admin/user/*', '2', null, null, null, '1505733200', '1505733200'), ('/admin/user/activate', '2', null, null, null, '1505733200', '1505733200'), ('/admin/user/change-password', '2', null, null, null, '1505733200', '1505733200'), ('/admin/user/delete', '2', null, null, null, '1505733200', '1505733200'), ('/admin/user/index', '2', null, null, null, '1505733200', '1505733200'), ('/admin/user/login', '2', null, null, null, '1505733200', '1505733200'), ('/admin/user/logout', '2', null, null, null, '1505733200', '1505733200'), ('/admin/user/request-password-reset', '2', null, null, null, '1505733200', '1505733200'), ('/admin/user/reset-password', '2', null, null, null, '1505733200', '1505733200'), ('/admin/user/signup', '2', null, null, null, '1505733200', '1505733200'), ('/admin/user/view', '2', null, null, null, '1505733200', '1505733200'), ('/attribute-option/*', '2', null, null, null, '1505767714', '1505767714'), ('/attribute-option/create', '2', null, null, null, '1505767714', '1505767714'), ('/attribute-option/delete', '2', null, null, null, '1505767714', '1505767714'), ('/attribute-option/index', '2', null, null, null, '1505767714', '1505767714'), ('/attribute-option/update', '2', null, null, null, '1505767714', '1505767714'), ('/attribute-option/view', '2', null, null, null, '1505767714', '1505767714'), ('/attribute/*', '2', null, null, null, '1505733210', '1505733210'), ('/attribute/create', '2', null, null, null, '1505733210', '1505733210'), ('/attribute/delete', '2', null, null, null, '1505733210', '1505733210'), ('/attribute/index', '2', null, null, null, '1505733210', '1505733210'), ('/attribute/update', '2', null, null, null, '1505733210', '1505733210'), ('/attribute/view', '2', null, null, null, '1505733210', '1505733210'), ('/category/*', '2', null, null, null, '1505734990', '1505734990'), ('/category/create', '2', null, null, null, '1505734990', '1505734990'), ('/category/delete', '2', null, null, null, '1505734990', '1505734990'), ('/category/index', '2', null, null, null, '1505734990', '1505734990'), ('/category/update', '2', null, null, null, '1505734990', '1505734990'), ('/category/view', '2', null, null, null, '1505734990', '1505734990'), ('/order/*', '2', null, null, null, '1505734990', '1505734990'), ('/order/create', '2', null, null, null, '1505734990', '1505734990'), ('/order/delete', '2', null, null, null, '1505734990', '1505734990'), ('/order/index', '2', null, null, null, '1505734990', '1505734990'), ('/order/update', '2', null, null, null, '1505734990', '1505734990'), ('/order/view', '2', null, null, null, '1505734990', '1505734990'), ('/product/*', '2', null, null, null, '1505734990', '1505734990'), ('/product/create', '2', null, null, null, '1505734990', '1505734990'), ('/product/delete', '2', null, null, null, '1505734990', '1505734990'), ('/product/index', '2', null, null, null, '1505734990', '1505734990'), ('/product/update', '2', null, null, null, '1505734990', '1505734990'), ('/product/view', '2', null, null, null, '1505734990', '1505734990'), ('Admin', '1', null, null, null, '1505713987', '1505767828');
COMMIT;

-- ----------------------------
--  Table structure for `auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `auth_item_child`
-- ----------------------------
BEGIN;
INSERT INTO `auth_item_child` VALUES ('Admin', '/admin/*'), ('Admin', '/admin/assignment/*'), ('Admin', '/admin/assignment/assign'), ('Admin', '/admin/assignment/index'), ('Admin', '/admin/assignment/revoke'), ('Admin', '/admin/assignment/view'), ('Admin', '/admin/default/*'), ('Admin', '/admin/default/index'), ('Admin', '/admin/menu/*'), ('Admin', '/admin/menu/create'), ('Admin', '/admin/menu/delete'), ('Admin', '/admin/menu/index'), ('Admin', '/admin/menu/update'), ('Admin', '/admin/menu/view'), ('Admin', '/admin/permission/*'), ('Admin', '/admin/permission/assign'), ('Admin', '/admin/permission/create'), ('Admin', '/admin/permission/delete'), ('Admin', '/admin/permission/index'), ('Admin', '/admin/permission/remove'), ('Admin', '/admin/permission/update'), ('Admin', '/admin/permission/view'), ('Admin', '/admin/role/*'), ('Admin', '/admin/role/assign'), ('Admin', '/admin/role/create'), ('Admin', '/admin/role/delete'), ('Admin', '/admin/role/index'), ('Admin', '/admin/role/remove'), ('Admin', '/admin/role/update'), ('Admin', '/admin/role/view'), ('Admin', '/admin/route/*'), ('Admin', '/admin/route/assign'), ('Admin', '/admin/route/create'), ('Admin', '/admin/route/index'), ('Admin', '/admin/route/refresh'), ('Admin', '/admin/route/remove'), ('Admin', '/admin/rule/*'), ('Admin', '/admin/rule/create'), ('Admin', '/admin/rule/delete'), ('Admin', '/admin/rule/index'), ('Admin', '/admin/rule/update'), ('Admin', '/admin/rule/view'), ('Admin', '/admin/user/*'), ('Admin', '/admin/user/activate'), ('Admin', '/admin/user/change-password'), ('Admin', '/admin/user/delete'), ('Admin', '/admin/user/index'), ('Admin', '/admin/user/login'), ('Admin', '/admin/user/logout'), ('Admin', '/admin/user/request-password-reset'), ('Admin', '/admin/user/reset-password'), ('Admin', '/admin/user/signup'), ('Admin', '/admin/user/view'), ('Admin', '/attribute-option/*'), ('Admin', '/attribute-option/create'), ('Admin', '/attribute-option/delete'), ('Admin', '/attribute-option/index'), ('Admin', '/attribute-option/update'), ('Admin', '/attribute-option/view'), ('Admin', '/attribute/*'), ('Admin', '/attribute/create'), ('Admin', '/attribute/delete'), ('Admin', '/attribute/index'), ('Admin', '/attribute/update'), ('Admin', '/attribute/view'), ('Admin', '/category/*'), ('Admin', '/category/create'), ('Admin', '/category/delete'), ('Admin', '/category/index'), ('Admin', '/category/update'), ('Admin', '/category/view'), ('Admin', '/order/*'), ('Admin', '/order/create'), ('Admin', '/order/delete'), ('Admin', '/order/index'), ('Admin', '/order/update'), ('Admin', '/order/view'), ('Admin', '/product/*'), ('Admin', '/product/create'), ('Admin', '/product/delete'), ('Admin', '/product/index'), ('Admin', '/product/update'), ('Admin', '/product/view');
COMMIT;

-- ----------------------------
--  Table structure for `auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `catalog_attribute`
-- ----------------------------
DROP TABLE IF EXISTS `catalog_attribute`;
CREATE TABLE `catalog_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog_category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-attribute-category_id-category-id` (`catalog_category_id`),
  CONSTRAINT `fk-attribute-category_id-category-id` FOREIGN KEY (`catalog_category_id`) REFERENCES `catalog_category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `catalog_attribute`
-- ----------------------------
BEGIN;
INSERT INTO `catalog_attribute` VALUES ('1', '2', 'Ram', 'Ram'), ('2', '2', 'Color', 'Color'), ('3', '2', 'Camera', 'Camera'), ('4', '5', 'Weight', 'Weight');
COMMIT;

-- ----------------------------
--  Table structure for `catalog_attribute_option`
-- ----------------------------
DROP TABLE IF EXISTS `catalog_attribute_option`;
CREATE TABLE `catalog_attribute_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog_attribute_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-attribute_option-attribute_id-attribute-id` (`catalog_attribute_id`),
  CONSTRAINT `fk-attribute_option-attribute_id-attribute-id` FOREIGN KEY (`catalog_attribute_id`) REFERENCES `catalog_attribute` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `catalog_attribute_option`
-- ----------------------------
BEGIN;
INSERT INTO `catalog_attribute_option` VALUES ('1', '1', '4 GB'), ('2', '1', '8 GB'), ('3', '1', '32 GB'), ('4', '1', '128 GB'), ('5', '2', 'Blue'), ('6', '2', 'Red'), ('7', '2', 'Yellow'), ('8', '3', '8 MP'), ('9', '3', '12 MP'), ('10', '3', '4 MP'), ('11', '4', '3 KG'), ('12', '4', '2 KG');
COMMIT;

-- ----------------------------
--  Table structure for `catalog_category`
-- ----------------------------
DROP TABLE IF EXISTS `catalog_category`;
CREATE TABLE `catalog_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-category-parent_id-category-id` (`parent_id`),
  CONSTRAINT `fk-category-parent_id-category-id` FOREIGN KEY (`parent_id`) REFERENCES `catalog_category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `catalog_category`
-- ----------------------------
BEGIN;
INSERT INTO `catalog_category` VALUES ('1', null, 'Mobile', 'Mobile'), ('2', '1', 'Nokia', 'Nokia'), ('3', '1', 'iPhone', 'iPhone'), ('4', null, 'Computer', null), ('5', '4', 'Lap top', null), ('6', '4', 'PC', null), ('7', '4', 'Game Computer', null);
COMMIT;

-- ----------------------------
--  Table structure for `catalog_order`
-- ----------------------------
DROP TABLE IF EXISTS `catalog_order`;
CREATE TABLE `catalog_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-order-customer_id-user-id` (`customer_id`),
  CONSTRAINT `fk-order-customer_id-user-id` FOREIGN KEY (`customer_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `catalog_order_item`
-- ----------------------------
DROP TABLE IF EXISTS `catalog_order_item`;
CREATE TABLE `catalog_order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog_order_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(19,4) DEFAULT NULL,
  `catalog_product_id` int(11) DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-order_item-order_id-order-id` (`catalog_order_id`),
  KEY `fk-order_item-product_id-product-id` (`catalog_product_id`),
  CONSTRAINT `fk-order_item-order_id-order-id` FOREIGN KEY (`catalog_order_id`) REFERENCES `catalog_order` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-order_item-product_id-product-id` FOREIGN KEY (`catalog_product_id`) REFERENCES `catalog_product` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `catalog_product`
-- ----------------------------
DROP TABLE IF EXISTS `catalog_product`;
CREATE TABLE `catalog_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catalog_category_id` int(11) DEFAULT NULL,
  `imgUrl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `attribute_values` longblob DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-product-category_id-category-id` (`catalog_category_id`),
  CONSTRAINT `fk-product-category_id-category-id` FOREIGN KEY (`catalog_category_id`) REFERENCES `catalog_category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `catalog_product`
-- ----------------------------
BEGIN;
INSERT INTO `catalog_product` VALUES ('1', 'Nokia 6620 classic', '6620', '2', '', 'Used for larting lusers or constructing things', '2000', null, null, 0x040300120000000300060023000c004300617474725f31617474725f32617474725f33213421362138), ('2', 'Laptop 15 inch', 'vaio', '5', '', 'Best laptop for buy now', '3000', '10', null, 0x040100060000000300617474725f34213132), ('3', 'Nokia 1520', '1520', '2', '', 'jhjh kajhs ljhsljh jhsk hakjhlkipo lk', '4500', '100', null, 0x040300120000000300060023000c004300617474725f31617474725f32617474725f33213321372139);
COMMIT;

-- ----------------------------
--  Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `menu`
-- ----------------------------
BEGIN;
INSERT INTO `menu` VALUES ('1', 'Permission', null, '/admin/assignment/index', '1', null), ('2', 'Users', null, '/admin/user/index', '2', null), ('3', 'Role', null, '/admin/role/index', '3', null), ('4', 'Shop', null, '/product/index', '0', null), ('5', 'Product', '4', '/product/index', '1', null), ('6', 'Attribute', '4', '/attribute/index', '3', null), ('7', 'Category', '4', '/category/index', '2', null), ('8', 'Orders List', '4', '/order/index', '5', null), ('9', 'Attribute Option', '4', '/attribute-option/index', '4', null);
COMMIT;

-- ----------------------------
--  Table structure for `migration`
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `migration`
-- ----------------------------
BEGIN;
INSERT INTO `migration` VALUES ('m000000_000000_base', '1505678848'), ('m130524_201442_init', '1505679027'), ('m140506_102106_rbac_init', '1505681317'), ('m140602_111327_create_menu_table', '1505681087'), ('m160312_050000_create_user', '1505681087'), ('m170918_065053_shop', '1505735281');
COMMIT;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `user`
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('1', 'mohammad', 'fhIswpBYnSDZ29r-bqOdncRn2Fu4nKV2', '$2y$13$7OYJmViByNgLW0eXFCVe/ujAmmlcbEaIhZnwY57P3bQ0K.Z4OKU.i', null, 'habibi.mh@gmail.com', '10', '1505679043', '1505679043'), ('2', 'admin', 'wEqtL7CxvVlWSczdEvDyhABPhk7dFHGP', '$2y$13$7OYJmViByNgLW0eXFCVe/ujAmmlcbEaIhZnwY57P3bQ0K.Z4OKU.i', null, 'habibi.mh@yandex.ru', '10', '1505712811', '1505712811');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
