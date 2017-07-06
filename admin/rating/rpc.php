<?php
/*
Page:           rpc.php
Created:        Aug 2006
Last Mod:       Mar 18 2007
This page handles the 'AJAX' type response if the user
has Javascript enabled.
---------------------------------------------------------
ryan masuga, masugadesign.com
ryan@masugadesign.com
Licensed under a Creative Commons Attribution 3.0 License.
http://creativecommons.org/licenses/by/3.0/
See readme.txt for full credit details.
--------------------------------------------------------- */
/*
header("Cache-Control: no-cache");
header("Pragma: nocache");
*/
require('_config-rating.php'); // get the db connection info

//getting the values
$vote_sent = preg_replace("/[^0-9]/","",$_GET['j']);
$id_sent = preg_replace("/[^0-9a-zA-Z]/","",$_GET['q']);
$ip_num = preg_replace("/[^0-9\.]/","",$_GET['t']);
$units = preg_replace("/[^0-9]/","",$_GET['c']);
$ip = preg_replace("/[^0-9\.]/","",$_SERVER['REMOTE_ADDR']);
//$ip = $_SERVER['REMOTE_ADDR'];
/*
echo "$vote_sent<br/>";
echo "$id_sent<br/>";
echo "$ip_num<br/>";
echo "$units<br/>";
echo "$ip<br/>";*/
/*
if ($vote_sent > $units) die("Sorry, vote appears to be invalid."); // kill the script because normal users will never see this.
*/

//connecting to the database to get some information
$query = mysqli_query($rating_conn ,"SELECT total_votes, total_value, used_ips FROM rating WHERE id='$id_sent' ");
if (!$query)
  {
  echo("Error description: " . mysqli_error($rating_conn));
  }

$numbers = mysqli_fetch_assoc($query);
$checkIP = unserialize($numbers['used_ips']);
$count = $numbers['total_votes']; //how many votes total
$current_rating = $numbers['total_value']; //total number of rating added together and stored
$sum = $vote_sent+$current_rating; // add together the current vote value and the total vote value
$tense = ($count==1) ? "voto" : "votos"; //plural form votes/vote
/*
print_r($checkIP);
echo "$count<br/>";
echo "$current_rating<br/>";
echo "$tense<br/>";*/

// checking to see if the first vote has been tallied
// or increment the current number of votes
($sum==0 ? $added=0 : $added=$count+1);
//echo "$sum<br>";
//echo "$added<br>";

// if it is an array i.e. already has entries the push in another value
((is_array($checkIP)) ? array_push($checkIP,$ip_num) : $checkIP=array($ip_num));
$insertip=serialize($checkIP);
//print_r($insertip);
//echo "<br/>";

//IP check when voting
$query2= mysqli_query($rating_conn,"SELECT used_ips FROM rating WHERE used_ips LIKE '%".$ip."%' AND id='".$id_sent."' ");
if (!$query2)
  {
  echo("Error description: " . mysqli_error($rating_conn));
  }
$voted=mysqli_num_rows($query2);
//echo "$voted<br/>";

if(!$voted) {     //if the user hasn't yet voted, then vote normally...

	if (($vote_sent >= 1 && $vote_sent <= $units) && ($ip == $ip_num)) { // keep votes within range, make sure IP matches - no monkey business!
		$result = mysqli_query($rating_conn ,"UPDATE rating SET total_votes='".$added."', total_value='".$sum."', used_ips='".$insertip."' WHERE id='$id_sent'");
    if (!$result)
      {
      echo("Error description: " . mysqli_error($rating_conn));
      }
	}
} //end for the "if(!$voted)"
// these are new queries to get the new values!
$newtotals = mysqli_query($rating_conn, "SELECT total_votes, total_value, used_ips FROM rating WHERE id='$id_sent' ");
if (!$newtotals)
  {
  echo("Error description: " . mysqli_error($rating_conn));
  }

$numbers = mysqli_fetch_assoc($newtotals);
$count = $numbers['total_votes'];//how many votes total
$current_rating = $numbers['total_value'];//total number of rating added together and stored
$tense = ($count==1) ? "voto" : "votos"; //plural form votes/vote

// $new_back is what gets 'drawn' on your page after a successful 'AJAX/Javascript' vote

$new_back = array();

$new_back[] .= '<ul class="unit-rating" style="width:'.$units*$rating_unitwidth.'px;">';
$new_back[] .= '<li class="current-rating" style="width:'.@number_format($current_rating/$count,2)*$rating_unitwidth.'px;"></li>';
$new_back[] .= '<li class="r1-unit">1</li>';
$new_back[] .= '<li class="r2-unit">2</li>';
$new_back[] .= '<li class="r3-unit">3</li>';
$new_back[] .= '<li class="r4-unit">4</li>';
$new_back[] .= '<li class="r5-unit">5</li>';
$new_back[] .= '</ul>';
$new_back[] .= '<p class="voted">'.$id_sent.'. Votos: <strong>'.@number_format($sum/$added,1).'</strong>/'.$units.' ('.$count.' '.$tense.') ';
$new_back[] .= '<span class="thanks">Gracias por tu voto!</span></p>';

$allnewback = join("\n", $new_back);

// ========================

//name of the div id to be updated | the html that needs to be changed
$output = "unit_long$id_sent|$allnewback";
echo $output;
?>
