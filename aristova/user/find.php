<?php
session_start();
$t=new izdanie; 
$find=new find; 
$proizvedenie=new proizvedenie;//��� ����������� ������
$proizvedenie_list=$proizvedenie->proizvedenie_list();//��������� ����� ������� ��� ����������� ������;

$redactor=new redactor;//��� ����������� ������
$redactor_list=$redactor->redactor_list();//��������� ����� ������� ��� ����������� ������;

$hudoznik=new hudoznik;//��� ����������� ������
$hudoznik_list=$hudoznik->hudoznik_list();//��������� ����� ������� ��� ����������� ������;

$tipograf=new tipograf;//��� ����������� ������
$tipograf_list=$tipograf->tipograf_list();//��������� ����� ������� ��� ����������� ������;


ini_set('mbstring.internal_encoding','UTF-8');
echo "<HTML><HEAD> <link rel='stylesheet' type='text/css' href='../css/styles.css'> <meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> <TITLE>PUBLISHING OFFICE</TITLE></HEAD>
        <BODY><div class='osn'";

if(!isset($_SESSION['admin'])){
}

function __autoload($class){ 
  include("../class_".$class.".php");
}

$page=new hat_footp;
$page->adm_hat('find.php'); 
$t=new find; 
?>
<form>

<H4>�����</H4><br>
������������: <select name = 'nazv'><option value=""></option>
<?php
		for($i=0; $i<count($proizvedenie_list); $i++){
        $ell=$proizvedenie_list[$i];
		{echo "<option value = '".$ell["id_17"]."'>".$ell["name_17"]." </option>";}
		}
		echo "</select>";
		?><br>
��������: <select name = 'redactor'><option value=""></option>
<?php
		for($i=0; $i<count($redactor_list); $i++){
        $ell=$redactor_list[$i];
		{echo "<option value = '".$ell["id_17"]."'>".$ell["fio_17"]." </option>";}
		}
		echo "</select>";
		?><br>
��������: <select name = 'hudoznik'><option value=""></option>
<?php
		for($i=0; $i<count($hudoznik_list); $i++){
        $ell=$hudoznik_list[$i];
		{echo "<option value = '".$ell["id_17"]."'>".$ell["fio_17"]." </option>";}
		}
		echo "</select>";
		?><br>
����������: <select name = 'tipografiya'><option value=""></option>
<?php
		for($i=0; $i<count($tipograf_list); $i++){
        $ell=$tipograf_list[$i];
		{echo "<option value = '".$ell["id_17"]."'>".$ell["name_17"]." </option>";}
		}
		echo "</select>";
		?><br>
<br><br>
		<input type = "submit" value = "�����" name ="find"><br><br>
</form>
<?php
if(isset($_GET['find'])){
	$find_list=$t->find_list($_GET["nazv"],$_GET["redactor"],$_GET["hudoznik"],$_GET["tipografiya"]); // ��������� ����� ������� (������ ����)
	if (count($find_list)>=1){

echo "<table border>";
echo "<tr align='center' id=tr>
	<td>ID
	</td>
	<td>��������
	</td>
	<td>�����
	</td>
	<td>��������
	</td>
	<td>��������
	</td>
	<td>����������
	</td>
	<td>���� �������� � ������
	</td>
	<td>���� ������ �� ������
	</td>
	

	</tr>
	";
 for($i=0; $i<count($find_list); $i++){
   $el=$find_list[$i]; 
   echo "<tr>
           <td>".$el['id_17']."
           </td>
	   <td>".$el['nazv']."
           </td>
		   <td>".$el['tiraz_17']."
           </td>
		   <td>".$el['redac']."
           </td>
		   <td>".$el['hudoz']."
           </td>
		   <td>".$el['tipog']."
           </td>
		   <td>".$el['dateStart_17']."
           </td>
		   <td>".$el['dateEnd_17']."
           
	     </tr>";
 }//for 	   
echo "</table>";
	}
	else {echo "<H1>������ �� ������� ������� �����������!</H1>";}
}
$t=new find; 
$find_max=$t->find_max(); 
echo "<br><h4>"."������� � ������������ �������:"."</h4><br>";
echo"<table >";
echo "<tr align='center' id=tr>

	<td>��������
	</td>
	<td>�����

	

	</tr>";
for($i=0; $i<count($find_max); $i++){
   $el=$find_max[$i]; 
	  echo "<tr>
           
	   <td>".$el['nazv']."
           </td>
		   <td>".$el['tiraz_17']."
           </td>
		   
	     </tr>";
}
echo"</table>";


	
$page->footer(); 
echo "</div></BODY>
</HTML>";
?>
