<?php
  if ( !isset($_SESSION) ) session_start();
			if(($_POST['UserName']!="")&&($_POST['Parola']!="")&&($_POST['Parola_Ver']!="")&&($_POST['Nume']!="")&&($_POST['Prenume']!="")&&($_POST['Adresa']!="")&&($_POST['Telefon']!="")&&($_POST['Mail']))
			{
						$mysql=mysql_connect("localhost","root","");
						$baza=mysql_select_db("atestat");
						if(isset($_SESSION['completat']))
						unset($_SESSION['completat']);
						if($_POST['Parola']!=$_POST['Parola_Ver'])
						{
							$_SESSION['completat']='<H1 style="color:red"> Parolele nu coincid !';
							require "Contul_tau.php";
						}
						else
						{
								if(mysql_num_rows(mysql_query("SELECT * FROM Utilizatori WHERE UserName='".$_POST['UserName']."';"))==1)
								{
										$_SESSION['completat']='<H1 style="color:red"> Numele de utilizator este deja folosit !';
										require "Contul_tau.php";
								}
								else
								{
									$sql='insert into utilizatori(UserName,Parola,Nume,Prenume,Adresa,Oras,Mail,Telefon)
											values("'.$_POST['UserName'].'","'.$_POST['Parola'].'","'.$_POST['Nume'].'","'.$_POST['Prenume'].'","'.$_POST['Adresa'].'","'.$_POST['Oras'].'","'.$_POST['Mail'].'",'.$_POST['Telefon'].');';
									mysql_query($sql);
					
									$_SESSION['logat'] = $_POST['UserName'];
									$_SESSION["logat"]=$_POST["UserName"];
									require "Contul_tau.php";
								}
						
						}
			}
			else
			{
				$_SESSION['completat']='<H1 style="color:red"> Toate campurile trebuiesc completate';
				require "Contul_tau.php";
			}


?>