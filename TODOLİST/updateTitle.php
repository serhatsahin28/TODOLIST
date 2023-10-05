<?php
$connect=mysqli_connect("localhost","root","","todolist");


if (!empty($_GET['id'])) {
    $project_id = $_GET['id'];
  } else {
    $project_id = "";
  }
  if (!empty($_GET['title'])) {
    $title = $_GET['title'];
  } else {
    $title = "";
  }


//$title=$_POST['title'];
//$status_list=$_POST['status_list'];



if ($_POST) {
 
  

  
  $project_id = $_POST['id'];
  $title = $_POST['title'];
   
  $title = htmlspecialchars($title);
  $project_id = htmlspecialchars($project_id);


  $sql = "UPDATE projects SET title='$title' WHERE id=$project_id";


  if ($connect->query($sql) === TRUE) {
    header("location: index.php?id=".$project_id);
  } else {
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/4.0.0/font/MaterialIcons-Regular.ttf">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Document</title>
</head>

<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-4 mt-5">
<form action="" method="POST">
    Görev adi:
    <input type="text" id="title" class="form-control" name="title" value="<?php echo $title ?>">
    <input type="hidden" id="id" class="form-control" name="id" value="<?php echo $project_id ?>"><br>


    <button type="submit" class="btn btn-primary form-control mt-3" id="kaydet">Kaydet</button> <br>
    <br> <button type="submit" class="btn btn-secondary form-control " id="kapat">İptal</button> 
   <?php echo '<td><a class="fa fa-times mt-4 " style="font-size:25px; margin-left:165px;" onclick="confirm_delete(' . $project_id . ')">Projeyi Sil</a>  
    </td>';
?>

    </div>
    </div>

    </div>
  </form>
  </div>
  </div>
</div>
</body>
<script>
function confirm_delete(id) {
      if (confirm("Silmek istediğinizden emin misiniz?")) {
        // AJAX isteği gönder
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "silTitle.php");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
          if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            // Sonucu göster
            //alert(this.responseText);
            window.location.replace("index.php");
          }
        };
        xhr.send("id=" + id);
      } else {
        return false;
      }
    }


</script>
</html>