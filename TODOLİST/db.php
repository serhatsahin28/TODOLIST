<?php  

$connect=mysqli_connect("localhost","root","","todolist");


function sql($query){
    GLOBAL $connect;
    return $connect->query($query);

}



function t($query){
   var_dump($query);
   die();

}


?>