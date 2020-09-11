<?php
class redactor extends baza{ //Для каждой таблицы свой класс. В этих классах происходит взаимодействие с БД (запросы)
	function redactor_list(){
	 
	 // Формирует объект таблицы Оценки (не выводит на страницу)
	$spisok=array(); // Массив, каждый элемент которого это ассоциативный массив
	$quest="SELECT *
	FROM REDACTOR_17 
	order by id_17"; 
    if($result=$this->connection->query($quest)){
    while($row=$result->fetch_assoc()){
	$dop=array(id_17=>$row['id_17'],fio_17=>$row['fio_17'],phone_17=>$row['phone_17']); 
	//Создание ассоциативного массива
         $spisok[]=$dop; // Добавление ассоциативного массива в массив ассоциативных массивов
    }//while
    $result->close();
  }//if
  else{
	echo "redactor_list-- wrong<br/>
         $quest<br />";
  } 
  return($spisok); //Создаётся образ таблицы
 }//tech_list
 function remove_redactor($id)
{
	$quest = "DELETE FROM REDACTOR_17 WHERE id_17 = '".$id."';";
	$result=$this->connection->query($quest);
		$sql = "DELETE FROM IZDANIE_17 WHERE id_fioR_17 = ".$id."";
		
		if($result=$this->connection->query($sql)){	
			return 0;}
		else return 1;
	
	
}
function add_redactor($n,$r)
{
	// AUTOINCREMENT //
	$quest = "SELECT id_17 FROM REDACTOR_17";
	if($result=$this->connection->query($quest)){
	while($row=$result->fetch_assoc()){
		$au = $row['id_17'];}
	$result->close();}
	else
	{	
		echo "запрос составлен неверно<br /> $quest<br />";
	} 
	// AUTOINCREMENT //
		
	$id = $au + 1;
	$quest = "INSERT INTO REDACTOR_17 (id_17, fio_17,phone_17) values  ('".$id."', '".$n."', '".$r."');";
	if($result=$this->connection->query($quest))
	{	
		return 0;
	}
		else return 1;
}
function update_redactor($id, $N,$R)
	{
			$quest = "UPDATE REDACTOR_17
			SET fio_17='".$N."',phone_17='".$R."'
			WHERE id_17='".$id."';";
			if($result=$this->connection->query($quest)){	
				return 0;}
			else return 1;
	}
	function show_id($id)
	{
		
		$quest = "SELECT fio_17,phone_17 FROM REDACTOR_17 WHERE id_17='".$id."';";
		if($result=$this->connection->query($quest)){
			while($row = $result->fetch_assoc()){
				$dop=array(id_17=>$id,fio_17=>$row['fio_17'],phone_17=>$row['phone_17']); }
			$result->close();}
		else{echo "redactor_show-- запрос составлен неверно<br />$quest<br />";}
	return $dop;
	}

}//class
?>
