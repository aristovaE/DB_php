<?php
session_start();
$t=new author; 
//delete
if(isset($_GET['har'])){
			 $r = $t->remove_author($_GET['har']);
			if ($r === 0)
				header("location:author.php");
			else echo "Error removing the TECHNOLOGY!";
	}
//add
if(isset($_GET['ok'])){
		if(empty($_GET['fio']))
			{ echo "<br> ���� FIO ������!<br><br>";}
		else if(empty($_GET['r']))
			{ echo "<br> ���� RATING ������!<br><br>";}
			else{
			$r = $t->add_author($_GET["fio"],$_GET["r"]);
			
			if ($r === 0)
				header("location:author.php");
			else echo "Error adding the AUTHOR !";
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
		<H4>�������� ������</H4>
				���: 		<input type=text  name='p1' value = '".$dop['fio_17']."' size=20><br>
				�������: 	<input type=number  name='p2' value = '".$dop['rating_17']."' size=20><br>
				<input type=hidden name='take_id' value = '".$dop['id_17']."'>
							<br><input type='submit' value='��������' name='ok2'>
						</form><br> </div>
						</body>
						</html>";
	}
	
	if(isset($_GET['ok2'])){
		$r = $t->update_author($_GET['take_id'], $_GET['p1'], $_GET['p2']);
		if ($r === 0)
				header("location:author.php");
			else echo "Error updating the AUTHOR !";
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
$page->adm_hat('author.php'); 
$t=new author; 
$author_list=$t->author_list(); 

echo "<script>
		function myConf()
		{
			return(confirm('�� �������, ��� ������ ������� ������� ������?'));	
		}
	</script>";
echo "<table border>";
echo "<tr align='center' id=tr>
	<td>ID
	</td>
	<td>���
	</td>
	<td>�������
	</td>
	<td id='udred'>��������
	</td>
	<td id='udred'>���������
	</td>

	</tr>
	";
 for($i=0; $i<count($author_list); $i++){
   $el=$author_list[$i]; 
   echo "<tr>
           <td>".$el['id_17']."
           </td>
	   <td>".$el['fio_17']."
           </td>
		   <td>".$el['rating_17']."
           </td>
		   		   <td id='udred'><a href = author.php?har=".$el["id_17"]." onclick='return(myConf())'>�������</a></td>
		    <td id='udred'><a href = author.php?hor=".$el["id_17"].">��������</a></td>

	     </tr>";
 }//for 	   
echo "</table>";

?><br><br><br><div class="add" >
<form method="GET">
	<H4> ����� ����� </H4>
	<br> ������� �.�. : <input type = "text"  name = "fio" size = 30><br>
	<br> ������� : <input type = "number"  name = "r" size = 30><br>
	
		<br><br>
<input type = "submit" value = "��������" name ="ok" id="adding"><br>
</form></div>
<?php
$page->footer(); 
echo "</div></BODY>
</HTML>";
?>
