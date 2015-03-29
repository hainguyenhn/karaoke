<?php
$username = "root";
$password = "1234";
$hostname = "nsa221:3306";

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password)
  or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";
  mysql_select_db("karaoke", $dbhandle)
        or die("Could not select database");




$call = ($_GET['action']){
  case 'view':
  display();
  break;

  case 'insert':
  insertFavoriteSong();
}
function insertFavoriteSong(){
  $myData = json_decode($_POST['myData']);
  $id = $myData -> {ID};
  $songName = $myData -> {songName};
  $query = "INSERT INTO favoriteSongs (id,songName) VALUES (". $id.",'$songName')";
  echo $query;
  mysql_query($query);
}

function display(){
  $query = mysql_query("SELECT * FROM favoriteSongs");
  $data = array();
  while($rows = mysql_fetch_array($query)){
    $data[] = array (
      "ID" => $rows['ID'],
      "songName" => rows['songName']);
    }
    return json_encode($data);
  }
}
?>
