<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " style="font-size:25px; font-weight:bold;">
        <i class="bi bi-grid"></i>
        <span>PROJELER</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <?php




    if (isset($_GET['id'])) {
      $id = $_GET["id"];
    } else {

      $id = "";
    }

    $a = $login2['id'];
    $result = sql("Select * from projects where user_id=$a");
    while ($project = mysqli_fetch_assoc($result)) {



      $is_active = ($project['id'] == $id) ? "active" : "";


      echo '



       <li class="nav-item">
      <a class="nav-link collapsed" href="?id=' . $project["id"] . '">
      <i class="bi bi-menu-button-wide ' . $is_active . '"></i><span>
      ' . $project["title"] . '
      </span><i class="bi bi-chevron-down ms-auto"></i>  
      </a>
  </li>
  
    ';
      if (!empty($_GET['id'])) {
        $gelenid = $_GET['id'];
      } else {
        $gelenid = "";
      }
    }
    ?>


  </ul>

</aside><!-- End Sidebar-->