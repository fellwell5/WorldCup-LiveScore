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
###BEGIN API-Reading
#matches?sort=currentGameMinute&fields=homeScore,awayScore,currentGameMinute,awayTeamId,homeTeamId
#teams?sort=id&fields=name,logo,website,id
$matchurl = "http://worldcup.kimonolabs.com/api/matches?apikey=".$apikey."&sort=currentGameMinute&fields=homeScore,awayScore,currentGameMinute,awayTeamId,homeTeamId";
$timejson = "match.json";
copy($matchurl, $timejson);
$string = file_get_contents($timejson);
$json = json_decode($string,true);
$cmatch = count($json);
for ($o = 0; $o <= $cmatch; $o++) {
    @$time = $json[$o]["currentGameMinute"];
if($time == ""){
    #
}else{
@$home = $json[$o]["homeScore"];
@$away = $json[$o]["awayScore"];
@$time = $json[$o]["currentGameMinute"];
@$homeid = $json[$o]["homeTeamId"];
@$awayid = $json[$o]["awayTeamId"];
#echo "<b>$o</b>  $home : $away<br>";
}
}

#$homeid = "test"; $awayid = "test";

if(!empty($homeid) && !empty($awayid)){
$string = file_get_contents("teams.json");
$tjson = json_decode($string,true);
$cteams = count($tjson);
for ($i = 0; $i <= $cteams; $i++) {
    @$id = $tjson[$i]["id"];
if($id == $homeid){
@$hname = $tjson[$i]["name"];
@$hlogo = $tjson[$i]["logo"];
@$hweb = $tjson[$i]["web"];
}
if($id == $awayid){
@$aname = $tjson[$i]["name"];
@$alogo = $tjson[$i]["logo"];
@$aweb = $tjson[$i]["web"];
}
}
}
#print_r(get_defined_vars());
###END API-Reading
?>
<table height="100%" width="100%">
<tr><td align="center" valign="middle">
    <div class="container">
    
    </div>
</td></tr>
</table>