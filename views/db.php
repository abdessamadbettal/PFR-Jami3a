<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "jami3a_fil_rouge";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          echo "ne connect" ;
        }
        else {
            echo "connect" ;
        }
?>