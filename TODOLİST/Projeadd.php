<!---PROJE EKLEME İSLEMLERİ -->

<?php
//pages-login sayfasıdna oturumu açtığım için,burada oturumu başlatınca hata veriyor (sadece hata mesajı çıkıyor) 
//session_start();

require_once("db.php");

$login = sql("SELECT id,username FROM user WHERE id=" .$_SESSION['id']);
$login2 = mysqli_fetch_assoc($login);
$user_id=$login2['id'];



$sonveri="SELECT * FROM projects WHERE user_id=$user_id ORDER BY id DESC LIMIT 1";
$sonveri2 = mysqli_query($connect,$sonveri);
$sveri3 = mysqli_fetch_assoc($sonveri2);


    
    $projects_id=$sveri3['id'];




if ($_POST) {
  $title = $_POST['projeAdi'];


  //$user_id=$_POST['user_id'];



  if (!empty($title)) {
    $connect->query("INSERT INTO projects (title,user_id) VALUES ('$title','$user_id')");

    header("Location: index.php?id=".$projects_id);
  } else {

    header("Location: index.php");
  }
}

?>