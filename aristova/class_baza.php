<?php
class baza{
  const USERNAME="root";
  const PASSWORD="";
  const DBNAME="bd_kurs_17";
  const SERVER="localhost";

function __construct(){ // Конструктор. Подключение к БД
  if($mysqli=new mysqli(self::SERVER, self::USERNAME,
                        self::PASSWORD, self::DBNAME)){
	$this->connection=$mysqli;
  }//then
  else{
	echo "Не удается соединиться с сервером MySQL";
	exit;
  }//if

}//__construct

function _destruct(){ // Деструктор. Закрывает соединение с БД
  $this->connection->close();
}//_destruct
}
?>
