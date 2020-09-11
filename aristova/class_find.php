<?php
class find extends baza{ //��� ������ ������� ���� �����. � ���� ������� ���������� �������������� � �� (�������)
	function find_list($nazv,$redactor,$hudoznik,$tipografiya){
	 if(empty($nazv))
		{$nazv="%";}
	if(empty($redactor))
		{$redactor="%";}
	if(empty($hudoznik))
		{$hudoznik="%";}
	if(empty($tipografiya))
		{$tipografiya="%";}
	 // ��������� ������ ������� ������ (�� ������� �� ��������)
	$spisok=array(); // ������, ������ ������� �������� ��� ������������� ������ 
	$quest="SELECT izdanie_17.*, proizvedenie_17.name_17 as nazv, redactor_17.fio_17 as redac, hudoznik_17.fio_17 as hudoz, tipograf_17.name_17 as tipog
	FROM proizvedenie_17,redactor_17,hudoznik_17,tipograf_17,izdanie_17
	WHERE (izdanie_17.id_nameP_17=proizvedenie_17.id_17) and
	(izdanie_17.id_fioR_17=redactor_17.id_17) and
	(izdanie_17.id_fioH_17=hudoznik_17.id_17) and
	(izdanie_17.id_nameT_17=tipograf_17.id_17) and
	(izdanie_17.id_nameP_17 LIKE '$nazv') and
	 (izdanie_17.id_fioR_17 LIKE '%$redactor%') and
	 (izdanie_17.id_fioH_17 LIKE '%$hudoznik%') and
	 (izdanie_17.id_nameT_17 LIKE '%$tipografiya%')
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
		echo "������ ��������� �������<br /> $quest<br />";
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
		else{echo "red_show-- ������ ��������� �������<br />$quest<br />";}
	return $dop;
	}

	function find_max()
	{
$quest ="SELECT izdanie_17.*, proizvedenie_17.name_17 as nazv, redactor_17.fio_17 as redac, hudoznik_17.fio_17 as hudoz, tipograf_17.name_17 as tipog
	FROM proizvedenie_17,redactor_17,hudoznik_17,tipograf_17,izdanie_17
	WHERE (izdanie_17.id_nameP_17=proizvedenie_17.id_17) and
	(izdanie_17.id_fioR_17=redactor_17.id_17) and
	(izdanie_17.id_fioH_17=hudoznik_17.id_17) and
	(izdanie_17.id_nameT_17=tipograf_17.id_17) and
	tiraz_17 = 
				( SELECT max(tiraz_17)
				  FROM izdanie_17)
";
 if($result=$this->connection->query($quest)){
    while($row=$result->fetch_assoc()){
	$dop=array(nazv=>$row['nazv'],tiraz_17=>$row['tiraz_17']); 
	   $spisok[]=$dop; // ���������� �������������� ������� � ������ ������������� ��������
    }//while
    $result->close();
  }
  else{
	echo "izdanie_max - wrong<br/>
         $quest<br />";
  } 
  return($spisok); //�������� ����� �������
	}
}//class

?>

