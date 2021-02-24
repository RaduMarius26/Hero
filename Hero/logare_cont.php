<?php
  if ( !isset($_SESSION["logat"]) ) session_start();
	if(($_POST['id']!="")&&($_POST['Pas']!=""))
	{
		$mysql=mysql_connect("localhost","root","");
		$baza=mysql_select_db("atestat");	
		echo $_POST['id'];
		echo $_POST['Pas'];
		$sql="SELECT * FROM Utilizatori WHERE UserName='".$_POST['id']."' AND Parola='".$_POST['Pas']."';";
		$rez=mysql_query($sql);
		
		if(mysql_num_rows($rez)==0)
			{		
					$_SESSION['log_necompletat']='<H1 style="color:red">Date incorecte !';
										require "Contul_tau.php";
			}
			else
			{
				$_SESSION["logat"]=$_POST["id"];
					require "Contul_tau.php";
			}
	
	}
	else
	{
		$_SESSION['log_necompletat']="<H1 style='color:red'> Completati toate campurile !";
		require"Contul_tau.php";
	}

?>