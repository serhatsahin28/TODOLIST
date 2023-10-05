<body>

  <?php


  session_start();
  require_once("db.php");



  
  if (isset($_SESSION['id'])) {
    //var_dump($_SESSION['id']);
    //exit;


    $login = sql("SELECT id,username FROM user WHERE id=" . $_SESSION['id']);
    $login2 = mysqli_fetch_assoc($login);
    // t($login2);

  } else {
    header("Location: pages-login.php");
  }


  require_once("Projeadd.php");
  require_once("gorevAdd.php");
  require_once("htmlTop.php");
  require_once("header.php");
  require_once("sidebar.php");




  ?>





  <main id="main" class="main mt-5">



    <section class="section dashboard">
      <div class="row">




        <?php
        $a = $login2['id'];


        $sonveri = "SELECT * FROM projects WHERE user_id=$a ORDER BY id DESC LIMIT 1";
        $sonveri2 = mysqli_query($connect, $sonveri);
        $sveri3 = mysqli_fetch_assoc($sonveri2);




        ?>
        <br>

        <?php
        if (!empty($_GET['id'])) {
          $gelenid = $_GET['id'];
        } else {
          //Son eklenen projeyi anasayfada gösteriyor 
          // $gelenid = $sveri3['id'];

          $proje = "SELECT * FROM projects ORDER BY id DESC;
";
          $proje2 = mysqli_query($connect, $proje);
          $proje3 = mysqli_fetch_assoc($proje2);

          $gelenid = $proje3['id'];
        }





        $queryname = "SELECT * FROM  projects WHERE id=" . $gelenid;

        $result3 = mysqli_query($connect, $queryname);
        $project = mysqli_fetch_assoc($result3);



        //Eğer Id kısmı boş değilse Tabloyu ekranda göster


        echo '

  <div class="container">


  <div class="row"> 
  
  <h1>' . $project["title"] . ' 
  <a class="fa fa-edit" style="font-size:20px;" href="updateTitle.php?id=' . $project['id'] . '&title=' . $project['title'] . '"> </a> 
  </h1>

  <br>   
  <div class="col-9 gorevekle text-center">


    <table class="table table-borderless datatable">
    
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">List</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  ';






        //$count_query = "SELECT COUNT(id) FROM list WHERE projects_id=".$project['id'];
        //$count_result = mysqli_query($connect, $count_query);
        //$row = mysqli_fetch_assoc($count_result);


        if ($gelenid != '' || $gelenid != null) {
          $result2 = sql('Select * from list where is_deleted <> 1 AND projects_id=' . $gelenid);
          $i = 1;

          while ($querylist = mysqli_fetch_assoc($result2)) {

            $tarih = $querylist['date'];

            if (!empty($tarih) && strtotime($tarih)) {
              $trtarih = date("d.m.Y", strtotime($tarih));
            } else {
              $trtarih = "";
            }

            $url = 'update.php?id=' . $querylist['id'] . "&" . 'projects_id=' . $querylist['projects_id'];
            $sil = 'sil.php?id=' . $querylist["id"] . '&' . 'projects_id=' . $querylist['projects_id'];
            echo '<tr class="table-active">';
            echo '<td>' . $i . '</td>';
            echo '<td>' . $querylist["title"] . '</td>';
            echo '<td>' . $querylist["status_list"] . '</td>';
            echo '<td>' . $trtarih . '</td>';
            echo '<td><a class="fa fa-edit" href="' . $url . '"></a>';
            echo '<a href="' . $sil . '" class="fa fa-times" onclick="return confirm(\'Silmek istediğinizden emin misiniz?\')"></a></td>
           </tr> ';





            //$guncelle = "UPDATE list SET status_list='bitti' WHERE id=" . $querylist["id"];

            //data-target="#silme-'.$querylist['id'].'

            //href="sil.php?id=' . $querylist["id"] . '"


            $i++;
          }
        }



        echo '
    
      
    
        </tbody>
        </table>
        ';



        if (!empty($gelenid)) {
          echo '
          <br>
      <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal2">
        <i class="fa fa-plus" style="font-weight:bold;">GOREV EKLE</i>
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

      <br>


      <!--PROJELERİN SIRALANDIĞI ALAN BİTİŞ -->


      <script>
        document.addEventListener("DOMContentLoaded", () => {
          new ApexCharts(document.querySelector("#reportsChart"), {
            series: [{
              name: 'Sales',
              data: [31, 40, 28, 51, 42, 82, 56],
            }, {
              name: 'Revenue',
              data: [11, 32, 45, 32, 34, 52, 41]
            }, {
              name: 'Customers',
              data: [15, 11, 32, 18, 9, 24, 11]
            }],
            chart: {
              height: 350,
              type: 'area',
              toolbar: {
                show: false
              },
            },
            markers: {
              size: 4
            },
            colors: ['#4154f1', '#2eca6a', '#ff771d'],
            fill: {
              type: "gradient",
              gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.3,
                opacityTo: 0.4,
                stops: [0, 90, 100]
              }
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              curve: 'smooth',
              width: 2
            },
            xaxis: {
              type: 'datetime',
              categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
            },
            tooltip: {
              x: {
                format: 'dd/MM/yy HH:mm'
              },
            }
          }).render();
        });
      </script>
      <!-- End Line Chart -->


      <script>
        document.addEventListener("DOMContentLoaded", () => {
          echarts.init(document.querySelector("#trafficChart")).setOption({
            tooltip: {
              trigger: 'item'
            },
            legend: {
              top: '5%',
              left: 'center'
            },
            series: [{
              name: 'Access From',
              type: 'pie',
              radius: ['40%', '70%'],
              avoidLabelOverlap: false,
              label: {
                show: false,
                position: 'center'
              },
              emphasis: {
                label: {
                  show: true,
                  fontSize: '18',
                  fontWeight: 'bold'
                }
              },
              labelLine: {
                show: false
              },
              data: [{
                  value: 1048,
                  name: 'Search Engine'
                },
                {
                  value: 735,
                  name: 'Direct'
                },
                {
                  value: 580,
                  name: 'Email'
                },
                {
                  value: 484,
                  name: 'Union Ads'
                },
                {
                  value: 300,
                  name: 'Video Ads'
                }
              ]
            }]
          });
        });
      </script>

      </div>
      </div><!-- End Website Traffic -->


    </section>

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Modal add to list -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModal2">Yeni Gorev Ekleyiniz.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container mt-4">
            <div class="row">
              <div class="col-6 mx-auto">
                <form id="form" method="post" target="?/ProjectSave">
                  <div class="form-group">
                    <label for="projeAdi">Görev</label>
                    <input type="text" class="form-control" name="gorevAdi" id="title" placeholder="Gorev adi">
                    <br>
                    <select name="status" id="status" class="form-select" aria-label="Default select example">
                      <option value="basladi">yapılacak</option>
                      <option value="basladi">basladi</option>
                      <option value="devam ediyor">devam</option>
                      <option value="bitti">bitti</option>
                      <option value="iptal edildi">iptal edildi</option>
                    </select>

                  </div>
                  <br>


              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Proje Ekle</button>
          </form>
        </div>
      </div>
    </div>
  </div>











  </div>



  </div>


  <!-- Modal kullanarak Proje ekleme -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yeni Proje Ekleyiniz.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container mt-4">
            <div class="row">
              <div class="col-6 mx-auto">
                <form id="form" method="post">
                  <div class="form-group">
                    <label for="projeAdi">Proje</label>
                    <input type="text" class="form-control" name="projeAdi" id="projeAdi" placeholder="Proje adı">


                  </div>
                  <br>


              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Proje Ekle</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
