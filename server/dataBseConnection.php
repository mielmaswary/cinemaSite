<?php
    //  $connection=mysqli_connect('us-cdbr-east-04.cleardb.com','bf324ad36da1b1','041643af');
    //  if(mysqli_connect_errno())
    //  {
    //      echo "error!".mysqli_connect_error();
    //      echo "</br>";
    //  }
    //  $sql='USE cinema';
    //  if(mysqli_query($connection,$sql))
    //  {
    //     //  echo "Using cinema. </br>";
    //      echo "</br>";
    //  }
    //  else
    //  {
    //      echo "Error ".mysqli_error($connection);
    //      echo "</br>";
    //  }


     
?>

<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$connection = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>