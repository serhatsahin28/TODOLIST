<?php

require_once("db.php");


$login = sql("SELECT id,username FROM user WHERE id=" . $_SESSION['id']);
$login2 = mysqli_fetch_assoc($login);
$user_id = $login2['id'];



// $gelenid2 = songelen sınıfın sorgusu ile birleştir.


$sonveri = "SELECT * FROM projects WHERE user_id=$user_id ORDER BY id DESC LIMIT 1";
$sonveri2 = mysqli_query($connect, $sonveri);
$sveri3 = mysqli_fetch_assoc($sonveri2);




if (!empty($_GET['id'])) {
  $projects_id = $_GET['id'];

} else {
  $proje = "SELECT * FROM projects ORDER BY id DESC;
  ";
            $proje2 = mysqli_query($connect, $proje);
            $proje3=mysqli_fetch_assoc($proje2);
  
  $projects_id = $proje3['id'];
}   

if ($_POST) {

  $title2 = $_POST['gorevAdi'];
  $status_list = $_POST['status'];





  if (!empty($title2)) {
    $connect->query("INSERT INTO list (title,projects_id,status_list) VALUES ('$title2','$projects_id','$status_list')");
    
    header('Location: index.php?id=' . $projects_id);
  } else {
  
   
    header('Location: index.php?id='.$projects_id);
  }




}
