<?php
session_start();
$t=new proizvedenie; 
$author=new author;//для выпадающего списка
$author_list=$author->author_list();//Формирует образ таблицы для выпадающего списка;

//delete
if(isset($_GET['har'])){
			 $r = $t->remove_proizvedenie($_GET['har']);
			if ($r === 0)
				header("location:proizvedenie.php");
			else echo "Error removing the PROIZVEDENIE!";
	}
//add
if(isset($_GET['ok'])){
		if(empty($_GET['name']))
			{ echo "<br> Поле NAME пустое!<br><br>";}
		else if(empty($_GET['avt']))
			{ echo "<br> Поле AVTOR пустое!<br><br>";}
		else if(empty($_GET['zh']))
			{ echo "<br> Поле ZHANR пустое!<br><br>";}
		else if(empty($_GET['ch']))
			{ echo "<br> Поле CHISLO пустое!<br><br>";}
		else {
			$r = $t->add_proizvedenie($_GET["name"],$_GET["avt"],$_GET["zh"],$_GET["ch"]);
			
			if ($r === 0)
				header("location:proizvedenie.php");
			else echo "Error adding the PROIZVEDENIE !";
		}
	}
// upd
	
	if(isset($_GET['hor'])){
		$dop = $t->show_id($_GET['hor']);
		
		echo " <HTML>
		<HEAD> <link rel='stylesheet' type='text/css' href='../styles.css'> <meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> <TITLE>PUBLISHING OFFICE</TITLE></HEAD>
        <BODY><div class='red'><form method = 'GET'>
		<H4>ИЗМЕНИТЬ ЗАПИСЬ</H4>
			Название: 	<input type=text  name='p1' value = '".$dop['name_17']."' size=20><br>
			Автор: 		 "; 
				echo "<select name = 'p2' >";
				for($i=0; $i<count($author_list); $i++){
				$ell=$author_list[$i];
				if ($ell["id_17"]==$dop['id_fioA_17'])
					{echo "<option value = '".$ell["id_17"]."' selected ='".$dop['id_fioA_17']."'>".$ell["fio_17"]." </option>";}
					else {echo "<option value = '".$ell["id_17"]."'>".$ell["fio_17"]." </option>";}
				}
		echo "</select><br>
				Жанр: 		<input type=text  name='p3' value = '".$dop['genre_17']."' size=20><br>
				Число страниц: 		<input type=text  name='p4' value = '".$dop['numPages_17']."' size=20><br>
				<input type=hidden name='take_id' value = '".$dop['id_17']."'>
							<br><input type='submit' value='ИЗМЕНИТЬ' name='ok2'>
						</form><br> </div></body></html>";
	}
	
	if(isset($_GET['ok2'])){
		$r = $t->update_proizvedenie($_GET['take_id'], $_GET['p1'], $_GET['p2'], $_GET['p3'], $_GET['p4']);
		if ($r === 0)
				header("location:proizvedenie.php");
			else echo "Error updating the PROIZVEDENIE !";
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
$page->adm_hat('proizvedenie.php'); 
$t=new proizvedenie; 
$proizvedenie_list=$t->proizvedenie_list(); 

echo "<script>
		function myConf()
		{
			return(confirm('Вы уверены, что хотите удалить данное произведение?'));	
		}
	</script>";
echo "<table border>";
echo "<tr align='center' id=tr>
	<td>ID
	</td>
	<td>НАЗВАНИЕ
	</td>
	<td>АВТОР
	</td>
	<td>ЖАНР
	</td>
	<td>ЧИСЛО СТРАНИЦ
	</td>
	<td id='udred'>УДАЛЕНИЕ
	</td>
	<td id='udred'>ИЗМЕНЕНИЕ
	</td>

	</tr>
	";
 for($i=0; $i<count($proizvedenie_list); $i++){
   $el=$proizvedenie_list[$i]; 
   echo "<tr>
           <td>".$el['id_17']."
           </td>
	   <td>".$el['name_17']."
           </td>
		   <td>".$el['fio_17']."
           </td>
		   <td>".$el['genre_17']."
           </td>
		   <td>".$el['numPages_17']."
           </td>
		   		   <td id='udred'><a href = proizvedenie.php?har=".$el["id_17"]." onclick='return(myConf())'>удалить</a></td>
		    <td id='udred'><a href = proizvedenie.php?hor=".$el["id_17"].">изменить</a></td>

	     </tr>";
 }//for 	   
echo "</table>";

?><br><br><br><div class="add" >
<form method="GET">
	<H4> НОВОЕ ПРОИЗВЕДЕНИЕ </H4><br>
	 Название: <input type = "text"  name = "name" size = 30><br>
	 <br>Автор: <?php
		echo "<select name = 'avt'>";
		for($i=0; $i<count($author_list); $i++){
        $ell=$author_list[$i];
		echo "<option value = '".$ell["id_17"]."'>".$ell["fio_17"]." </option>";
		}
		echo "</select>";
		?><br>
	<br> Жанр : <input type = "text"  name = "zh" size = 30><br>
	<br> Число страниц : <input type = "number"  name = "ch" size = 30><br>
	
	
		<br><br>
<input type = "submit" value = "ДОБАВИТЬ" name ="ok" id="adding"><br>
</form></div>
<?php
$page->footer(); 
echo "</div></BODY>
</HTML>";
?>
