<?php
$username = 'root';
$password = '';
$database = 'ketthuc';
try {
    $conn = new PDO('mysql:host=localhost;dbname='.$database, $username, $password);
} catch (\Exception $e) {
    echo $e->getMessage();
    die();
}
