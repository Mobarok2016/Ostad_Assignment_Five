<?php 
$index = $_GET['index'];

$data = file_get_contents('./users.json');
$data = json_decode($data, true);

unset($data[$index]);

$data = json_encode($data,JSON_PRETTY_PRINT);
file_put_contents('./users.json', $data);
header("Location: index.php");


?>