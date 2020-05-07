<?php
include './vendor/DB.php';

DB::getInstance()
    ->query('DROP TABLE IF EXISTS car123');

DB::getInstance()
    ->query('DROP TABLE IF EXISTS brand123');

 DB::getInstance()
    ->query("create table brand123
(
 id int auto_increment,
 name varchar(50) not null,
 logo text null,
 constraint osn__brand_pk
  primary key (id)
)
comment 'brand of car';");

$result = DB::getInstance()
    ->query("create table `car123`
(
 id int auto_increment,
 brand_id int not null,
 name varchar(255) not null,
 logo text null,
 constraint osn_car_pk
  primary key (id),
 constraint osn_car_osn__brand_id_fk
  foreign key (brand_id) references osn__brand (id)
   on delete cascade
);");
echo($result);