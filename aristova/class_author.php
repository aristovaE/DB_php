<?php
class author extends baza{ //��� ������ ������� ���� �����. � ���� ������� ���������� �������������� � �� (�������)
	function author_list(){
	 
	 // ��������� ������ ������� ������ (�� ������� �� ��������)
	$spisok=array(); // ������, ������ ������� �������� ��� ������������� ������
	$quest="SELECT *
	FROM author_17 
	order by id_17"; 
    if($result=$this->connection->query($quest)){
    while($row=$result->fetch_assoc()){
	$dop=array(id_17=>$row['id_17'],fio_17=>$row['fio_17'],rating_17=>$row['rating_17']); 
	//�������� �������������� �������
         $spisok[]=$dop; // ���������� �������������� ������� � ������ ������������� ��������
    }//while
    $result->close();
  }//if
  else{
	echo "author_list - wrong<br/>
         $quest<br />";
  } 
  return($spisok); //�������� ����� �������
 }//tech_list
 function remove_author($id)
{
	$quest = "DELETE FROM author_17 WHERE id_17 = '".$id."';";
	$result=$this->connection->query($quest);
		$sql = "DELETE FROM proizvedenie_17 WHERE id_fioA_17 = ".$id."";
		
		if($result=$this->connection->query($sql)){	
			return 0;}
		else return 1;
	
	
}
function add_author($n,$nn)
{
	// AUTOINCREMENT //
	$quest = "SELECT id_17 FROM author_17";
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
	$quest = "INSERT INTO author_17 (id_17, fio_17,rating_17) values  ('".$id."', '".$n."', '".$nn."');";
	if($result=$this->connection->query($quest))
	{	
		return 0;
	}
		else return 1;
}
function update_author($id, $N,$R)
	{
			$quest = "UPDATE author_17
			SET fio_17='".$N."',rating_17='".$R."'
			WHERE id_17='".$id."';";
			if($result=$this->connection->query($quest)){	
				return 0;}
			else return 1;
	}
	function show_id($id)
	{
		
		$quest = "SELECT fio_17,rating_17 FROM author_17 WHERE id_17='".$id."';";
		if($result=$this->connection->query($quest)){
			while($row = $result->fetch_assoc()){
				$dop=array(id_17=>$id,fio_17=>$row['fio_17'],rating_17=>$row['rating_17']); }
			$result->close();}
		else{echo "author_list - ������ ��������� �������<br />$quest<br />";}
	return $dop;
	}

}//class
?>
