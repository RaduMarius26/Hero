<html>
<head>
	<link rel="stylesheet" type="text/css" href="Aspect.css">

</head>
<style>
body{
		background-image: url("imagini/fundal.jpg");
}
</style>
<body>
<div class="meniu">
<a href="Acasa.php">Acasa</a>
<a href="Reviste.php">Reviste</a>
<a href="FilmeAnimatii.php">Filme/Animatii</a>
<a class="selectat" href="Cosul_tau.php">Cosul tau</a>
<a href="Contul_tau.php">Contul tau</a>

</div>
<div class="main">

<?php
		  if ( !isset($_SESSION) ) session_start();
		$mysql=mysql_connect("localhost","root","");
		$baza=mysql_select_db("atestat");
		$sql='SELECT * FROM COS;';
		$rez=mysql_query($sql);
		$nr=0;
		while($rand=mysql_fetch_array($rez))
		$r[$nr++]=$rand;
		if($nr!=0)
		{
		$p=' <a style="color:red;background-color:black;font-size:29px" href="Golire_cos.php"> Goleste cosul</a><BR>';
		
		$pret_total=0;
		for($i=0;$i<$nr;$i++)
		{
			$sql='SELECT * from '.$r[$i]["tip"].' WHERE nume="'.$r[$i]["nume"].'";';
			$ajutor=0;
			$rez=mysql_query($sql);
			while($rand=mysql_fetch_array($rez))
			$produs[$ajutor++]=$rand;

			$pret_total=$r[$i]["pret"]+$pret_total;
			
			$p.='<div class="revista"> '.$r[$i]["nume"];
			$p.=' <img src="'.$produs[0]["poza"].'">';
			$p.='<BR>Cantitate '.$r[$i]["cantitate"].' produse';
			$p.='<BR>Pret:'.$r[$i]["pret"].' lei';
			
			$p.='<BR> <form action="http://localhost/Radu_Marius/atestat/modifica_cos.php" method="post" >
							<INPUT type="number" name="in/out" value='.$r[$i]["cantitate"].' max='.$produs[0]["stoc"].'>
							<INPUT type="hidden" name="id" value="'.$r[$i]["id"].'">
							<INPUT type="submit" value="Modifica">
							</form> ';
			
						
		}
		$p.="<BR><BR> Pretul total este de:".$pret_total." lei<BR> <a href='comanda.php'>Mai departe</a></div>";
		echo $p;
		}
		else
		echo "<H1 style='color:red'> Cosul este gol</H1>"
?>
</div>

</body>






</html>