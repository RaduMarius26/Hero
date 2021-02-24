<?php
		  if ( !isset($_SESSION) ) session_start();
		$mysql=mysql_connect("localhost","root","");
		$baza=mysql_select_db("atestat");
		
		
		$id=$_POST['id'];
		$elimin=$_POST['in/out'];
		
		

		$sql='SELECT * FROM cos WHERE nume="'.$id.'"';
		$rez=mysql_query($sql);
		
		$nr=0;
		$rand=mysql_fetch_array($rez);
		$cos[$nr]=$rand;
		
		$sql="SELECT * FROM ".$cos[0]['tip']." WHERE nume='".$cos[0]["nume"]."';";
		$rez2=mysql_query($sql);
		
		$nr2=0;
		$rand=mysql_fetch_array($rez2);
		$produs[$nr2]=$rand;
		
		$stoc_produs=$produs[0]['stoc']+$cos[0]['cantitate']-$elimin;
		
		$stoc_cos=$elimin;
		$pret_cos=$produs[0]['pret']*$stoc_cos;
		if($stoc_cos==0)
		{
				$sql='UPDATE '.$cos[0]['tip'].' SET stoc='.$stoc_produs.' WHERE nume="'.$cos[0]['id'].'";';
				mysql_query($sql); 
				$sql='DELETE FROM cos WHERE id="'.$cos[0]['id'].'";';
				mysql_query($sql); 
				require"Cosul_tau.php";
		}
		else
		{
			$sql='UPDATE cos SET cantitate='.$stoc_cos.', pret='.$pret_cos.' WHERE id="'.$cos[0]['id'].'";';
			mysql_query($sql); 
			$sql='UPDATE '.$cos[0]['tip'].' SET stoc='.$stoc_produs.' WHERE nume="'.$cos[0]['id'].'";';
			mysql_query($sql); 
			
			require"Cosul_tau.php";
		}
?>