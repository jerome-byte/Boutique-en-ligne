<?php

$hostname='sql101.infinityfree.com';
$dbname='if0_40135203_e_commerce';
$username='if0_40135203';
$password='tPdpnzr2aVgdj';




try {
		$pdo=new PDO("mysql:hostname=$hostname;dbname=$dbname", $username,$password);
		
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

} catch (Exception $e) 
{
	    die("Erreur de connexion à la BDD : " . $e->getMessage()); 

}
    
    


?>
    


