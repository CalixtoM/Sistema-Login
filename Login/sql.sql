create database bancolog;

use bancolog;

drop table tb_usuario;

create table tb_usuario(
cd_usuario int auto_increment primary key ,
nm_usuario varchar(255) not null,
ds_email varchar(255) not null,
ds_senha varchar(255) not null
);