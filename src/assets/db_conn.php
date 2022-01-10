<?php
$host = "localhost";
$port = "5432";
$dbname = "candidate_registration";
$user = "postgres";
$password = "password";
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);

if (!$dbconn) {
    echo "Error in connecting to database.";
} 
// else {
//     echo "Connected to " . pg_host($dbconn);
// }
?>