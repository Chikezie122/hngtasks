<?php
	try {
	$connection = new PDO('mysql:host=127.0.0.1;dbname=team', 'root', '');
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Unable to Connect";
	echo $e->getMessage();
	die();
}

$first_name = 'first_name';
$last_name = 'last_name';
$skillset = 'skillset';

$query = $connection->query('SELECT * FROM team_table');

$results = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $result) {
	# co
	echo $result['first_name'] .' '. $result['last_name'] .' is a '. $result['gender'].'<br>';
}
?>