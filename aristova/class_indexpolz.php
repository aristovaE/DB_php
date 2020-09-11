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


}//class
?>
