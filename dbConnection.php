<?php
$databaseHost = 'mysql-service';
$databaseName = 'test';
$databaseUsername = 'root';
$databasePassword = 'root123';

// Open a new connection to the MySQL server
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

