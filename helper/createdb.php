<?php
require "../models/Database.php";
$createtb = new Database();
$createtb->connectToDb();

$ct1='create table Users(
		id int not null auto_increment primary key, 
		socid varchar(24) unique, 
		name varchar(64)
		)default charset="utf8"';

$ct2='create table Comments(
		id int not null auto_increment primary key, 
		parent_id int not null default 0, 
		name varchar(50),
		comment varchar(256) not null,
		date_add datetime not null
		)default charset="utf8"';

// CREATE TABLE  `lightdb`.`comments` (
// `id` INT( 5 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
// `parent_id` INT( 5 ) NOT NULL DEFAULT  '0',
// `name` VARCHAR( 50 ) NOT NULL ,
// `comment` TEXT NOT NULL ,
// `date_add` DATETIME NOT NULL
// ) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;

mysql_query($ct1); //вписать номер таблицы
	echo 'table created';
	$err=mysql_errno();
	if($err) 
		{
			echo 'Error #'.$err.'<br />';
		}




?>