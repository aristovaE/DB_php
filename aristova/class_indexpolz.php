<?php
class izdanie extends baza{ //��� ������ ������� ���� �����. � ���� ������� ���������� �������������� � �� (�������)
	function izdanie_list(){
	 
	 // ��������� ������ ������� ������ (�� ������� �� ��������)
	$spisok=array(); // ������, ������ ������� �������� ��� ������������� ������ 
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
	//�������� �������������� �������
         $spisok[]=$dop; // ���������� �������������� ������� � ������ ������������� ��������
    }//while
    $result->close();
  }//if
  else{
	echo "izdanie_list-- wrong<br/>
         $quest<br />";
  } 
  return($spisok); //�������� ����� �������
 }//tech_list


}//class
?>
