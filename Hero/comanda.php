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
<div class="main" style="  background-color:black">
	<img src="imagini/cart.png" style='float:right; repeat:none'>
<?php 
  if ( !isset($_SESSION) ) session_start();
	if(isset($_SESSION["logat"]))
	{
		$mysql=mysql_connect("localhost","root","");
		$baza=mysql_select_db("atestat");
		$sql='SELECT * FROM Utilizatori WHERE UserName="'.$_SESSION["logat"].'";';
		$rez=mysql_query($sql);
		$nr = 0;
		while($rand=mysql_fetch_array($rez))
		{                                                                                 
			$date[$nr++]=$rand;
		}
		$Loc[1]="Bucuresti";
		$Loc[2]="Sibiu";
		$Loc[3]="Constanta";
		$Loc[4]="Iasi";
		$Loc[5]="Brasov";
		$Loc[6]="Timisoara";
		$Loc[7]="Craiova";
		$Loc[8]="Pitesti";
		$p='<H1 style="color:red"> Completeaza datele pentru finalizarea comenzii <H1>
	
		<p >
				<form  style="color:gold" action="http://localhost/Radu_Marius/atestat/Comanda_trimisa.php" method="post">
						<p style="color:#42f4eb">Plata se face exclusiv prin ramburs curierului</p><BR>
					Nume<BR><input type="text" name="Nume" value="'.$date[0]["Nume"].'"<BR>
					<BR>Prenume<BR><input type="text" name="Prenume" value="'.$date[0]["Prenume"].'"<BR>
					<BR>Oras<SELECT  name="Orase"><BR>';
					for($i=1;$i<=8;$i++)
					{
						if($Loc[$i]==$date[0]["Oras"])
								$p.='<option value="'.$Loc[$i].'" selected>'.$Loc[$i].'</option>';
						else
								$p.='<option value="'.$Loc[$i].'">'.$Loc[$i].'</option>';
					}
					
					$p.='<BR></SELECT><BR>
					<BR>Adresa<BR><input type="text" name="Adresa" value="'.$date[0]["Adresa"].'"><BR>
					<BR>Adresa de email<BR><input type="text" name="Mail" value="'.$date[0]["Mail"].'"><BR>
					<BR>Numarul de telefon<BR><input type="number" name="Telefon" value="'.$date[0]["Telefon"].'"><BR>
					<input type="submit" value="Cumpara"></form>	
	
		</p>';
	}
	else
		$p='<H1 style="color:red"> Pentru a finaliza comanda trebuie sa fiti logat pe site <BR><a style="color:#71f442" href="Contul_tau.php"> logare aici</a>';
		
	echo $p;
?>

</div>


</body>






</html>