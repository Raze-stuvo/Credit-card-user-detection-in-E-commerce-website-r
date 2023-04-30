# HeidiSQL Dump 
#
# --------------------------------------------------------
# Host:                         127.0.0.1
# Database:                     shop
# Server version:               5.1.53-community-log
# Server OS:                    Win64
# Target compatibility:         ANSI SQL
# HeidiSQL version:             4.0
# Date/time:                    2018-02-27 12:41:52
# --------------------------------------------------------

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ANSI,NO_BACKSLASH_ESCAPES';*/
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;*/


#
# Database structure for database 'shop'
#

CREATE DATABASE /*!32312 IF NOT EXISTS*/ "shop" /*!40100 DEFAULT CHARACTER SET latin1 */;

USE "shop";


#
# Table structure for table 'category'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ "category" (
  "id" int(11) NOT NULL AUTO_INCREMENT,
  "category" varchar(200) NOT NULL,
  "status" int(11) NOT NULL,
  PRIMARY KEY ("id")
) AUTO_INCREMENT=47;



#
# Dumping data for table 'category'
#

LOCK TABLES "category" WRITE;
/*!40000 ALTER TABLE "category" DISABLE KEYS;*/
REPLACE INTO "category" ("id", "category", "status") VALUES
	(1,'Computers',0);
REPLACE INTO "category" ("id", "category", "status") VALUES
	(2,'Labtops',0);
REPLACE INTO "category" ("id", "category", "status") VALUES
	(3,'Camaras',0);
REPLACE INTO "category" ("id", "category", "status") VALUES
	(4,'TVs',0);
REPLACE INTO "category" ("id", "category", "status") VALUES
	(5,'Dress',0);
REPLACE INTO "category" ("id", "category", "status") VALUES
	(6,'Books',0);
REPLACE INTO "category" ("id", "category", "status") VALUES
	(7,'Mobile Accessories',0);
REPLACE INTO "category" ("id", "category", "status") VALUES
	(8,'Computer Accessories',0);
REPLACE INTO "category" ("id", "category", "status") VALUES
	(45,'DVD',0);
REPLACE INTO "category" ("id", "category", "status") VALUES
	(46,'asdf',0);
/*!40000 ALTER TABLE "category" ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'contact_use'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ "contact_use" (
  "id" int(11) NOT NULL AUTO_INCREMENT,
  "first_name" varchar(150) NOT NULL,
  "last_name" varchar(150) NOT NULL,
  "email_id" varchar(100) NOT NULL,
  "subject" varchar(150) NOT NULL,
  "comments" varchar(255) NOT NULL,
  "mobile" int(11) NOT NULL,
  "status" int(11) NOT NULL,
  PRIMARY KEY ("id")
) AUTO_INCREMENT=2;



#
# Dumping data for table 'contact_use'
#

LOCK TABLES "contact_use" WRITE;
/*!40000 ALTER TABLE "contact_use" DISABLE KEYS;*/
REPLACE INTO "contact_use" ("id", "first_name", "last_name", "email_id", "subject", "comments", "mobile", "status") VALUES
	(1,'admin','asfadf','admin@admin.com','sfawf','dgs ag',111111,0);
