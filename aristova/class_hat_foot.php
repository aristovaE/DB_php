<?php
class hat_foot{
  public $title="kurs";
  // �������, ������� ������� ����� ��������������
  function adm_hat($lnk){	//�������� ��� ��� �����, ������� ������ ��������
  echo "<html>\n<head>\n	<link rel='stylesheet' type='text/css' href='styles.css' />
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> ";
  
    $pages=array("�������","������������","������","���������","���������","����������","�����");	// ������ ������� (������ ����)
    $links=array("izdanie.php","proizvedenie.php","author.php","redactor.php","hudoznik.php","tipograf.php","find.php"); //������, ��������������� ������� ���� �� �������
	
    echo "<title> $this->title </title>\n
</head>\n<body>";

	       echo "<div id=div_head> 
					<div id = zag> 
							
							<img src='../logo/izdatvo1.png'>
						
						
					</div>
				</div>
       
      "; 
         echo "<div class='class_menu1'>"; // ������, � ������� �� ������� ����
		 echo "<ul>";
         for($i=0;$i<count($pages);$i++){	
	  
           if($links[$i]==$lnk){ //������������� �� ������� ����� ����, ��� �� ���������
	    echo "<li><a class='class_menu2'";
			}//if
			else {
				echo "<li><a class='class_menu1'"; 
			}
			
           echo "' href='".$links[$i]."'>".$pages[$i]."</a></li> "; // ����� ������ � �������� ������ ����
		}//for
         echo "</ul>";
        echo "</div>";
  }//adm_hat

  function footer(){
  //  $size=getimagesize('footer.GIF');
	echo "<div id = footer>";
    echo "<p style='text-align:right;color:#ffffff'>A������� �.�.32928/1<br>COPYRIGHT(C)</p></div>
           <a id='exit' href='../index.php'>exit</a></body></html>";
  } 
}
?>
