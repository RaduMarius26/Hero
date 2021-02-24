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


	<?php
  if ( !isset($_SESSION) ) session_start();
  
		if(isset($_SESSION['completat']))
			$greseala=$_SESSION['completat'];
		else
			$greseala=' ';
			
		if(isset($_SESSION['log_necompletat']))
			$log_verif=$_SESSION['log_necompletat'];
		else
			$log_verif=' ';
			
		if(!isset($_SESSION["logat"]))
		{
			$p='<div class="main"><table style="color:blue;background-color:orange;float:right"> <tr><td style="background-color:black;color:gold">Logare pe cont'.$log_verif.'</td>';
			$p.='<tr><td>Numele contului
								<form action="http://localhost/Radu_Marius/atestat/logare_cont.php" method="post" >
								<input type="text" name="id"><br></td></tr>
			<tr><td>Parola <br>
								<input type="password" name="Pas"><br>
								<input type="submit" value="Logare"></td></tr></table></form>';
			
			
			
			
			
			
			
			$p.='<table style="color:blue;background-color:orange;"> <tr><td style="background-color:black;color:gold">Creaza un cont nou'.$greseala.'</td>';
			$p.='<tr><td>Numele contului
								<form action="http://localhost/Radu_Marius/atestat/adauga_cont.php" method="post" >
								<input type="text" name="UserName"><br></td></tr>
			<tr><td>Parola <br>
								<input type="password" name="Parola"><br></td></tr>
			<tr><td>	Confirma parola <br>
								<input type="password" name="Parola_Ver"><br></td></tr>
			<tr><td> Numele personal <br>
					<input type="text" name="Nume"><br></td></td>
			<tr><td> Prenumele personal<br>
					<input type="text" name="Prenume"><br></tr></td>
			<tr><td><br>Oras (livrarile se pot face doar in orasele listate)
					<br><select name="Oras">
						<option value="Bucuresti">Bucuresti</option>
						<option value="Sibiu">Sibiu</option>
						<option value="Constanta">Constanta</option>
						<option value="Iasi">Iasi</option>
						<option value="Brasov">Brasov</option>
						<option value="Timisoara">Timisoara</option>
						<option value="Craiova">Craiova</option>
						<option value="Pitesti">Pitesti</option>
				</select><br></tr></td>
			<tr><td><br> Adresa de livrare <br><input type="text" name="Adresa"><br></tr></td>
			<tr><td><br> Adresa de email <br><input type="text" name="Mail"><br></tr></td>
			<tr><td> Numarul de telefon <br><input type="number" name="Telefon"><br></tr></td>
			<tr><td> <input type="submit" value="Creaza cont"></form></tr></td><td>';
			$p.='</table></div>';
			echo $p;
		}
		else
		{
					$mysql=mysql_connect("localhost","root","");
					$baza=mysql_select_db("atestat");	
					$p='<div class="cont">';
					$sql='SELECT * FROM Utilizatori WHERE UserName="'.$_SESSION["logat"].'";';
					$rez=mysql_query($sql);
					$nr = 0;
					while($rand=mysql_fetch_array($rez))
					{                                                                                 
						$user[$nr++]=$rand;
					}
					$p.="<H1 style='color:red'>".$_SESSION["logat"]." ".$user[0]["Nume"]." ";
					 $p.='<BR><a href="deconectare.php">Deconectare</a><BR>
							<a href="InformatiiCont.php">Datele contului</a><BR>
							<a href="IstoricComenzi.php">Comenzile efectuate de pe acest cont</a>
					 
					 
					 </H1>';
					
					
					
					$p.="</div>";
					echo $p;
		}
	
	
	?>


</body>






</html>