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
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300' rel='stylesheet' type='text/css'>
<title>World Cup 2014 - Brasil</title>
</head>
<body>
<?php
###BEGIN API-Reading
#matches?sort=currentGameMinute&fields=homeScore,awayScore,currentGameMinute,awayTeamId,homeTeamId
#teams?sort=id&fields=name,logo,website,id
$matchurl = "http://worldcup.kimonolabs.com/api/matches?apikey=".$apikey."&sort=currentGameMinute&fields=homeScore,awayScore,currentGameMinute,awayTeamId,homeTeamId";
$timejson = "match.json";
###
#copy($matchurl, $timejson);
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
@$gtime = $json[$o]["currentGameMinute"];
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
        <?php
if($gtime == ""){
    echo "<h2>No Match found.</h2><p class='error'>Sorry.</p>";
}else{
        ?>
    <h2><a href="<?php echo $hweb; ?>"><img src="<?php echo $hlogo; ?>" height="75" width="75"></a> <?php echo $home; ?> : <?php echo $away; ?> <a href="<?php echo $aweb; ?>" ><img src="<?php echo $alogo; ?>" height="75" width="75"></a></h2>
        <p class="home"><?php echo $hname; ?></p> <p class="away"><?php echo $aname; ?></p>
        <?php } ?>
    </div>
</td></tr>
</table>
    <!-- START REMOVE FOOTER -->
<div class="footer">
    <ul class="pull-left">
    <li><a href="http://kimonolabs.com">API from kimonolabs.com</a></li>
    <li><a href="http://github.com/fellwell5/worldcup-livescore">find this project on github</a></li>
    <li><a href="http://twitter.com/fellwell5">follow me on twitter</a></li>
    </ul>
</div>
    <!-- STOP REMOVING FOOTER -->