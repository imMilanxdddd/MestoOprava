<?php
// NEODTESTOVANÝ KÓD, NESPÚŠTAT

// ZMENIT NA _POST NAMIESTO _GET!!!!
use OTPHP\TOTP;
$UUID = $_GET["UUID"];
$name = $_GET["title"];
$description = $_GET["description"];
$lat = $_GET["lat"];
$longitude = $_GET["long"];
$img = $_GET["img"]; //???
$OTP = $_GET["auth"]; // ???
$ip = $_SERVER['REMOTE_ADDR'];

$imgurl = "url"; // Po nahratí bude URL

$db = mysqli_connect("localhost", "root", "", "city"); // DB beží na localhoste len!!!!!

// Kontrola, či OTP kód súhlasí, ak nie, nech vyhodí chybu
//die("401: OTP Error");

if(empty($UUID)){
    die("400: Bad Request: You are missing UUID");
}

$IPCheck = "SELECT *  FROM `bannedip` WHERE `ip` = '$ip'";
$IPResoult = $db->query($IPCheck);
// https://www.w3schools.com/php/php_mysql_select.asp
if (($IPResoult->num_rows > 0)) {
    while ($row = $IPResoult->fetch_assoc() )
    {
        die("403: You are banned fron using our application.");  // AK JE IP/UUID ZABANOVANE
    }  
}

$UUIDCheck = "SELECT *  FROM `banneduuid` WHERE `uuid` = '$UUID'";
$UUIDResoult = $db->query($UUIDCheck);
if (($UUIDResoult->num_rows > 0)) {
    while ($row = $UUIDResoult->fetch_assoc() )
    {
        die("403: You are banned fron using our application.");  // AK JE IP/UUID ZABANOVANE
    }  
}


$sql = "INSERT INTO `problems` (`creatorUUID`, `name`, `latitude`, `longitude`, `descript`, `imageURL`) VALUES ('$UUID', '$name', '$lat', '$longitude', '$description', '$imgurl');";
$result = $db->query($sql);

// Pridať check na to, či sa úspešne poslalo do DB

$db->close(); 
?>