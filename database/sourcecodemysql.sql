SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- create login table
CREATE TABLE `login` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `usname` VARCHAR(30) DEFAULT NULL,
    `pass` VARCHAR(30) DEFAULT NULL
) ;


--create register table
create table `register`(
    `id` int(10) unsigned not null  AUTO_INCREMENT PRIMARY KEY,
    `fullname` varchar(100) default null,
    `phoneno` varchar(20) default null,
    `email` text,
    `cdate` timestamp default current_timestamp,
    `approval` boolean default 0
) ;


--create roomforoffline table
create table `room`(
    `id` varchar(20) not null primary key,
    `roomtype` varchar(100) not null,
    `bed` int(10) default 1,
    `floor` int(10) default null,
    `price` int(10) default null,
    `descrip` varchar(1000) default null,
    `nameofimage` varchar(100) default 'r1.jpg',
    `statu` boolean default 0
    
) ;


insert into `room`(`id`, `roomtype`, `bed`, `floor`, `price`, `descrip`,`nameofimage`, `statu`) values
('101', 'Standard', 1, 1, 1000, 'Phòng gồm 1 gường, 1 phòng tắm, 1 ban công riêng, đồ dùng cơ bản','r1.jpg' ,0),
('102', 'Standard', 1, 1, 2000, 'Phòng gồm 1 gường, 1 phòng tắm, 1 ban công riêng, đồ dùng cơ bản','r2.jpg' ,0),
('103', 'Deluxe', 1, 1, 3000, 'Phòng gồm 1 gường, 1 phòng tắm, 1 ban công riêng, đồ dùng cơ bản, view đẹp, phòng rộng','r3.jpg' ,0),
('104', 'Suit', 2, 1, 4000, 'Phòng gồm 1 phòng ngủ, 2 gường, 1 phòng tắm, view đẹp, đồ dùng đầy đủ, phòng rộng','r4.jpg' ,0),
('601', 'Master', 2, 6, 5000, 'Phòng gồm 2 phòng ngủ, 2 gường, 2 phòng tắm, view đẹp, đồ dùng đầy đủ, phòng rộng','r1.jpg' ,0),
('201', 'Standard', 1, 1, 1000, 'Phòng gồm 1 gường, 1 phòng tắm, 1 ban công riêng, đồ dùng cơ bản','r2.jpg' ,0),
('202', 'Standard', 1, 1, 2000, 'Phòng gồm 1 gường, 1 phòng tắm, 1 ban công riêng, đồ dùng cơ bản','r3.jpg' ,0),
('203', 'Deluxe', 1, 1, 3000, 'Phòng gồm 1 gường, 1 phòng tắm, 1 ban công riêng, đồ dùng cơ bản, view đẹp, phòng rộng','r4.jpg' ,0),
('204', 'Suit', 2, 1, 4000, 'Phòng gồm 1 phòng ngủ, 2 gường, 1 phòng tắm, view đẹp, đồ dùng đầy đủ, phòng rộng','r1.jpg' ,0),
('602', 'Master', 2, 6, 5000, 'Phòng gồm 2 phòng ngủ, 2 gường, 2 phòng tắm, view đẹp, đồ dùng đầy đủ, phòng rộng','r2.jpg' ,0),
('301', 'Standard', 1, 1, 1000, 'Phòng gồm 1 gường, 1 phòng tắm, 1 ban công riêng, đồ dùng cơ bản','r3.jpg' ,0),
('302', 'Standard', 1, 1, 2000, 'Phòng gồm 1 gường, 1 phòng tắm, 1 ban công riêng, đồ dùng cơ bản','r4.jpg' ,0),
('303', 'Deluxe', 1, 1, 3000, 'Phòng gồm 1 gường, 1 phòng tắm, 1 ban công riêng, đồ dùng cơ bản, view đẹp, phòng rộng','r1.jpg' ,0),
('304', 'Suit', 2, 1, 4000, 'Phòng gồm 1 phòng ngủ, 2 gường, 1 phòng tắm, view đẹp, đồ dùng đầy đủ, phòng rộng','r2.jpg' ,0),
('603', 'Master', 2, 6, 5000, 'Phòng gồm 2 phòng ngủ, 2 gường, 2 phòng tắm, view đẹp, đồ dùng đầy đủ, phòng rộng','r3.jpg' ,0);

