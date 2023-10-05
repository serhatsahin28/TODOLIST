<!--PROJELERİN SIRALANDIĞI ALAN  -->

<?php
if (!empty($_GET['id'])) {
  $gelenid = $_GET['id'];
} else {
  $gelenid = "";
}




$queryname = "SELECT * from projects where id='$gelenid'";

$result3 = $connect->query($queryname);
$project = mysqli_fetch_assoc($result3);




//Eğer Id kısmı boş değilse Tabloyu ekranda göster
if (!empty($_GET['id'])) {


  echo '

  <div class="veri">


  <div class="row"> 
  
  <h1>' . $project["title"] . ' 
  <a class="fa fa-edit" style="font-size:20px;" href="updateTitle.php?id=' . $project['id'] . '&title=' . $project['title'] . '"> </a> ';

  echo '
  </h1>
  <br>   
  <div class="col-9 gorevekle text-center">


    <table class="table table-hover">
    
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">List</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>';
} else {
  echo '';
}





//$count_query = "SELECT COUNT(id) FROM list WHERE projects_id=".$project['id'];
//$count_result = mysqli_query($connect, $count_query);
//$row = mysqli_fetch_assoc($count_result);

$i = 1;
$result2 = sql('Select * from list where is_deleted<>1 AND projects_id='.$gelenid);

while ($querylist = mysqli_fetch_assoc($result2)) {
  $tarih = $querylist['date'];

  if (!empty($tarih) && strtotime($tarih)) {
    $trtarih = date("d.m.Y", strtotime($tarih));
  } else {
    $trtarih = "";
  }

  echo '<tr class="table-active">';
  echo '<th scope="row">' . $i . '</th>';
  echo '<td>' . $querylist["title"] . '</td>';
  echo '<td>' . $querylist["status_list"] . '</td>';
  echo '<td>' . $trtarih . '</td>';
  echo '<td><a class="fa fa-edit" href="update.php?id=' . $querylist['id'] . "&" . 'projects_id=' . $querylist['projects_id'] . '"></a>';
  echo '<td><a href="sil.php?id=' . $querylist["id"] . "&" . 'projects_id=' . $querylist['projects_id'] . '" class="fa fa-times" onclick="return confirm(\'Silmek istediğinizden emin misiniz?\')"></a>  
    </td>';





  //$guncelle = "UPDATE list SET status_list='bitti' WHERE id=" . $querylist["id"];

  //data-target="#silme-'.$querylist['id'].'

  //href="sil.php?id=' . $querylist["id"] . '"


  $i++;
}


echo ' </tr>
    <tr>
      
    
  </tbody>
</table>
';



if (!empty($_GET['id'])) {
    echo '
      <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal2">
        <i class="fa fa-plus" style="font-weight:bold;">EKLE</i>
      </button>
    ';
  } else {
    echo '';
  }
  
  ?>
  
  </div>
  </div>
  
  
  
  </div>
  
  </div>
  
  
  
  <!--PROJELERİN SIRALANDIĞI ALAN BİTİŞ -->