<?php
	require_once 'class.openTableApi.php';
	$openTable = new openTable(array('dataformat'=>'json'));
	//$cities = $openTable->getAllCity();
	//$countries = $openTable->getAllCountries();
	//$restraunts = $openTable->searchRestaurants(array('country'=>'US','per_page'=>10));
	//print_r($restraunts);
	//$states = $openTable->getAllStats();
	//print_r($states);
	$getRestrauntById = $openTable->getRestrauntById('2');
	print_r($getRestrauntById);
	
	
	
	
?>