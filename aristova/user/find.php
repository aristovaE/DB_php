<?php
session_start();
$t=new izdanie; 
$find=new find; 
$proizvedenie=new proizvedenie;//для выпадающего списка
$proizvedenie_list=$proizvedenie->proizvedenie_list();//Формирует образ таблицы для выпадающего списка;

$redactor=new redactor;//для выпадающего списка
$redactor_list=$redactor->redactor_list();//Формирует образ таблицы для выпадающего списка;

$hudoznik=new hudoznik;//для выпадающего списка
$hudoznik_list=$hudoznik->hudoznik_list();//Формирует образ таблицы для выпадающего списка;

$tipograf=new tipograf;//для выпадающего списка
$tipograf_list=$tipograf->tipograf_list();//Формирует образ таблицы для выпадающего списка;


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

<H4>Поиск</H4><br>
Произведение: <select name = 'nazv'><option value=""></option>
<?php
		for($i=0; $i<count($proizvedenie_list); $i++){
        $ell=$proizvedenie_list[$i];
		{echo "<option value = '".$ell["id_17"]."'>".$ell["name_17"]." </option>";}
		}
		echo "</select>";
		?><br>
Редактор: <select name = 'redactor'><option value=""></option>
<?php
		for($i=0; $i<count($redactor_list); $i++){
        $ell=$redactor_list[$i];
		{echo "<option value = '".$ell["id_17"]."'>".$ell["fio_17"]." </option>";}
		}
		echo "</select>";
		?><br>
Художник: <select name = 'hudoznik'><option value=""></option>
<?php
		for($i=0; $i<count($hudoznik_list); $i++){
        $ell=$hudoznik_list[$i];
		{echo "<option value = '".$ell["id_17"]."'>".$ell["fio_17"]." </option>";}
		}
		echo "</select>";
		?><br>
Типография: <select name = 'tipografiya'><option value=""></option>
<?php
		for($i=0; $i<count($tipograf_list); $i++){
        $ell=$tipograf_list[$i];
		{echo "<option value = '".$ell["id_17"]."'>".$ell["name_17"]." </option>";}
		}
		echo "</select>";
		?><br>
<br><br>
		<input type = "submit" value = "ПОИСК" name ="find"><br><br>
</form>
<?php
if(isset($_GET['find'])){
	$find_list=$t->find_list($_GET["nazv"],$_GET["redactor"],$_GET["hudoznik"],$_GET["tipografiya"]); // Формирует образ таблицы (оценки лист)
	if (count($find_list)>=1){

echo "<table border>";
echo "<tr align='center' id=tr>
	<td>ID
	</td>
	<td>НАЗВАНИЕ
	</td>
	<td>ТИРАЖ
	</td>
	<td>РЕДАКТОР
	</td>
	<td>ХУДОЖНИК
	</td>
	<td>ТИПОГРАФИЯ
	</td>
	<td>ДАТА ПОДПИСКИ В ПЕЧАТЬ
	</td>
	<td>ДАТА ВЫХОДА ИЗ ПЕЧАТИ
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
	else {echo "<H1>Записи по данному запросу отсутствуют!</H1>";}
}
$t=new find; 
$find_max=$t->find_max(); 
echo "<br><h4>"."Издание с максимальным тиражом:"."</h4><br>";
echo"<table >";
echo "<tr align='center' id=tr>

	<td>НАЗВАНИЕ
	</td>
	<td>ТИРАЖ

	

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