update `room` set `floor`=2 where `id`='201';
update `room` set `floor`=2 where `id`='202';
update `room` set `floor`=2 where `id`='203';
update `room` set `floor`=2 where `id`='204';
update `room` set `floor`=3 where `id`='301';
update `room` set `floor`=3 where `id`='302';
update `room` set `floor`=3 where `id`='303';
update `room` set `floor`=3 where `id`='304';

create table `customerOnline`(
    `id` int(10) unsigned not null AUTO_INCREMENT PRIMARY KEY,
    `fullname` varchar(100) default null,
    `phoneno` varchar(20) default null,
    `email` text,
    `approval` boolean default 0
) ;

-- create table bookingOnline
create table `bookingOnline`(
    `id` int(10) unsigned not null AUTO_INCREMENT PRIMARY KEY ,
    `idcustomer` int(10) unsigned not null,
    `roomtype` varchar(100) not null,
    `checkin` date default null,
    `checkout` date default null,
    `cdate` timestamp default current_timestamp,
    `approval` boolean default 0,
    foreign key (`idcustomer`) references `customerOnline`(`id`)
) ;



create table `customerOffline`(
    `id` int(10) unsigned not null AUTO_INCREMENT PRIMARY KEY ,
    `fullname` varchar(100) default null,
    `phoneno` varchar(20) default null,
    `email` text,
    `approval` boolean default 1
) ;

create table `bookingOffline`(
    `id` int(10) unsigned not null AUTO_INCREMENT PRIMARY KEY ,
    `idcustomer` int(10) unsigned not null,
    `idroom` varchar(20) not null,
    `checkin` date default null,
    `checkout` date default null,
    `cdate` timestamp default current_timestamp,
    `approval` boolean default 1,
    foreign key (`idcustomer`) references `customerOffline`(`id`),
    foreign key (`idroom`) references `room`(`id`)
) ;

alter table `customerOffline` auto_increment=1;
alter table `customerOnline` auto_increment=1;
alter table `register` auto_increment=1;
ALTER TABLE `login`  AUTO_INCREMENT=1;
alter table `bookingOnline` auto_increment=1;
alter table  `bookingOffline` auto_increment=1;
insert into `login` (`usname`, `pass`) values
('admin', '123456');
insert into `register`(`fullname`, `phoneno`, `email`) values
('Nguyễn Văn A', '0123456789', 'nguyenvana@gmail.com'),
('Nguyễn Văn B', '0123456789', 'nguyenvanb@gmail.com');

create table `service`(
    `id` int(10)  unsigned not null AUTO_INCREMENT PRIMARY KEY ,
    `name` varchar(100) not null,
    `price` int(10) unsigned not null
);
alter table `service` auto_increment=1;
insert into `service` (`name`,`price`)values
('Nước coca lon',15),
('Rượu vang',500),
('Snack',100),
('Nước cam lon',15),
('Mỳ ý',100),
('Bò nướng tảng',200),
('Buffet sáng',100),
('Buffet trưa',200),
('Buffet tối',300);

create table `orderservices`(
    `id`  int(10) unsigned not null AUTO_INCREMENT PRIMARY KEY ,
    `id_room` varchar(20) not null,
    `id_service` int(10) unsigned not null,
    `numbers` int(10) default 0,
    `status` int(10) default 1,
    foreign key(`id_service`) references `service`(`id`),
    foreign key(`id_room`) references `room`(`id`)
);
alter table `orderservices` auto_increment=1;
create table `bill`(
    `id` int(10) unsigned not null auto_increment primary key,
    `id_customer` int(10) unsigned not null,
    `id_room` varchar(20) not null,
    `priceroom` int(10) default 0,
    `priceservices` int(10) default 0,
    `status` boolean default 0,
    `cdate` date default null,
    foreign key(`id_customer`) references `customerOffline`(`id`),
    foreign key(`id_room`) references `room`(`id`)
);
alter table `bill` auto_increment=1;


COMMIT;