<?php
class izdanie extends baza{ //Для каждой таблицы свой класс. В этих классах происходит взаимодействие с БД (запросы)
	function izdanie_list(){
	 
	 // Формирует объект таблицы Оценки (не выводит на страницу)
	$spisok=array(); // Массив, каждый элемент которого это ассоциативный массив 
	$quest="SELECT izdanie_17.*, proizvedenie_17.name_17 as nazv, redactor_17.fio_17 as redac, hudoznik_17.fio_17 as hudoz, tipograf_17.name_17 as tipog
	FROM proizvedenie_17,redactor_17,hudoznik_17,tipograf_17,izdanie_17
	WHERE (izdanie_17.id_nameP_17=proizvedenie_17.id_17) and
	(izdanie_17.id_fioR_17=redactor_17.id_17) and
	(izdanie_17.id_fioH_17=hudoznik_17.id_17) and
	(izdanie_17.id_nameT_17=tipograf_17.id_17) 
	order by id_17"; 
    if($result=$this->connection->query($quest)){
    while($row=$result->fetch_assoc()){
	$dop=array(id_17=>$row['id_17'],nazv=>$row['nazv'],tiraz_17=>$row['tiraz_17'],redac=>$row['redac'],hudoz=>$row['hudoz'],tipog=>$row['tipog'],dateStart_17=>$row['dateStart_17'],dateEnd_17=>$row['dateEnd_17']); 
	//Создание ассоциативного массива
         $spisok[]=$dop; // Добавление ассоциативного массива в массив ассоциативных массивов
    }//while
    $result->close();
  }//if
  else{
	echo "izdanie_list-- wrong<br/>
         $quest<br />";
  } 
  return($spisok); //Создаётся образ таблицы
 }//tech_list
 function remove_izdanie($id)
{
	$quest = "DELETE FROM izdanie_17 WHERE id_17 = '".$id."';";
	if($result=$this->connection->query($quest)){
				return 0;}
		else return 1;
	
	
}
function add_izdanie($n,$t,$r,$h,$ti,$ds,$de)
{
	// AUTOINCREMENT //
	$quest = "SELECT id_17 FROM izdanie_17";
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
	$quest = "INSERT INTO izdanie_17 (id_17, id_nameP_17,tiraz_17,id_fioR_17,id_fioH_17,id_nameT_17,dateStart_17,dateEnd_17) values  ('".$id."', '".$n."', '".$t."', '".$r."', '".$h."', '".$ti."', '".$ds."', '".$de."');";
	if($result=$this->connection->query($quest))
	{	
		return 0;
	}
		else return 1;
}
function update_izdanie($id,$N,$T,$R,$H,$TI,$DS,$DE)
	{
			$quest = "UPDATE izdanie_17
			SET id_nameP_17='".$N."', tiraz_17='".$T."', id_fioR_17='".$R."', id_fioH_17='".$H."', id_nameT_17='".$TI."', dateStart_17='".$DS."', dateEnd_17='".$DE."'
			WHERE id_17='".$id."';";
			if($result=$this->connection->query($quest)){	
				return 0;}
			else return 1;
	}
	function show_id($id)
	{
		
		$quest = "SELECT id_nameP_17,tiraz_17,id_fioR_17,id_fioH_17,id_nameT_17,dateStart_17,dateEnd_17 FROM izdanie_17 WHERE id_17='".$id."';";
		if($result=$this->connection->query($quest)){
			while($row = $result->fetch_assoc()){
				$dop=array(id_17=>$id,id_nameP_17=>$row['id_nameP_17'],tiraz_17=>$row['tiraz_17'],id_fioR_17=>$row['id_fioR_17'],id_fioH_17=>$row['id_fioH_17'],id_nameT_17=>$row['id_nameT_17'],dateStart_17=>$row['dateStart_17'],dateEnd_17=>$row['dateEnd_17']); }
			$result->close();}
		else{echo "red_show-- запрос составлен неверно<br />$quest<br />";}
	return $dop;
	}

}//class
?>
