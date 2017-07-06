<html>
<?php require('_drawrating.php');
require('_config-rating.php');
?>
<head>
<script type="text/javascript" language="javascript" src="js/behavior.js"></script>
<script type="text/javascript" language="javascript" src="js/rating.js"></script>
<link rel="stylesheet" type="text/css" href="css/rating.css" />
<style>
    h1,h2,h3{clear:both}
    pre{border:1px solid #ccc;background:#dadada;font-family:monospace;font-size:11px;color:#333;padding:10px;clear:both}
</style>
</head>
<body>
    <?php
        @$ide=1;
        echo "<div id='container2'>".rating_bar($ide,5,$valor)."</div>"; //10 numero de estrellas a mostrar

/*
        $ip =  $_SERVER['REMOTE_ADDR'];
        echo "$ip <br />";
        $query=mysqli_query($rating_conn ,"SELECT * FROM galeria WHERE id=1");
        if (!$query)
          {
          echo("Error description: " . mysqli_error($rating_conn));
          }
        $numbers=mysqli_fetch_array($query);


        echo $numbers[0];
        echo $numbers[1];
        echo $numbers[2];
        echo $numbers[3];
        echo $numbers[4];


        if ($numbers['used_ips'] == $ip)
         {
          echo "si son iguales";
        } else{
          echo "no son iguales";
        }

        $checkIP = unserialize($numbers['used_ips']);

        print_r($checkIP);
        $ip_num = "::1";
        ((is_array($checkIP)) ? array_push($checkIP,$ip_num) : $checkIP=array($ip_num));
        $insertip=serialize($checkIP);
        echo "$insertip";

        if ($ip == $ip_num)
        {
          echo" si son iguales";
        } else {
          echo "no lo son";
        }
//4,1,::1,5
        $query2= mysqli_query($rating_conn,"SELECT used_ips FROM galeria WHERE used_ips LIKE '%$ip%' AND id='1' ");
        if (!$query2)
          {
          echo("Error description: " . mysqli_error($rating_conn));
          }
        $voted=mysqli_num_rows($query2);
        echo "$voted <br />";
        $vote_sent = 4;
        $units = 5;
        $id_sent = preg_replace("/[^0-9a-zA-Z]/","",1);
        //echo "$id_sent <br />";

        $count = $numbers['total_value']; //how many votes total
        $current_rating = $numbers['total_value']; //total number of rating added together and stored
        $sum = $vote_sent+$current_rating;
        //echo "$sum <br />";
        echo "$count <br />";
        // checking to see if the first vote has been tallied
        // or increment the current number of votes
        ($sum==0 ? $added=0 : $added=$count+1);

        //echo "$added<br />";

        if (!$voted) {
        echo "si";
        if (($vote_sent >= 1 && $vote_sent <= $units) && ($ip == $ip_num)) { // keep votes within range, make sure IP matches - no monkey business!
          $result = mysqli_query($rating_conn ,"UPDATE galeria SET total_votes='".$added."', total_value='".$sum."', used_ips='".$insertip."' WHERE id='$id_sent'");
        }
      } else {
        echo "no";
      }
*/

    ?>

</body>
</html>
