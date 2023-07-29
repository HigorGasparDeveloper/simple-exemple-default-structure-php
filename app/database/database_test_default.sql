create database if not exists test_default;

use test_default;

create table if not exists product (
	id integer not null primary key auto_increment,
    product_name varchar(300),
    product_price double precision,
    recorded_datetime datetime
);

select * from product;