  <?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("db.php");


if (!empty($_GET['id'])) {
  $list_id = $_GET['id'];
} else {
  $list_id = "";
}


//var_dump($id);
//exit;


$sql = "SELECT * FROM list WHERE id=$list_id";
if (mysqli_query($connect, $sql)) {
} else {
  echo "Hata: " . mysqli_error($connect);
}
$result3 = $connect->query($sql);
$project = mysqli_fetch_assoc($result3);



if (!empty($_GET['id'])) {
  $list_id = $_GET['id'];
} else {
  $list_id = "";
}


if (!empty($_GET['projects_id'])) {
  $projects_id = $_GET['projects_id'];
} else {
  $projects_id = "";
}



if ($_POST) {
  $title = $_POST['title'];
  $status_list = $_POST['status_list'];

  $title = htmlspecialchars($title);
  $status_list = htmlspecialchars($status_list);

  $sql = "UPDATE list SET title='$title',status_list='$status_list' WHERE id=$list_id";

  if ($connect->query($sql) === TRUE) {
    echo "Veri başarıyla güncellendi";
    header("location: index.php?id=".$projects_id);
  } else {
    echo "Güncelleme Hatası: ";
    header("location: index.php?durum=error");
  }
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
  <title>Document</title>
</head>

<body>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-4 mt-5">
  <form action="" method="POST">
    Görev adi:
    <input type="text" id="title" class="form-control " name="title" value="<?php echo $project['title'] ?>"><br><br>
 
    Görev:
    <select name="status_list" id="status_list" class="form-select col-5 mx-auto" aria-label="Default select example">
  <option value="yapılacak" <?php if($project['status_list'] == 'bayapılacaksladi') echo 'selected'; ?>>yapılacak</option>
  <option value="basladi" <?php if($project['status_list'] == 'basladi') echo 'selected'; ?>>basladi</option>
  <option value="devam ediyor" <?php if($project['status_list'] == 'devam ediyor') echo 'selected'; ?>>devam</option>
  <option value="bitti" <?php if($project['status_list'] == 'bitti') echo 'selected'; ?>>bitti</option>
  <option value="durduruldu" <?php if($project['status_list'] == 'durduruldu') echo 'selected'; ?>>durduruldu</option>
  <option value="iptal edildi" <?php if($project['status_list'] == 'iptal edildi') echo 'selected'; ?>>iptal edildi</option>
</select>


  

    <input type="hidden" id="id" name="id" value="">


    <button type="submit" class="btn btn-primary" id="kaydet">Kaydet</button>
    <button type="submit" class="btn btn-secondary" id="kapat">İptal</button>


    </div>
    </div>

    </div>
  </form>
  </div>
    </div>
    </div>
  
</body>

</html>