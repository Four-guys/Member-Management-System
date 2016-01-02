 create database if not exists mms_t;
 use mms_t;
 
 drop table if exists admin;
 
 create table admin(
	Id int auto_increment not null,
    Username varchar(30) not null unique,
    Passwd char(32) not null,
    primary key(Id)
);

insert into admin(Username,Passwd) values ('admin','123');

select * from admin;
 
 drop table if exists userInfo;
 #ID、姓名、性别、电话号码、会员等级（分为三级）、账户余额、可用积分,奖品
 create table userInfo(
	Id int auto_increment not null,
    Username VARCHAR(30) NOT NULL unique,
    Passwd char(32) default '123456',
    Sex enum('boy','girl','secert') default 'secert',
    Phonenumber VARCHAR(13),
    Userlevel int NOT NULL DEFAULT 1, #level 1,2,3
    Balance decimal NOT NULL DEFAULT 0.0,
    Points int NOT NULL DEFAULT 0,
    reward_name varchar(10000) default '',
    primary key(Id)
 );
 
 insert into userInfo(Username,Passwd,Phonenumber)
 values('lzn','123','18780156169');
 
 select * from userInfo;
 
drop table if exists reward_info;
create table reward_info(
	Id int auto_increment not null,
    require_point int not null,
    reward_name varchar(30) not null,
    primary key(Id)
 );
 
insert into reward_info(require_point,reward_name)values(10,"book1");
insert into reward_info(require_point,reward_name)values(20,"book2");
insert into reward_info(require_point,reward_name)values(20,"book3");
insert into reward_info(require_point,reward_name)values(40,"book4");

select * from reward_info;

select require_point from reward_info where id = 1;

select u.id,u.Username,u.Integration,r.reward_name from userInfo as u,reward_info as r where u.reward_id = r.id;

update userInfo set Points = 500 where Username = 'lzn';
update userInfo set Balance = 1 where Username = 'lzn';
select Balance from userinfo where id = 1;
