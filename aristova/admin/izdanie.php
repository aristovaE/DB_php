<?php
session_start();
$t=new izdanie; 

$proizvedenie=new proizvedenie;//��� ����������� ������
$proizvedenie_list=$proizvedenie->proizvedenie_list();//��������� ����� ������� ��� ����������� ������;

$redactor=new redactor;//��� ����������� ������
$redactor_list=$redactor->redactor_list();//��������� ����� ������� ��� ����������� ������;

$hudoznik=new hudoznik;//��� ����������� ������
$hudoznik_list=$hudoznik->hudoznik_list();//��������� ����� ������� ��� ����������� ������;

$tipograf=new tipograf;//��� ����������� ������
$tipograf_list=$tipograf->tipograf_list();//��������� ����� ������� ��� ����������� ������;

//delete
if(isset($_GET['har'])){
			 $r = $t->remove_izdanie($_GET['har']);
			if ($r === 0)
				header("location:izdanie.php");
			else echo "Error removing the IZDANIE!";
	}
//add
if(isset($_GET['ok'])){
		if(empty($_GET['nazv']))
			{ echo "<br> ���� NAME ������!<br><br>";}
		else if(empty($_GET['red']))
			{ echo "<br> ���� RED ������!<br><br>";}
		else if(empty($_GET['t']))
			{ echo "<br> ���� TIRAZ ������!<br><br>";}
		else if(empty($_GET['hud']))
			{ echo "<br> ���� HUD ������!<br><br>";}
		else 
			if(empty($_GET['tipogr']))
			{ echo "<br> ���� TIPOGR ������!<br><br>";}
		else if(empty($_GET['ds']))
			{ echo "<br> ���� DATE1 ������!<br><br>";}
		else if(empty($_GET['de']))
			{ echo "<br> ���� DATE2 ������!<br><br>";}
		else {
			$r = $t->add_izdanie($_GET["nazv"],$_GET["t"],$_GET["red"],$_GET["hud"],$_GET["tipogr"],$_GET["ds"],$_GET["de"]);
			
			if ($r === 0)
				header("location:izdanie.php");
			else echo "Error adding the IZDANIE !";
		}
	}
// upd
	
		if(isset($_GET['hor'])){
		$dop = $t->show_id($_GET['hor']);
		
		echo " <HTML>
		<HEAD> <link rel='stylesheet' type='text/css' href='../styles.css'> <meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> <TITLE>PUBLISHING OFFICE</TITLE></HEAD>
        <BODY><div class='red'><form method = 'GET'>
		<H4>�������� ������</H4>
			��������: 	 		 "; 
				echo "<select name = 'naz' >";
				for($i=0; $i<count($proizvedenie_list); $i++){
				$ell=$proizvedenie_list[$i];
				if ($ell["id_17"]==$dop['id_nameP_17'])
					{echo "<option value = '".$ell["id_17"]."' selected ='".$dop['id_nameP_17']."'>".$ell["name_17"]." </option>";}
					else {echo "<option value = '".$ell["id_17"]."'>".$ell["name_17"]." </option>";}
				}
		echo "</select><br>
				�����: 		<input type=text  name='p2' value = '".$dop['tiraz_17']."' size=20><br>
				
				��������: 		 "; 
				echo "<select name = 'p3' >";
				for($i=0; $i<count($redactor_list); $i++){
				$ell=$redactor_list[$i];
				if ($ell["id_17"]==$dop['id_fioR_17'])
					{echo "<option value = '".$ell["id_17"]."' selected ='".$dop['id_fioR_17']."'>".$ell["fio_17"]." </option>";}
					else {echo "<option value = '".$ell["id_17"]."'>".$ell["fio_17"]." </option>";}
				}
		echo "</select><br>
		��������: 		 "; 
				echo "<select name = 'p4' >";
				for($i=0; $i<count($hudoznik_list); $i++){
				$ell=$hudoznik_list[$i];
				if ($ell["id_17"]==$dop['id_fioH_17'])
					{echo "<option value = '".$ell["id_17"]."' selected ='".$dop['id_fioH_17']."'>".$ell["fio_17"]." </option>";}
					else {echo "<option value = '".$ell["id_17"]."'>".$ell["fio_17"]." </option>";}
				}
		echo "</select><br>
		����������: 		 "; 
				echo "<select name = 'p5' >";
				for($i=0; $i<count($tipograf_list); $i++){
				$ell=$tipograf_list[$i];
				if ($ell["id_17"]==$dop['id_nameT_17'])
					{echo "<option value = '".$ell["id_17"]."' selected ='".$dop['id_nameT_17']."'>".$ell["name_17"]." </option>";}
					else {echo "<option value = '".$ell["id_17"]."'>".$ell["name_17"]." </option>";}
				}
		echo "</select><br>
		���� �������� � ������: 		<input type=date  name='p6' value = '".$dop['dateStart_17']."' size=30><br>
		���� ������ �� ������: 		<input type=date  name='p7' value = '".$dop['dateEnd_17']."' size=30><br>
		
		<input type=hidden name='take_id' value = '".$dop['id_17']."'>
							<br><input type='submit' value='��������' name='ok2'>
						</form><br> </div></body></html>";
	}
	
