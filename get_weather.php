<?php 
include_once('connect.php');
session_start();



$zip= $_POST['zip_cde']; 


$celcius=array();
$jsonurl = "http://api.openweathermap.org/data/2.5/weather?zip=$zip,au&appid=11ba8d385fb1ddb8d674e46946911606&units=metric";
$json = file_get_contents($jsonurl);
$weather = json_decode($json);
$temp= $weather->main->temp;
$humidity=$weather->main->humidity;
$wind=$weather->wind->speed;
$temp_precipitation= $weather->weather[0]->main;
$country=$weather->sys->country;
$city= $weather->name;

array_push($celcius,$temp,$humidity,$wind,$temp_precipitation,$country,$city);


$farn=array();
$jsonurl2 = "http://api.openweathermap.org/data/2.5/weather?zip=$zip,au&appid=11ba8d385fb1ddb8d674e46946911606&units=imperial";
$json2 = file_get_contents($jsonurl2);
$weather2 = json_decode($json2);
$temp2= $weather2->main->temp;
$humidity2=$weather->main->humidity;
$wind2=$weather->wind->speed;
$temp_precipitation2= $weather->weather[0]->main;


array_push($farn,$temp2,$humidity2,$wind2,$temp_precipitation2);

// print_r(array_merge($celcius,$farn));

echo implode(",",array_merge($celcius,$farn));



?>