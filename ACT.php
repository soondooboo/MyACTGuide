<?php

if ( ! empty($_POST) ) {

$mysqli = new mysqli('localhost', 'root', '', 'actcontactform'); /*Be sure to add a password in the empty string*/

if ($mysqli->connect_error) {
	die('Could not connect: ' . $mysqli->connect_errno . ': '. $mysqli->connect_error );
}


$sql = "INSERT INTO acttable (name, email, subject, message) VALUES ( '{$mysqli->real_escape_string($_POST['name'])}', '{$mysqli->real_escape_string($_POST['email'])}', 
'{$mysqli->real_escape_string($_POST['subject'])}', 
'{$mysqli->real_escape_string($_POST['message'])}' )"; 

$insert = $mysqli->query($sql);


if ( $insert ) {
	echo "Thank you for your feedback!";
	/* echo "Success! Row ID: {$mysqli->insert_id}"; */
} else {
	die("Error: {$mysqli->errno} : {$mysqli->error}");
}


$mysqli->close();
}
?>
