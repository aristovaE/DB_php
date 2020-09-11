<?php
class tipograf extends baza{ //Для каждой таблицы свой класс. В этих классах происходит взаимодействие с БД (запросы)
	function tipograf_list(){
	 
	 // Формирует объект таблицы Оценки (не выводит на страницу)
	$spisok=array(); // Массив, каждый элемент которого это ассоциативный массив
	$quest="SELECT *
	FROM TIPOGRAF_17 
	order by id_17"; 
    if($result=$this->connection->query($quest)){
    while($row=$result->fetch_assoc()){
	$dop=array(id_17=>$row['id_17'],name_17=>$row['name_17'],rating_17=>$row['rating_17'],logo_17=>$row['logo_17']); 
	//Создание ассоциативного массива
         $spisok[]=$dop; // Добавление ассоциативного массива в массив ассоциативных массивов
    }//while
    $result->close();
  }//if
  else{
	echo "tipograf_list-- wrong<br/>
         $quest<br />";
  } 
  return($spisok); //Создаётся образ таблицы
 }//tech_list
 function remove_tipograf($id)
{
	$quest = "DELETE FROM TIPOGRAF_17 WHERE id_17 = '".$id."';";
	$result=$this->connection->query($quest);
		$sql = "DELETE FROM IZDANIE_17 WHERE id_nameT_17 = ".$id."";
		
		if($result=$this->connection->query($sql)){	
			return 0;}
		else return 1;
	
	
}
function remove_logo($id)
	{
		$quest = "SELECT logo_17 FROM TIPOGRAF_17 WHERE id_17 = ".$id."";
		if($result=$this->connection->query($quest))
		{
			while($row = $result->fetch_assoc())
			{
				if(!empty($row["logo_17"]))
					unlink('../logo/img/'.$row["logo_17"]);
			}
		}
				$sql = "UPDATE tipograf_17 SET logo_17 = NULL WHERE id_17 = ".$id."";
		if($result=$this->connection->query($sql)){	
			return 0;}
		else return 1;
		
	}
function add_tipograf($n,$r,$M) 
{	
	
	// AUTOINCREMENT //
	$quest = "SELECT id_17 FROM TIPOGRAF_17";
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
	if (empty($M))
		{
			$M=''.$id.'.png';
		}
	$quest = "INSERT INTO TIPOGRAF_17 (id_17, name_17,rating_17,logo_17) 
	values  ('".$id."', '".$n."','".$r."','".$M."');";
	if($result=$this->connection->query($quest))
	{	
		return 0;
	}
		else return 1;
	
}
function update_tipograf($id, $N,$R)
	{
			$quest = "UPDATE TIPOGRAF_17
			SET name_17='".$N."',rating_17='".$R."'
			WHERE id_17='".$id."';";
			if($result=$this->connection->query($quest)){	
				return 0;}
			else return 1;
	}
	
	
	function update_logo($id,$reload_f)
		{
		$quest = "SELECT logo_17 FROM TIPOGRAF_17 WHERE id_17 = ".$id."";
		if($result=$this->connection->query($quest))
		{
			while($row = $result->fetch_assoc())
			{
				if(!empty($row["logo_17"]))
					unlink('../logo/img/logo'.$row["logo_17"]);
			}
		}
				$sql = "UPDATE tipograf_17 SET logo_17 = NULL WHERE id_17 = ".$id."";
		$result=$this->connection->query($sql);
		$New_img_17 = $id."_".$_FILES["reload_f"]["name"];
		$sql = "UPDATE tipograf_17
			SET logo_17 = '".$New_img_17."'
			WHERE id_17='".$id."';";
			$result = $conn->query($sql);
			//////////////////////////////////////////////////////////////////
			move_uploaded_file($_FILES['reload_f']['tmp_name'], "../logo/img/logo".$Pic_17."/".$Pic."");
		
		
	}
	function show_id($id)
	{
		
		$quest = "SELECT name_17,rating_17 FROM TIPOGRAF_17 WHERE id_17='".$id."';";
		if($result=$this->connection->query($quest)){
			while($row = $result->fetch_assoc()){
				$dop=array(id_17=>$id,name_17=>$row['name_17'],rating_17=>$row['rating_17']); }
			$result->close();}
		else{echo "tipograf_show-- запрос составлен неверно<br />$quest<br />";}
	return $dop;
	}

}//class
?>
