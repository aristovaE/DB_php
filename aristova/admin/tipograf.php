<?php
session_start();
$t=new tipograf; 
$no = "no.png";
$Pic_17 = 'pic';
//delete
if(isset($_GET['har'])){
			 $r = $t->remove_tipograf($_GET['har']);
			if ($r === 0)
				header("location:tipograf.php");
			else echo "Error removing the TIPOGRAF!";
	}
	// DELETING //
	if(isset($_GET['her'])){
			 $r = $t->remove_logo($_GET['her']);
			if ($r === 0)
				header("location:tipograf.php");
			else echo "Error removing the tipograf`s logo !";
	}
	
//add
if(isset($_POST['ok'])){
		if(empty($_POST['name1']))
			{ echo "<br> Поле NAME пустое!<br><br>";}
		else if(empty($_POST['r']))
			{ echo "<br> Поле RATING пустое!<br><br>";}
		else {
			$M =  $_FILES['userfile']['name'];
			$r = $t->add_tipograf($_POST["name1"], $_POST["r"], $M);
			if ($r === 0)
			{
				move_uploaded_file($_FILES['userfile']['tmp_name'], "".$M."");
				header("location:tipograf.php");
			}
			else echo "Error adding the TIPOGRAF !";
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
				НАЗВАНИЕ: 		<input type=text  name='p1' value = '".$dop['name_17']."' size=20><br>
				РЕЙТИНГ: 		<input type=number  name='p2' value = '".$dop['rating_17']."' size=20><br>
				<input type=hidden name='take_id' value = '".$dop['id_17']."'>
				<br><input type='submit' value='ИЗМЕНИТЬ' name='ok2'>
						</form><br> </div>
						</body>
						</html>";
	}
	
	if(isset($_GET['ok2'])){
		$r = $t->update_tipograf($_GET['take_id'], $_GET['p1'], $_GET['p2']);
		if ($r === 0)
				header("location:tipograf.php");
			else echo "Error updating the TIPOGRAF !";
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
$page->adm_hat('tipograf.php'); 
$t=new tipograf; 
$tipograf_list=$t->tipograf_list(); 

echo "<script>
		function myConf()
		{
			return(confirm('Вы уверены, что хотите удалить данную типографию?'));	
		}
	</script>";
echo "<table border>";
echo "<tr align='center' id=tr>
	<td>ID
	</td>
	<td>НАЗВАНИЕ
	</td>
	<td>РЕЙТИНГ
	</td>
	<td>ЛОГОТИП
	</td>
	<td id='udred'>УДАЛЕНИЕ
	</td>
	<td id='udred'>ИЗМЕНЕНИЕ
	</td>

	</tr>
	";
 for($i=0; $i<count($tipograf_list); $i++){
   $el=$tipograf_list[$i]; 
   echo "<tr>
           <td>".$el['id_17']."
           </td>
	   <td>".$el['name_17']."
           </td>
		   <td>".$el['rating_17']."
           <td>";
			if (empty($el["logo_17"]))
			echo "<img src = '../no.png'></td>";
			else echo "<img src = '../".$el["logo_17"]."'></td>";
		
		   	echo"  <td id='udred'><a href = tipograf.php?har=".$el["id_17"]." onclick='return(myConf())'>удалить</a><br>
			<a href=tipograf.php?her=".$el["id_17"].">delete logo</a></td>
		     <td id='udred'><a href = tipograf.php?hor=".$el["id_17"].">изменить</a><br>";
				// <form enctype = 'multipart/form-data'>
							// <input type='file' value='Reload' name='reload_f'>
							// <input type = 'submit' value = 'UPDATE' name = 'reload_sub'>
							// <input type = 'hidden' value = '".$el["id_17"]."' name = 'hid_id_4'></td>
	     	echo"</tr>";
 }//for 	   
echo "</table>";

?><br><br><br><div class="add" >
<form method="POST">
	<H4> НОВАЯ ТИПОГРАФИЯ </H4><br>
	 Название : <input type = "text"  name = "name1" size = 30><br>
	<br> Рейтинг : <input type = "number"  name = "r" size = 30><br>
	<br>Логотип: <input type="file" name="userfile"><br><br>
		<br>
<input type = "submit" value = "ДОБАВИТЬ" name ="ok" id="adding"><br>
</form></div>
<?php
$page->footer(); 
echo "</div></BODY>
</HTML>";
?>