if(isset($_GET['ok2'])){
		$r = $t->update_izdanie($_GET['take_id'], $_GET['naz'], $_GET['p2'], $_GET['p3'], $_GET['p4'], $_GET['p5'], $_GET['p6'], $_GET['p7']);
		if ($r === 0)
				header("location:izdanie.php");
			else echo "Error updating the izdanie !";
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
$page->adm_hat('izdanie.php'); 
$t=new izdanie; 
$izdanie_list=$t->izdanie_list(); 

echo "<script>
		function myConf()
		{
			return(confirm('�� �������, ��� ������ ������� ������ �������?'));	
		}
	</script>";
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
	<td id='udred'>��������
	</td>
	<td id='udred'>���������
	</td>

	</tr>
	";
 for($i=0; $i<count($izdanie_list); $i++){
   $el=$izdanie_list[$i]; 
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
           </td>
		   		   <td id='udred'><a href = izdanie.php?har=".$el["id_17"]." onclick='return(myConf())'>�������</a></td>
		    <td id='udred'><a href = izdanie.php?hor=".$el["id_17"].">��������</a></td>

	     </tr>";
 }//for 	   
echo "</table>";

?><br><br><br><div class="add" >
<form method="GET">
	<H4> ����� ������� </H4><br>
	 �������� :  <?php
		echo "<select name = 'nazv'>";
		for($i=0; $i<count($proizvedenie_list); $i++){
        $ell=$proizvedenie_list[$i];
		echo "<option value = '".$ell["id_17"]."'>".$ell["name_17"]." </option>";
		}
		echo "</select>";
		?><br>
	 <br>����� : <input type = "number"  name = "t" size = 30><br>
	 <br>�������� :  <?php
		echo "<select name = 'red'>";
		for($i=0; $i<count($redactor_list); $i++){
        $ell=$redactor_list[$i];
		echo "<option value = '".$ell["id_17"]."'>".$ell["fio_17"]." </option>";
		}
		echo "</select>";
		?><br>
	 <br>�������� : <?php
		echo "<select name = 'hud'>";
		for($i=0; $i<count($hudoznik_list); $i++){
        $ell=$hudoznik_list[$i];
		echo "<option value = '".$ell["id_17"]."'>".$ell["fio_17"]." </option>";
		}
		echo "</select>";
		?><br>
	 <br>���������� :  <?php
		echo "<select name = 'tipogr'>";
		for($i=0; $i<count($tipograf_list); $i++){
        $ell=$tipograf_list[$i];
		echo "<option value = '".$ell["id_17"]."'>".$ell["name_17"]." </option>";
		}
		echo "</select>";
		?><br>
	 <br>���� ������� � ������ : <input type = "date"  name = "ds" size = 30><br>
	 <br>���� ������ �� ������ : <input type = "date"  name = "de" size = 30><br>
	
		<br><br>
<input type = "submit" value = "��������" name ="ok" id="adding"><br>
</form></div>
<?php
$page->footer(); 
echo "</div></BODY>
</HTML>";
?>


