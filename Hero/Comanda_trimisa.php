<?php
		
		if(isset($_POST['Nume']))
		{
				if(isset($_POST['Prenume']))
				{
					//if(isset($_POST['Oras']))
					//{
						if(isset($_POST['Adresa']))
						{
							if(isset($_POST['Mail']))
								{
									if(isset($_POST['Telefon']))
										{
										  if ( !isset($_SESSION) ) session_start();
										  
												$mysql=mysql_connect("localhost","root","");
												$baza=mysql_select_db("atestat");	
												$sql='SELECT * FROM Utilizatori WHERE UserName="'.$_SESSION["logat"].'";';
												$rez=mysql_query($sql);
												$nr = 0;
												while($rand=mysql_fetch_array($rez))
												{                                       
													$user[$nr++]=$rand;
												}
												$sql='INSERT INTO Facturi (cont,status,produse,cost)
														values("'.$user[0]["UserName"].'","comanda trimisa","';
												$date_cos='SELECT * FROM COS;';
												$rez=mysql_query($date_cos);
												$nr=0;
												while($rand=mysql_fetch_array($rez))
													$cos[$nr++]=$rand;
												$total=0;
													$sql.=' '.$cos[0]["nume"].' in numar de '.$cos[0]["cantitate"].' cost:'.$cos[0]["pret"];
													$total=$cos[0]["pret"]+$total;
												for($i=1;$i<$nr;$i++)
												{
													$sql.=' ;'.$cos[$i]["nume"].' in numar de '.$cos[$i]["cantitate"].' cost:'.$cos[$i]["pret"].' LEI ';
													$total=$cos[$i]["pret"]+$total;
												}
												$sql.='",'.$total.');';
												$rez=mysql_query($sql);
												$sql="Delete from cos";
												require"Acasa.php";								

									
								}
							else
							{
								$_SESION['completat']=false;
								require"comanda.php";
							}
				
						/*}
						else
						{
							$_SESION['completat']=false;
							require"comanda.php";
						}*/
				
					}
					else
					{
						$_SESION['completat']=false;
						require"comanda.php";
					}
				}
				else
				{
					$_SESION['completat']=false;
					require"comanda.php";
				}
				
		}
		else
		{
			$_SESION['completat']=false;
			require"comanda.php";
		
		}
			}

?>