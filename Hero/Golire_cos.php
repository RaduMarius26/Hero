<?php
		  if ( !isset($_SESSION) ) session_start();
		$mysql=mysql_connect("localhost","root","");
		$baza=mysql_select_db("atestat");
		
	$sql='SELECT * FROM cos;';
	$rez=mysql_query($sql);

	$nr=0;
	while($rand=mysql_fetch_array($rez))
	$cos[$nr++]=$rand;
	
	for($i=0;$i<$nr;$i++)
	{
			$sql='SELECT * FROM '.$cos[$i]['tip'].' WHERE nume="'.$cos[$i]['nume'].'";';
			$rez=mysql_query($sql);
			$rand=mysql_fetch_array($rez);
			$produs[0]=$rand;
			$stoc_nou=$produs[0]['stoc']+$cos[$i]['cantitate'];
			$sql='UPDATE '.$cos[$i]['tip'].' SET stoc='.$stoc_nou.' WHERE nume="'.$cos[$i]['nume'].'";';
			mysql_query($sql);
	}



	$sql="DELETE FROM COS";
	mysql_query($sql);
	require"Cosul_tau.php";
?>