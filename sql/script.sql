

CREATE DATABASE BASEBANCO;
USE BASEBANCO;
CREATE TABLE AHORRO(
NROCTA  CHAR(5) NOT NULL PRIMARY KEY ,
NOMBRE  VARCHAR(30),
SALDO   NUMERIC(8,1)
);

USE BASEBANCO;

CREATE TABLE MOVIMIENTO(
NROCTA CHAR(5) NOT NULL,
NROMOV INT,
TIPO   INT,
MONTO  NUMERIC(8,1),
FECHA  DATE);

use basebanco;

DELIMITER @@
CREATE PROCEDURE spAdicion
(NOM VARCHAR(30),SAL NUMERIC(8,1))
begin
declare cuenta int;
declare nro char(5);
select ifnull(max(nrocta),0)+1 into cuenta from ahorro;
set nro=Lpad(cuenta,5,'0');
insert into ahorro values(nro,nom,sal);
insert into movimiento values(nro,1,1,sal,current_date);
end @@ 
DELIMITER ; 

use basebanco;

DELIMITER @@
CREATE PROCEDURE spmovin
(NRO CHAR(5),TP INT,MON NUMERIC(8,1))
begin
declare cuenta int;
select max(NROMOV)+1 into cuenta from movimiento where nrocta=nro;
insert into movimiento values(nro,cuenta,tp,mon,current_date);
if tp=1 then
   update ahorro set saldo=saldo+mon where nrocta=nro;
else
    update ahorro set saldo=saldo-mon where nrocta=nro;
end if;
end @@ 
DELIMITER ; 


use basebanco;
select * from ahorro;
select * from movimiento;
use basebanco;
call spadicion('Diaz Juan',2000);
call spadicion('MOreno Ana',1800);
call spadicion('Mauricio Aguirre',2500);
use basebanco;
call spmovin('00002',2,250);
