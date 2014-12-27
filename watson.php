<?php

if(isset($_REQUEST['query'])){
	$query = $_REQUEST['query'];
	$url = 'http://localhost:8080/watson?q='.urlencode($query);
 	$homepage = file_get_contents($url);
 	echo $homepage;
}
?>