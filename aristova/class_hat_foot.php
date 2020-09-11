<?php
class hat_foot{
  public $title="kurs";
  // Функция, которая выводит шапку администратора
  function adm_hat($lnk){	//Параметр это имя файла, который сейчас загружен
  echo "<html>\n<head>\n	<link rel='stylesheet' type='text/css' href='styles.css' />
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> ";
  
    $pages=array("ИЗДАНИЯ","ПРОИЗВЕДЕНИЯ","АВТОРЫ","РЕДАКТОРЫ","ХУДОЖНИКИ","ТИПОГРАФИИ","ПОИСК");	// Массив страниц (пункты меню)
    $links=array("izdanie.php","proizvedenie.php","author.php","redactor.php","hudoznik.php","tipograf.php","find.php"); //Ссылки, соответствующие пунктам меню по порядку
	
    echo "<title> $this->title </title>\n
</head>\n<body>";

	       echo "<div id=div_head> 
					<div id = zag> 
							
							<img src='../logo/izdatvo1.png'>
						
						
					</div>
				</div>
       
      "; 
         echo "<div class='class_menu1'>"; // Раздел, в котором мы выводим меню
		 echo "<ul>";
         for($i=0;$i<count($pages);$i++){	
	  
           if($links[$i]==$lnk){ //Соответствует ли текущий пункт тому, что мы запустили
	    echo "<li><a class='class_menu2'";
			}//if
			else {
				echo "<li><a class='class_menu1'"; 
			}
			
           echo "' href='".$links[$i]."'>".$pages[$i]."</a></li> "; // Вывод ссылки и названия пункта меню
		}//for
         echo "</ul>";
        echo "</div>";
  }//adm_hat

  function footer(){
  //  $size=getimagesize('footer.GIF');
	echo "<div id = footer>";
    echo "<p style='text-align:right;color:#ffffff'>AРИСТОВА Е.К.32928/1<br>COPYRIGHT(C)</p></div>
           <a id='exit' href='../index.php'>exit</a></body></html>";
  } 
}
?>
