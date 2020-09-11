<?php
class proizvedenie extends baza{ //Для каждой таблицы свой класс. В этих классах происходит взаимодействие с БД (запросы)
	function proizvedenie_list(){
	 
	 // Формирует объект таблицы Оценки (не выводит на страницу)
	$spisok=array(); // Массив, каждый элемент которого это ассоциативный массив
	$quest="SELECT proizvedenie_17.*, fio_17
	FROM proizvedenie_17,author_17
	WHERE proizvedenie_17.id_fioA_17=author_17.id_17
	order by id_17"; 
    if($result=$this->connection->query($quest)){
    while($row=$result->fetch_assoc()){
	$dop=array(id_17=>$row['id_17'],name_17=>$row['name_17'],fio_17=>$row['fio_17'],genre_17=>$row['genre_17'],numPages_17=>$row['numPages_17']); 
	//Создание ассоциативного массива
         $spisok[]=$dop; // Добавление ассоциативного массива в массив ассоциативных массивов
    }//while
    $result->close();
  }//if
  else{
	echo "proizvedenie_list-- wrong<br/>
         $quest<br />";
  } 
  return($spisok); //Создаётся образ таблицы
 }//tech_list
 function remove_proizvedenie($id)
{
	$quest = "DELETE FROM PROIZVEDENIE_17 WHERE id_17 = '".$id."';";
	$result=$this->connection->query($quest);
		$sql = "DELETE FROM IZDANIE_17 WHERE id_nameP_17 = ".$id."";
		
		if($result=$this->connection->query($sql)){	
			return 0;}
		else return 1;
	
	
}
function add_proizvedenie($n,$a,$g,$np)
{
	// AUTOINCREMENT //
	$quest = "SELECT id_17 FROM PROIZVEDENIE_17";
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
	$quest = "INSERT INTO PROIZVEDENIE_17 (id_17, name_17,id_fioA_17,genre_17,numPages_17) values  ('".$id."', '".$n."', '".$a."', '".$g."', '".$np."');";
	if($result=$this->connection->query($quest))
	{	
		return 0;
	}
		else return 1;
}
function update_proizvedenie($id, $N,$A,$G,$NP)
	{
			$quest = "UPDATE PROIZVEDENIE_17
			SET name_17='".$N."',id_fioA_17='".$A."',genre_17='".$G."',numPages_17='".$NP."'
			WHERE id_17='".$id."';";
			if($result=$this->connection->query($quest)){	
				return 0;}
			else return 1;
	}
	function show_id($id)
	{
		
		$quest = "SELECT name_17,id_fioA_17,genre_17,numPages_17 FROM PROIZVEDENIE_17 WHERE id_17='".$id."';";
		if($result=$this->connection->query($quest)){
			while($row = $result->fetch_assoc()){
				$dop=array(id_17=>$id,name_17=>$row['name_17'],id_fioA_17=>$row['id_fioA_17'],genre_17=>$row['genre_17'],numPages_17=>$row['numPages_17']); }
			$result->close();}
		else{echo "red_show-- запрос составлен неверно<br />$quest<br />";}
	return $dop;
	}

}//class
?>
