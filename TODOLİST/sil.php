<?php
require_once("db.php");
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
  } else {
    $id = "";
  }





  if (!empty($_GET['projects_id'])) {
    $project_id = $_GET['projects_id'];
  } else {
    $project_id = "";
  }



$sql = "UPDATE list SET status_list='bitti',is_deleted=1 WHERE id=$id";

if ($connect->query($sql) === TRUE) {
 header("Location: index.php?id=".$project_id);

} else {
  echo "Hata oluştu: " ;
}
?>
