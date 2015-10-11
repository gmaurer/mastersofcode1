<?php
$name = $_REQUEST["name"];
$email = $_REQUEST["name"];
$donation = $_REQUEST["name"];

if ( $name != null and $email != null and $donation != null ) {
saveUser($name, $email, $donation);
}
?>
