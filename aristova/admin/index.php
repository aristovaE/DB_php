<?php
session_start();

if(isset($_SESSION['admin']))
  unset($_SESSION['admin']);
	if(isset($_POST['ok']))
{
  if(( $_POST['nm']=='admin' )  
      && md5($_POST['pas'])=='d8578edf8458ce06fbc5bb76a58c5ca4' )//qwerty
  	{
	    $_SESSION['admin']='admin';
	    header("location:izdanie.php");
  	}	
  	else
            echo "WRONG PASSWORD OR LOGIN";
}
echo "<html><head><link rel='stylesheet' type='text/css' href='styles.css'>  </head>";
echo "<body><div class='adm'><BR>

<H2>ЗДРАВСТВУЙТЕ</H2><BR>
<FORM id=form_main METHOD=POST>
ЛОГИН <INPUT class=user TYPE=TEXT name=nm><BR>
ПАРОЛЬ <INPUT TYPE=PASSWORD name=pas><BR><BR>
<INPUT id='adding' TYPE=SUBMIT name=ok value='ВХОД'><BR><BR><BR>
</FORM><a href=../user/indexpolz.php>Пользовательский вход</a></div></body></html>";
?>
