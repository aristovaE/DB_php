<?php
class baza{
  const USERNAME="root";
  const PASSWORD="";
  const DBNAME="bd_kurs_17";
  const SERVER="localhost";

function __construct(){ // �����������. ����������� � ��
  if($mysqli=new mysqli(self::SERVER, self::USERNAME,
                        self::PASSWORD, self::DBNAME)){
	$this->connection=$mysqli;
  }//then
  else{
	echo "�� ������� ����������� � �������� MySQL";
	exit;
  }//if

}//__construct

function _destruct(){ // ����������. ��������� ���������� � ��
  $this->connection->close();
}//_destruct
}
?>
