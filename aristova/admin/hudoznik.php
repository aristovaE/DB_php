<?php
session_start();
$t=new hudoznik; 
//delete
if(isset($_GET['har'])){
			 $r = $t->remove_hudoznik($_GET['har']);
			if ($r === 0)
				header("location:hudoznik.php");
			else echo "Error removing the TECHNOLOGY!";
	}
//add
if(isset($_GET['ok'])){
		if(empty($_GET['fio']))
			{ echo "<br> Поле NAME пустое!<br><br>";}
		else if(empty($_GET['ph']))
			{ echo "<br> Поле PHONE пустое!<br><br>";}
		else {
			$r = $t->add_hudoznik($_GET["fio"],$_GET["ph"]);
			
			if ($r === 0)
				header("location:hudoznik.php");
			else echo "Error adding the TECHNOLOGY !";
		}
	}
// upd
	
	if(isset($_GET['hor'])){
		$dop = $t->show_id($_GET['hor']);
		
		echo " <HTML>
		<HEAD> <link rel='stylesheet' type='text/css' href='../styles.css'> <meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> 
		<TITLE>PUBLISHING OFFICE</TITLE>
		</HEAD>
        <BODY><div class='red'><form method = 'GET'>
		<H4>ИЗМЕНИТЬ ЗАПИСЬ</H4>
				ФИО: 		<input type=text  name='p1' value = '".$dop['fio_17']."' size=20><br>
				ТЕЛЕФОН: 	<input type=text  name='p2' value = '".$dop['phone_17']."' size=20><br>
				<input type=hidden name='take_id' value = '".$dop['id_17']."'>
							<br><input type='submit' value='ИЗМЕНИТЬ' name='ok2'>
						</form><br> </div>
						</body>
						</html>";
	}
	
	if(isset($_GET['ok2'])){
		$r = $t->update_hudoznik($_GET['take_id'], $_GET['p1'], $_GET['p2']);
		if ($r === 0)
				header("location:hudoznik.php");
			else echo "Error updating the TECHNOLOGY !";
	}
ini_set('mbstring.internal_encoding','UTF-8');
echo "<HTML><HEAD> <link rel='stylesheet' type='text/css' href='../styles.css'> <meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> <TITLE>PUBLISHING OFFICE</TITLE></HEAD>
        <BODY><div class='osn'";

if(!isset($_SESSION['admin'])){
}

function __autoload($class){ 
  include("../class_".$class.".php");
}

$page=new hat_foot;
$page->adm_hat('hudoznik.php'); 
$t=new hudoznik; 
$hudoznik_list=$t->hudoznik_list(); 

echo "<script>
		function myConf()
		{
			return(confirm('Вы уверены, что хотите удалить данного художника?'));	
		}
	</script>";
echo "<table >";
echo "<tr align='center' id=tr>
	<td>ID
	</td>
	<td>ФИО
	</td>
	<td>ТЕЛЕФОН
	</td>
	<td id='udred'>УДАЛЕНИЕ
	</td>
	<td id='udred'>ИЗМЕНЕНИЕ
	</td>

	</tr>
	";
 for($i=0; $i<count($hudoznik_list); $i++){
   $el=$hudoznik_list[$i]; 
   echo "<tr>
           <td>".$el['id_17']."
           </td>
	   <td>".$el['fio_17']."
           </td>
		   <td>".$el['phone_17']."
           </td>
		   		   <td id='udred'><a href = hudoznik.php?har=".$el["id_17"]." onclick='return(myConf())'>удалить</a></td>
		    <td id='udred'><a href = hudoznik.php?hor=".$el["id_17"].">изменить</a></td>

	     </tr>";
 }//for 	   
echo "</table>";

?><br><br><br><div class="add" >
<form method="GET">
	<H4> НОВЫЙ ХУДОЖНИК </H4><br>
	 Фамилия И.О. : <input type = "text"  name = "fio" size = 30><br>
	<br> Телефон : <input type = "text"  name = "ph" size = 30><br>
	
		<br><br>
<input type = "submit" value = "ДОБАВИТЬ" name ="ok" id="adding"><br>
</form></div>
<?php
$page->footer(); 
echo "</div></BODY>
</HTML>";
?>