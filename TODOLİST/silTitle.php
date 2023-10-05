<?php
$connect=mysqli_connect("localhost","root","","todolist");


if (!empty($_POST['id'])) {
    $id = $_POST['id'];
  } else {
    $id = "";
  }


  
$sql = "DELETE FROM projects  WHERE id=$id";

if ($connect->query($sql) === TRUE) {

} else {
  echo "Hata oluştu: " ;
}
?>
