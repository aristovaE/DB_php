<?php
class hat_footp{
  public $title="kurs";
  // ‘ункци¤, котора¤ выводит шапку администратора
  function adm_hat($lnk){	//ѕараметр это им¤ файла, который сейчас загружен
  echo "<html>\n<head>\n	<link rel='stylesheet' type='text/css' href='styles.css' />
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> ";
  
    $pages=array("ИЗДАНИЯ","ПРОИЗВЕДЕНИЯ","ПОИСК");	// Массив страниц (пункты меню)
    $links=array("indexpolz.php","proizvedenie.php","find.php"); //Ссылки, соответствующие пунктам меню по порядку
	
    echo "<title> $this->title </title>\n
</head>\n<body>";

	       echo "<div id=div_head> 
					<div id = zag> 
							
							<img src='../logo/izdatvo1.png' align = 'middle'>
						
						
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
	echo "<div id = footer>";
    echo "<p style='text-align:right;color:#ffffff'>АРИСТОВА Е.К. 32928/1<br>COPYRIGHT(C)</p></div>
           <H2>ДЛЯ ПРОСМОТРА ОСТАЛЬНЫХ ТАБЛИЦ И ИХ ИЗМЕНЕНИЯ ВОСПОЛЬЗУЙТЕСЬ</H2> <a id='exit' href='../admin/index.php'><b>ВХОДОМ АДМИНИСТРАТОРА</b></a></body></html>";
  } 
}
?>
