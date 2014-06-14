<?php
include "apikey.php";
if($apikey == "YOUR API-KEY HERE!"){
    exit('Put your ApiKey in apikey.php! Get your ApiKey <a href="http://kimonolabs.com">here</a>');
}
?>
<html>
<head>
<link href="main.css" rel="stylesheet">
<link href="bootstrap.css" rel="stylesheet">
<title>World Cup 2014 - Brasil</title>
</head>
<body>
<?php
#matches?sort=currentGameMinute&fields=homeScore,awayScore,currentGameMinute,awayTeamId,homeTeamId
#teams?sort=id&fields=name,logo,website,id
$request = "http://worldcup.kimonolabs.com/api/matches?apikey=".$apikey."";
$response = file_get_contents($request);
$results = json_decode($response, TRUE);
?>