<script>
  function confirm_delete(id) {
    if (confirm("Silmek istediğinizden emin misiniz?")) {
      // AJAX isteği gönder
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "sil.php");
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
          // Sonucu göster
          //alert(this.responseText);
          window.location.reload();
        }
      };
      xhr.send("id=" + id);
    } else {
      return false;
    }
  }

  function confirm_delete2(id) {
    if (confirm("Tüm Projeyi silmek istediğinizden emin misiniz?")) {
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








  // Click on a close button to hide the current list item
  var close = document.getElementsByClassName("close");
  var i;
  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }

  // Add a "checked" symbol when clicking on a list item
  var list = document.querySelector('ul');
  list.addEventListener('click', function(ev) {
    if (ev.target.tagName === 'LI') {
      ev.target.classList.toggle('checked');
    }
  }, false);

  // Create a new list item when clicking on the "Add" button
  function newElement() {
    var li = document.createElement("li");
    var inputValue = document.getElementById("myInput").value;
    var t = document.createTextNode(inputValue);
    li.appendChild(t);
    if (inputValue === '') {
      alert("You must write something!");
    } else {
      document.getElementById("myUL").appendChild(li);
    }
    document.getElementById("myInput").value = "";

    var span = document.createElement("SPAN");
    var txt = document.createTextNode("\u00D7");
    span.className = "close";
    span.appendChild(txt);
    li.appendChild(span);

    for (i = 0; i < close.length; i++) {
      close[i].onclick = function() {
        var div = this.parentElement;
        div.style.display = "none";
      }
    }
  }






  const dahaFazlaGosterBtn = document.getElementById("dahaFazlaGoster");
  const form = document.getElementById("form");



  dahaFazlaGosterBtn.addEventListener("click", function() {
    if (form.style.display === "none") {
      form.style.display = "block";
    } else {
      form.style.display = "none";
    }


  });

  function toggleCode() {
    var div = document.getElementById("scrollcyp");
    if (div.style.display === "none") {
      div.style.display = "block";
    } else {
      div.style.display = "none";
    }
  }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>