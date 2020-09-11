<?php
session_start();
$t=new izdanie; 

ini_set('mbstring.internal_encoding','UTF-8');
echo "<HTML><HEAD> <link rel='stylesheet' type='text/css' href='../css/styles.css'> <meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> <TITLE>PUBLISHING OFFICE</TITLE></HEAD>
        <BODY><div class='osn'";

if(!isset($_SESSION['admin'])){
}

function __autoload($class){ 
  include("../class_".$class.".php");
}


?>

<?php
$page=new hat_footp;
$page->adm_hat('indexpolz.php'); 
$t=new izdanie; 
$izdanie_list=$t->izdanie_list(); 

echo "<table border>";
echo "<tr align='center' id=tr>
	<td>ID
	</td>
	<td>мюгбюмхе
	</td>
	<td>рхпюф
	</td>
	<td>педюйрнп
	</td>
	<td>усднфмхй
	</td>
	<td>рхонцпютхъ
	</td>
	<td>дюрю ондохяйх б оевюрэ
	</td>
	<td>дюрю бшундю хг оевюрх
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

	     </tr>";
 }//for 	   
echo "</table>";


$page->footer(); 
echo "</div></BODY>
</HTML>";
?>
