<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src='https://hips.hearstapps.com/hmg-prod/images/dwayne-johnson-attends-the-jumanji-the-next-level-uk-film-news-photo-1575726701.jpg' width="100"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="invoicehistory.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>



        </div>
    </div>
</nav>
<?php

session_start();

$conn = new SQLite3("DB") or die("Unable to open database");

$productNames = array("product1"=>"Darth Vader Helmet", "product2"=>"Grogu Plush", "product3"=>"ROTJ Jigsaw", "product4"=>"Aftermath", "product5"=>"Alphabet Squadron");
$productPrices= array("product1"=>299.0, "product2"=>32.95, "product3"=>219.95, "product4"=>24.95, "product5"=>24.95);
function footer():string
{
 date_default_timezone_set( 'Australia/Canberra');
    $filename = basename($_SERVER["SCRIPT_FILENAME"]);
    $footer = "This page was last modified: " . date("F d Y H:i:s.", filemtime($filename));
    return $footer;
}

function sanitiseData($unsanitisedData):string
{
    $unsanitisedData = trim($unsanitisedData);
    $unsanitisedData = stripslashes($unsanitisedData);
    $sanitisedData = htmlspecialchars($unsanitisedData);
    return $sanitisedData;
}
