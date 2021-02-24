<html>
<head>
	<link rel="stylesheet" type="text/css" href="Aspect.css">



</head>
<style>
body{
		background-image: url("imagini/Reviste.jpg");
}
</style>
<body>
<div class="meniu">
<a  href="Acasa.php">Acasa</a>
<a class="selectat" href="Reviste.php">Reviste</a>
<a href="FilmeAnimatii.php">Filme/Animatii</a>
<a href="Cosul_tau.php">Cosul tau</a>
<a href="Contul_tau.php">Contul tau</a>

</div>

<div class="main">
<?php
	$mysql=mysql_connect("localhost","root","");
	$baza=mysql_select_db("atestat");
	$sql="SELECT * FROM reviste";
	$rez=mysql_query($sql);
	$nr=0;
	while($rand=mysql_fetch_array($rez))
	$r[$nr++]=$rand;
		if(!isset($_SESSION['comand_id'])) 
			{ 
				session_start(); 
				$_SESSION['comand_id']=0;
			}
		$p="";
	for($i=0;$i<$nr;$i++)
		{
			
			$p.='<div class="revista"> '.$r[$i]["nume"];
			$p.=' <img src="'.$r[$i]["poza"].'">';
			$p.=$r[$i]["descriere"].'<BR>Pret:'.$r[$i]["pret"].' lei';
			$p.='<BR>'.' Produse pe stoc:'.$r[$i]["stoc"];
			$p.='<form action="http://localhost/Radu_Marius/atestat/AdaugaRevista.php" method="post" >
					<INPUT type="number" name="cantitate" max='.$r[$i]["stoc"].'>
					<INPUT type="hidden" name="Id" value="'.$r[$i]["nume"].'">
					<INPUT type="hidden" name="stoc" value="'.$r[$i]["stoc"].'">
					<INPUT type="hidden" name="tip_produs" value="reviste">
					<INPUT type="submit" value="Adauga in cos"></form>';
						$p.='</div>';
		}
			$p.='</table>';
echo $p;


?>



</div>

</body>






</html>