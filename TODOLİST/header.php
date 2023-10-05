<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-center">
    <i class="bi bi-list toggle-sidebar-btn"></i>
    <a href="index.php" class="logo d-flex mx-3 align-items-center text-center">
      <span class="d-none d-lg-block">TO-DO-LİST</span>
    </a>
<?php  

if (isset($_SESSION['id'])) {
  //var_dump($_SESSION['id']);
  //exit;


  $login = sql("SELECT id,username FROM user WHERE id=" . $_SESSION['id']);
  $login2 = mysqli_fetch_assoc($login);

} else {
  header("Location: pages-login.php");
}

?>
  </div><!-- End Logo -->
  <div class="search-bar  mt-3">
    <form class="search-form d-flex" method="POST" action="#">
      <input type="text" name="query" placeholder="Search" title="Enter search keyword">
      <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form>
  </div><!-- End Search Bar -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->

      <li class="nav-item dropdown">

       

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <li class="dropdown-header">
            You have 4 new notifications
            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="notification-item">
            <i class="bi bi-exclamation-circle text-warning"></i>
            <div>
              <h4>Lorem Ipsum</h4>
              <p>Quae dolorem earum veritatis oditseno</p>
              <p>30 min. ago</p>
            </div>
          </li>

          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="notification-item">
            <i class="bi bi-x-circle text-danger"></i>
            <div>
              <h4>Atque rerum nesciunt</h4>
              <p>Quae dolorem earum veritatis oditseno</p>
              <p>1 hr. ago</p>
            </div>
          </li>

          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="notification-item">
            <i class="bi bi-check-circle text-success"></i>
            <div>
              <h4>Sit rerum fuga</h4>
              <p>Quae dolorem earum veritatis oditseno</p>
              <p>2 hrs. ago</p>
            </div>
          </li>

          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="notification-item">
            <i class="bi bi-info-circle text-primary"></i>
            <div>
              <h4>Dicta reprehenderit</h4>
              <p>Quae dolorem earum veritatis oditseno</p>
              <p>4 hrs. ago</p>
            </div>
          </li>

          <li>
            <hr class="dropdown-divider">
          </li>
          <li class="dropdown-footer">
            <a href="#">Show all notifications</a>
          </li>

        </ul><!-- End Notification Dropdown Items -->

      </li><!-- End Notification Nav -->

      
      <i class="fa fa-plus" data-toggle="modal" data-target="#exampleModal" style="font-weight:bold;margin-right:50px;">Proje Ekle</i>





      <li class="nav-item dropdown pe-3">


        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
       
          <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $login2['username'] ?></span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?php echo $login2['username'] ?></h6>
            <span>Kullanıcı no:<?php echo $login2['id'] ?></span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

         
         

          <li>
            <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
              <i class="bi bi-gear"></i>
              <span>Hesap Ayarları</span>
            </a>
          </li>
          

         

          <li>
            <a class="dropdown-item d-flex align-items-center" href="pages-logout.php">
              <i class="bi bi-box-arrow-right"></i>
              <span>Çıkış Yap</span>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->