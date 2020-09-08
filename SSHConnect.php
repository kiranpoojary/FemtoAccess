<?php
//set_include_path(getcwd());
include('Net/SSH2.php');
include('Crypt/Base.php');
include('Crypt/Hash.php');
include('Crypt/Random.php');
include('Math/BigInteger.php');
include('Net/SFTP/Stream.php');

$ssh = new Net_SSH2('135.254.155.11');
if (!$ssh->login('ute', 'ute')) {

	exit('UTE 135.254.155.11 is Not Reachable');
}else
{
	// code to get the Active BSR Load Name of Femto
	
	$result=$ssh->exec('cd nbudihal/ ; ./ml 172.63.102.51'); 
	$resultFromGDF = substr($result, strpos($result, "GDF") + 4);    
	$GDFPart0=explode(" ", trim($resultFromGDF));
	echo $GDFPart0[0];
	/*
	
	echo("<br>");
	$result=$ssh->exec('cd nbudihal/ ; pwd ; ./ml 172.63.102.51 '); 
	
	echo $result;
	//$result=$ssh->exec('cd nbudihal/ ; ./ml 172.63.102.51 ; oamconsole ; menu ; 7 ; 1');
	
*/
}

?>