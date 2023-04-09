<?php
$server= "localhost";
$user= "root";
$password= "";
$db= "users";

$con = mysqli_connect($server,$user,$password,$db);

if($con){  
  
}else{
    ?>
        <script>
            alert("no connection");
        </script>
    <?php  
    header("Location: connection_error.php");
}
?>