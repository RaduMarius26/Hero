<?php
  if ( !isset($_SESSION) ) session_start();
	$cantitate=$_POST['cantitate'];
	$id=$_POST['Id'];
	$tip=$_POST['tip_produs'];
	$mysql=mysql_connect("localhost","root","");
	$baza=mysql_select_db("atestat");
	$sql='SELECT * FROM '.$tip.' WHERE nume="'.$id.'"';
	$rez=mysql_query($sql);
	$stoc=$_POST['stoc'];
	
	
	$nr=0;
	while($rand=mysql_fetch_array($rez))
	$r[$nr++]=$rand;
	
	$sql='SELECT * FROM cos WHERE nume="'.$id.'";';
	$nr2=0;
	$rez=mysql_query($sql);
	
	while($rand=mysql_fetch_array($rez))
	$cos[$nr2++]=$rand;
	
	$diferenta=$stoc-$cantitate;
	$modif_stoc='UPDATE '.$tip.' SET stoc='.$diferenta.' WHERE nume="'.$id.'";';
	mysql_query($modif_stoc);
			
	if($nr2==0)//produs nou
	{
		$pret=$r[0]["pret"]*$cantitate;

				//$_SESSION['comand_id']++

		$sql='insert into cos
		(id,tip,nume,pret,cantitate)
		Values("'.$id.'","'.$tip.'","'.$id.'",'.$pret.','.$cantitate.');';	
		mysql_query($sql);
	}
	
	
	
	else//produs vechi
	{

		$cantitate=$cantitate+$cos[0]["cantitate"];
		$pret=$r[0]["pret"]*$cantitate;
		$sql='UPDATE cos SET cantitate='.$cantitate.', pret='.$pret.' WHERE nume="'.$id.'";';
		mysql_query($sql);
	}
	
	require "Reviste.php";
	?>