/*!40000 ALTER TABLE "contact_use" ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'sub_category'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ "sub_category" (
  "id" int(11) NOT NULL AUTO_INCREMENT,
  "category_id" int(11) NOT NULL,
  "name" varchar(255) NOT NULL,
  "status" int(11) NOT NULL,
  PRIMARY KEY ("id")
) AUTO_INCREMENT=74;



#
# Dumping data for table 'sub_category'
#

LOCK TABLES "sub_category" WRITE;
/*!40000 ALTER TABLE "sub_category" DISABLE KEYS;*/
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(1,1,'Acer',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(2,1,'Hp',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(3,1,'Compac',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(4,1,'Ups',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(5,2,'HP',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(6,1,'Lenova',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(7,2,'Lenova',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(8,2,'Dell',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(66,8,'DVD writer',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(65,8,'RAM',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(64,8,'Hard disk',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(63,7,'Blue tooth',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(62,7,'Hear Phone',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(61,7,'Display',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(23,2,'Sony',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(24,2,'Acer',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(25,2,'Samsung',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(26,2,'HCL',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(27,2,'Toshiba',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(60,7,'Covers',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(59,7,'Panels',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(30,9,' Mobile Accessories',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(31,9,' Mobile Service',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(32,9,' Mobile Sales',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(33,3,'Hp',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(34,3,'Lenovo',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(35,3,'Samsung',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(36,3,'Sony',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(37,3,'HCL',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(38,3,'Cannon',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(39,3,'Tosiba',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(40,3,'Visa Consultants',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(58,7,'Memory cards',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(57,7,'Charger',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(56,5,'Kids',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(55,5,'Ladies',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(54,5,'Gents',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(53,6,'Books',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(47,0,'',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(48,4,'Samsung',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(49,3,'Onida',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(50,4,'Videocon',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(51,4,'Sunsui',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(52,4,'Toshiba',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(67,8,'Monitor',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(68,8,'Cabinet',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(69,8,'SMPS',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(70,8,'Keyboard',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(71,8,'Mouse',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(72,45,'3D',0);
REPLACE INTO "sub_category" ("id", "category_id", "name", "status") VALUES
	(73,45,'Blueray',0);
/*!40000 ALTER TABLE "sub_category" ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'tab_adds'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ "tab_adds" (
  "id" int(11) NOT NULL AUTO_INCREMENT,
  "added_by" int(11) NOT NULL,
  "category" int(11) NOT NULL,
  "sub_category" int(11) NOT NULL,
  "title" varchar(150) NOT NULL,
  "description" varchar(255) NOT NULL,
  "created_at" varchar(100) NOT NULL,
  "updated_at" varchar(100) NOT NULL,
  "upload1" varchar(255) NOT NULL,
  "upload2" varchar(255) NOT NULL,
  "upload3" varchar(255) NOT NULL,
  "upload4" varchar(255) NOT NULL,
  "start_amt" float(15,2) NOT NULL,
  "no_of_bids" int(11) NOT NULL,
  "bid_end_date" date NOT NULL,
  "status" int(11) NOT NULL,
  PRIMARY KEY ("id")
) AUTO_INCREMENT=15;



#
# Dumping data for table 'tab_adds'
#

LOCK TABLES "tab_adds" WRITE;
/*!40000 ALTER TABLE "tab_adds" DISABLE KEYS;*/
REPLACE INTO "tab_adds" ("id", "added_by", "category", "sub_category", "title", "description", "created_at", "updated_at", "upload1", "upload2", "upload3", "upload4", "start_amt", "no_of_bids", "bid_end_date", "status") VALUES
	(1,2,1,1,' Gateway NE56R Laptop (2nd Gen PDC/ 2GB/ 500GB)','2 Years Warranty ( 1st Year International Travellers Warranty and 2nd Year India Carry-in Warranty) Acer India Warranty and Free Transit Insurance. ','1346871473','1373224681','1','1','1','1','25234',1,'2013-07-08',0);
REPLACE INTO "tab_adds" ("id", "added_by", "category", "sub_category", "title", "description", "created_at", "updated_at", "upload1", "upload2", "upload3", "upload4", "start_amt", "no_of_bids", "bid_end_date", "status") VALUES
	(5,1,2,5,'HP labtobs 15','HP labtobs 15"','1346871473','1373127701','','','','','20000',0,'2013-07-06',0);
REPLACE INTO "tab_adds" ("id", "added_by", "category", "sub_category", "title", "description", "created_at", "updated_at", "upload1", "upload2", "upload3", "upload4", "start_amt", "no_of_bids", "bid_end_date", "status") VALUES
	(6,1,2,24,'Acer Aspire E1 571G Laptop','1 Year Complete Cover Warranty Acer India Warranty and Free Transit Insurance. ','1373224776','','1.jpeg','2.jpeg','','','30000',0,'2013-07-08',0);
REPLACE INTO "tab_adds" ("id", "added_by", "category", "sub_category", "title", "description", "created_at", "updated_at", "upload1", "upload2", "upload3", "upload4", "start_amt", "no_of_bids", "bid_end_date", "status") VALUES
	(7,1,2,8,'Dell Vostro 2520 Laptop','1 Year Complete Cover Onsite Warranty','1373225151','','3.jpeg','','','','33000',0,'2013-07-08',0);
REPLACE INTO "tab_adds" ("id", "added_by", "category", "sub_category", "title", "description", "created_at", "updated_at", "upload1", "upload2", "upload3", "upload4", "start_amt", "no_of_bids", "bid_end_date", "status") VALUES
	(8,1,3,38,'Canon EOS 7D 18 MP DSLR ','Designed for pros and semi-pros alike, the Canon EOS 7D 18 MP DSLR Camera (18 - 135mm) is a high-performance digital SLR camera. It features the resolving power of an 18-megapixel APS-C format CMOS sensor and dual DIGIC 4 image processors that enable 8 fr','1397068953','1397070282','','','','','110575',0,'2014-04-10',0);
REPLACE INTO "tab_adds" ("id", "added_by", "category", "sub_category", "title", "description", "created_at", "updated_at", "upload1", "upload2", "upload3", "upload4", "start_amt", "no_of_bids", "bid_end_date", "status") VALUES
	(9,1,3,33,'HP EOS 7D 18 MP DSLR','Designed for pros and semi-pros alike, the Canon EOS 7D 18 MP DSLR Camera (18 - 135mm) is a high-performance digital SLR camera. It features the resolving power of an 18-megapixel APS-C format CMOS sensor and dual DIGIC 4 image processors that enable 8 fr','1397070348','','','1','1','1','110500',0,'2014-04-10',0);
REPLACE INTO "tab_adds" ("id", "added_by", "category", "sub_category", "title", "description", "created_at", "updated_at", "upload1", "upload2", "upload3", "upload4", "start_amt", "no_of_bids", "bid_end_date", "status") VALUES
	(10,1,1,2,'HP Desktop','HP Desktop
Dual Core Processorccc ','1397147177','1397149182','','','','','23020',0,'2014-04-10',0);
REPLACE INTO "tab_adds" ("id", "added_by", "category", "sub_category", "title", "description", "created_at", "updated_at", "upload1", "upload2", "upload3", "upload4", "start_amt", "no_of_bids", "bid_end_date", "status") VALUES
	(11,1,8,64,'Hard disk','hard disk','1397149229','','','','','','5000',0,'2014-04-10',0);
REPLACE INTO "tab_adds" ("id", "added_by", "category", "sub_category", "title", "description", "created_at", "updated_at", "upload1", "upload2", "upload3", "upload4", "start_amt", "no_of_bids", "bid_end_date", "status") VALUES
	(12,1,1,3,'campac kumaresan ','campac kumaresan campac kumaresan campac kumaresan campac kumaresan campac kumaresan campac kumaresan ','1397288110','','','','','','4444',0,'2014-04-12',0);
REPLACE INTO "tab_adds" ("id", "added_by", "category", "sub_category", "title", "description", "created_at", "updated_at", "upload1", "upload2", "upload3", "upload4", "start_amt", "no_of_bids", "bid_end_date", "status") VALUES
	(13,1,45,73,'sony','sony video player','1431676953','','','','','','5999',0,'2015-05-15',0);
REPLACE INTO "tab_adds" ("id", "added_by", "category", "sub_category", "title", "description", "created_at", "updated_at", "upload1", "upload2", "upload3", "upload4", "start_amt", "no_of_bids", "bid_end_date", "status") VALUES
	(14,1,1,2,'hp laptop','hp laptop','1517563040','','','','','','50000',0,'2018-02-02',0);
/*!40000 ALTER TABLE "tab_adds" ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'tab_bid_history'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ "tab_bid_history" (
  "add_id" int(11) NOT NULL,
  "user_id" int(11) NOT NULL,
  "bid_amt" double NOT NULL,
  "added_at" varchar(100) NOT NULL,
  KEY "add_id" ("add_id"),
  KEY "user_id" ("user_id")
);



#
# Dumping data for table 'tab_bid_history'
#

LOCK TABLES "tab_bid_history" WRITE;
/*!40000 ALTER TABLE "tab_bid_history" DISABLE KEYS;*/
REPLACE INTO "tab_bid_history" ("add_id", "user_id", "bid_amt", "added_at") VALUES
	(1,2,'0','1373224111');
REPLACE INTO "tab_bid_history" ("add_id", "user_id", "bid_amt", "added_at") VALUES
	(7,2,'0','1397068268');
REPLACE INTO "tab_bid_history" ("add_id", "user_id", "bid_amt", "added_at") VALUES
	(1,1,'0','1397149108');
REPLACE INTO "tab_bid_history" ("add_id", "user_id", "bid_amt", "added_at") VALUES
	(11,1,'0','1397197583');
/*!40000 ALTER TABLE "tab_bid_history" ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'tab_cart'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ "tab_cart" (
  "id" int(11) NOT NULL AUTO_INCREMENT,
  "pro_id" int(11) NOT NULL,
  "user_id" int(11) NOT NULL,
  "quanity" int(11) NOT NULL,
  "added_at" varchar(100) NOT NULL,
  PRIMARY KEY ("id")
) AUTO_INCREMENT=10;



#
# Dumping data for table 'tab_cart'
#

LOCK TABLES "tab_cart" WRITE;
/*!40000 ALTER TABLE "tab_cart" DISABLE KEYS;*/
REPLACE INTO "tab_cart" ("id", "pro_id", "user_id", "quanity", "added_at") VALUES
	(9,5,10,1,'1519715487');
/*!40000 ALTER TABLE "tab_cart" ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'tab_checkout'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ "tab_checkout" (
  "id" int(11) NOT NULL AUTO_INCREMENT,
  "user_id" int(11) NOT NULL,
  "first_name" varchar(255) NOT NULL,
  "last_name" varchar(255) NOT NULL,
  "address" varchar(255) NOT NULL,
  "city" varchar(150) NOT NULL,
  "state" varchar(150) NOT NULL,
  "country" varchar(150) NOT NULL,
  "mobile" int(11) NOT NULL,
  "phone" int(11) NOT NULL,
  "created_at" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  "delivered_at" varchar(100) NOT NULL DEFAULT '',
  "status" int(11) NOT NULL,
  PRIMARY KEY ("id")
) AUTO_INCREMENT=6;



#
# Dumping data for table 'tab_checkout'
#

LOCK TABLES "tab_checkout" WRITE;
/*!40000 ALTER TABLE "tab_checkout" DISABLE KEYS;*/
REPLACE INTO "tab_checkout" ("id", "user_id", "first_name", "last_name", "address", "city", "state", "country", "mobile", "phone", "created_at", "delivered_at", "status") VALUES
	(1,9,'r','r','cbe','cbe','tn','in',2147483647,2147483647,'2015-05-15 13:25:03','2015-05-15 13:32:39',1);
REPLACE INTO "tab_checkout" ("id", "user_id", "first_name", "last_name", "address", "city", "state", "country", "mobile", "phone", "created_at", "delivered_at", "status") VALUES
	(2,10,'ravi','kumar','cbe','cbe','tn','in',2147483647,2147483647,'2015-05-15 13:34:49','2015-05-15 13:35:43',1);
REPLACE INTO "tab_checkout" ("id", "user_id", "first_name", "last_name", "address", "city", "state", "country", "mobile", "phone", "created_at", "delivered_at", "status") VALUES
	(3,10,'ravi','kumar','cbe','cbe','tn','in',2147483647,2147483647,'2018-02-02 14:51:43','',0);
REPLACE INTO "tab_checkout" ("id", "user_id", "first_name", "last_name", "address", "city", "state", "country", "mobile", "phone", "created_at", "delivered_at", "status") VALUES
	(4,11,'nanda','kumar','nanda','cbe','tn','ind',2147483647,2147483647,'2018-02-06 23:42:11','',0);
REPLACE INTO "tab_checkout" ("id", "user_id", "first_name", "last_name", "address", "city", "state", "country", "mobile", "phone", "created_at", "delivered_at", "status") VALUES
	(5,10,'ravi','kumar','cbe','cbe','tn','in',2147483647,2147483647,'2018-02-27 12:19:06','',0);
/*!40000 ALTER TABLE "tab_checkout" ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'tab_orders'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ "tab_orders" (
  "check_id" int(11) NOT NULL,
  "user_id" int(11) NOT NULL,
  "category" int(11) NOT NULL,
  "sub_category" int(11) NOT NULL,
  "title" varchar(150) NOT NULL,
  "description" varchar(255) NOT NULL,
  "created_at" varchar(100) NOT NULL,
  "quanity" int(11) NOT NULL,
  "price" float(15,2) NOT NULL,
  "status" int(11) NOT NULL
);



#
# Dumping data for table 'tab_orders'
#

LOCK TABLES "tab_orders" WRITE;
/*!40000 ALTER TABLE "tab_orders" DISABLE KEYS;*/
REPLACE INTO "tab_orders" ("check_id", "user_id", "category", "sub_category", "title", "description", "created_at", "quanity", "price", "status") VALUES
	(1,9,1,3,'campac kumaresan ','campac kumaresan campac kumaresan campac kumaresan campac kumaresan campac kumaresan campac kumaresan ','1431676504',2,'4444',0);
REPLACE INTO "tab_orders" ("check_id", "user_id", "category", "sub_category", "title", "description", "created_at", "quanity", "price", "status") VALUES
	(0,9,1,3,'campac kumaresan ','campac kumaresan campac kumaresan campac kumaresan campac kumaresan campac kumaresan campac kumaresan ','1431676540',2,'4444',0);
REPLACE INTO "tab_orders" ("check_id", "user_id", "category", "sub_category", "title", "description", "created_at", "quanity", "price", "status") VALUES
	(2,10,45,73,'sony','sony video player','1431677089',1,'5999',0);
REPLACE INTO "tab_orders" ("check_id", "user_id", "category", "sub_category", "title", "description", "created_at", "quanity", "price", "status") VALUES
	(0,10,45,73,'sony','sony video player','1431677416',1,'5999',0);
REPLACE INTO "tab_orders" ("check_id", "user_id", "category", "sub_category", "title", "description", "created_at", "quanity", "price", "status") VALUES
	(3,10,1,2,'hp laptop','hp laptop','1517563303',1,'50000',0);
REPLACE INTO "tab_orders" ("check_id", "user_id", "category", "sub_category", "title", "description", "created_at", "quanity", "price", "status") VALUES
	(0,10,1,1,' Gateway NE56R Laptop (2nd Gen PDC/ 2GB/ 500GB)','2 Years Warranty ( 1st Year International Travellers Warranty and 2nd Year India Carry-in Warranty) Acer India Warranty and Free Transit Insurance. ','1517930455',1,'25234',0);
REPLACE INTO "tab_orders" ("check_id", "user_id", "category", "sub_category", "title", "description", "created_at", "quanity", "price", "status") VALUES
	(0,11,1,1,' Gateway NE56R Laptop (2nd Gen PDC/ 2GB/ 500GB)','2 Years Warranty ( 1st Year International Travellers Warranty and 2nd Year India Carry-in Warranty) Acer India Warranty and Free Transit Insurance. ','1517938717',1,'25234',0);
REPLACE INTO "tab_orders" ("check_id", "user_id", "category", "sub_category", "title", "description", "created_at", "quanity", "price", "status") VALUES
	(0,11,1,1,' Gateway NE56R Laptop (2nd Gen PDC/ 2GB/ 500GB)','2 Years Warranty ( 1st Year International Travellers Warranty and 2nd Year India Carry-in Warranty) Acer India Warranty and Free Transit Insurance. ','1517940573',1,'25234',0);
REPLACE INTO "tab_orders" ("check_id", "user_id", "category", "sub_category", "title", "description", "created_at", "quanity", "price", "status") VALUES
	(4,11,2,5,'HP labtobs 15','HP labtobs 15"','1517940731',1,'20000',0);
REPLACE INTO "tab_orders" ("check_id", "user_id", "category", "sub_category", "title", "description", "created_at", "quanity", "price", "status") VALUES
	(0,11,1,2,'HP Desktop','HP Desktop
Dual Core Processorccc ','1517940767',1,'23020',0);
REPLACE INTO "tab_orders" ("check_id", "user_id", "category", "sub_category", "title", "description", "created_at", "quanity", "price", "status") VALUES
	(0,11,1,2,'HP Desktop','HP Desktop
Dual Core Processorccc ','1517941198',1,'23020',0);
REPLACE INTO "tab_orders" ("check_id", "user_id", "category", "sub_category", "title", "description", "created_at", "quanity", "price", "status") VALUES
	(0,11,1,2,'HP Desktop','HP Desktop
Dual Core Processorccc ','1517941478',1,'23020',0);
REPLACE INTO "tab_orders" ("check_id", "user_id", "category", "sub_category", "title", "description", "created_at", "quanity", "price", "status") VALUES
	(0,11,1,3,'campac kumaresan ','campac kumaresan campac kumaresan campac kumaresan campac kumaresan campac kumaresan campac kumaresan ','1517941911',1,'4444',0);
REPLACE INTO "tab_orders" ("check_id", "user_id", "category", "sub_category", "title", "description", "created_at", "quanity", "price", "status") VALUES
	(5,10,1,1,' Gateway NE56R Laptop (2nd Gen PDC/ 2GB/ 500GB)','2 Years Warranty ( 1st Year International Travellers Warranty and 2nd Year India Carry-in Warranty) Acer India Warranty and Free Transit Insurance. ','1519714146',1,'25234',0);
REPLACE INTO "tab_orders" ("check_id", "user_id", "category", "sub_category", "title", "description", "created_at", "quanity", "price", "status") VALUES
	(5,10,1,2,'hp laptop','hp laptop','1519714146',1,'50000',0);
/*!40000 ALTER TABLE "tab_orders" ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'tab_user'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ "tab_user" (
  "id" int(11) NOT NULL AUTO_INCREMENT,
  "first_name" varchar(255) NOT NULL,
  "last_name" varchar(255) NOT NULL,
  "email_id" varchar(255) NOT NULL,
  "password" varchar(255) NOT NULL,
  "address" varchar(255) NOT NULL,
  "city" varchar(150) NOT NULL,
  "state" varchar(150) NOT NULL,
  "country" varchar(150) NOT NULL,
  "cardno" varchar(20) DEFAULT NULL,
  "pinno" int(10) DEFAULT NULL,
  "creditlimit" double unsigned DEFAULT NULL,
  "queone" varchar(20) NOT NULL,
  "ansone" varchar(20) NOT NULL,
  "quetwo" varchar(20) NOT NULL,
  "anstwo" varchar(20) NOT NULL,
  "quethree" varchar(20) NOT NULL,
  "ansthree" varchar(20) NOT NULL,
  "mobile" bigint(20) NOT NULL,
  "phone" bigint(20) NOT NULL,
  "status" int(11) NOT NULL,
  PRIMARY KEY ("id"),
  UNIQUE KEY "email_id" ("email_id")
) AUTO_INCREMENT=12;



#
# Dumping data for table 'tab_user'
#

LOCK TABLES "tab_user" WRITE;
/*!40000 ALTER TABLE "tab_user" DISABLE KEYS;*/
REPLACE INTO "tab_user" ("id", "first_name", "last_name", "email_id", "password", "address", "city", "state", "country", "cardno", "pinno", "creditlimit", "queone", "ansone", "quetwo", "anstwo", "quethree", "ansthree", "mobile", "phone", "status") VALUES
	(1,'admin','','admin@admin.com','admin','admin','admin','admin','admin','123456789',123,'25000','Enter the pet name','a','Enter first phone na','9','Enter the teacher na','t','111111','111111',0);
REPLACE INTO "tab_user" ("id", "first_name", "last_name", "email_id", "password", "address", "city", "state", "country", "cardno", "pinno", "creditlimit", "queone", "ansone", "quetwo", "anstwo", "quethree", "ansthree", "mobile", "phone", "status") VALUES
	(7,'test','test','kumaresanb94@gmail.com','abc123','cbe','cbe','tn','india','123456789',1234,'25000','Enter the pet name','k','Enter first phone na','900','Enter the teacher na','k','2147483647','76776',1);
REPLACE INTO "tab_user" ("id", "first_name", "last_name", "email_id", "password", "address", "city", "state", "country", "cardno", "pinno", "creditlimit", "queone", "ansone", "quetwo", "anstwo", "quethree", "ansthree", "mobile", "phone", "status") VALUES
	(9,'r','r','r@gmail.com','r','cbe','cbe','tn','in','123456789',1234,'25000','Enter the pet name','r','Enter first phone na','900','Enter the teacher na','r','9865466812','4224213170',0);
REPLACE INTO "tab_user" ("id", "first_name", "last_name", "email_id", "password", "address", "city", "state", "country", "cardno", "pinno", "creditlimit", "queone", "ansone", "quetwo", "anstwo", "quethree", "ansthree", "mobile", "phone", "status") VALUES
	(10,'ravi','kumar','ravimca37@gmail.com','ravi','cbe','cbe','tn','in','123456789',1234,'55000','Enter the pet name','ravi','Enter first phone na','9003502338','Enter the teacher na','yamuna','9865466812','4224213170',0);
REPLACE INTO "tab_user" ("id", "first_name", "last_name", "email_id", "password", "address", "city", "state", "country", "cardno", "pinno", "creditlimit", "queone", "ansone", "quetwo", "anstwo", "quethree", "ansthree", "mobile", "phone", "status") VALUES
	(11,'nanda','kumar','nandapoy@gmail.com','nanda','nanda','cbe','tn','ind','987654321',4321,'25000','Enter the pet name','asdf','Enter first phone na','asdf','Enter the teacher na','asdf','9629595205','4224213170',0);
/*!40000 ALTER TABLE "tab_user" ENABLE KEYS;*/
UNLOCK TABLES;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE;*/
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;*/
