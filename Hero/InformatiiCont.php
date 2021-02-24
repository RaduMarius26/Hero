<html>
<head>
	<link rel="stylesheet" type="text/css" href="Aspect.css">

</head>
<style>
body{
		background-image: url("imagini/cont.jpg");
}
</style>
<body>
<div class="meniu">
<a  href="Acasa.php">Acasa</a>
<a href="Reviste.php">Reviste</a>
<a href="FilmeAnimatii.php">Filme/Animatii</a>
<a href="Cosul_tau.php">Cosul tau</a>
<a class="selectat" href="Contul_tau.php">Contul tau</a>

</div>

<div class="cont">
<?php
			if ( !isset($_SESSION) ) session_start();
			$mysql=mysql_connect("localhost","root","");
			$baza=mysql_select_db("atestat");		
			$sql="Select * from utilizatori where UserName='".$_SESSION["logat"]."';";
			$rez=mysql_query($sql);
			$nr = 0;	
			while($rand=mysql_fetch_array($rez))
			{                                                                    
				$user[$nr++]=$rand;
			}
			$p='<div class="main">';

			
			
			
			$p.='<table style="color:Black;background-color:orange;"> <tr><td style="background-color:black;color:gold"></td>';
			$p.='<tr><td>Numele contului:'.$user[0]["UserName"].' </td></tr>

			<tr><td><br><br>Numele:'.$user[0]["Nume"].'<br> Prenumele:'.$user[0]["Prenume"].'</tr></td>

			<tr><td><br><br>Schimbati parola <br>Parola actuala<br>
						<form action="http://localhost/Radu_Marius/atestat/ModificareDate.php" method="post" >
								<input type="password" name="Parola actuala"><br>
			<tr><td>	Parola noua <br>
								<input type="password" name="Parola_noua"><br></td></tr>
			<tr><td> Introduceti inca odata parola noua<br>
					<input type="password" name="Parola2">
			<tr><td> <input type="submit" value="Schimba parola"></form></tr></td>
						<tr><td><br><br>Numar de telefon:'.$user[0]["Telefon"].'</tr></td>
						<tr><td><br><br>Adresa de email:'.$user[0]["Mail"].'</tr></td>
						<tr><td><br><br>Orasul unde se fac livrarile:'.$user[0]["Oras"].'</tr></td>
						<tr><td><br><br>Adresa:'.$user[0]["Adresa"].'</tr></td>';
			$p.='</table></div>';
			echo $p;


?>

</div>

</body>
</html>