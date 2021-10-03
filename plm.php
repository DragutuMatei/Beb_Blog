<?php

$text = "<p>sugi cucu</p>";
$headers = "From: raresdragutu9@gmail.com\r\n";
$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

try{
    mail("dragutumatei573@yahoo.ro", "Contact blog", $text, $headers);
} catch(Exception $e){
    echo $e->getMessage();
}