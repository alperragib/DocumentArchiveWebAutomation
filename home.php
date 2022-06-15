<?php
ob_start();
session_start();
require_once __DIR__ . '/db_config.php';

if(!isset($_SESSION['username'])){
    header("Location:login.php");
    exit();
}

 
?>

<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Yönetim Paneli</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3">Yönetim Paneli</div>
            </a>


            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-map-marker-alt"></i>
                    <span>Tüm Lokasyonlar</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="doc_tur.php">
                        <i class="fas fa-fw fa-file-alt"></i>
                        <span>Döküman Türleri</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">
                            <i class="fas fa-fw fa-user-alt"></i>
                            <span>Profil</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-fw fa-sign-out-alt"></i>
                                <span>Çıkış yap</span></a>
                            </li>



                            <?php 
                            if($_SESSION['user_level']==2){ ?>
                             <!-- Divider -->
                             <hr class="sidebar-divider">
                             <!-- Heading -->
                             <div class="sidebar-heading">
                                Yönetici Ayarları
                            </div>

                            <!-- Nav Item - Charts -->
                            <li class="nav-item">
                                <a class="nav-link" href="users.php">
                                    <i class="fas fa-fw fa-users"></i>
                                    <span>Kullanıcılar</span></a>
                                </li>

                            <?php }
                            ?>


                            <!-- Sidebar Toggler (Sidebar) -->
                            <div class="text-center d-none d-md-inline">
                                <button class="rounded-circle border-0" id="sidebarToggle"></button>
                            </div>

                        </ul>
                        <!-- End of Sidebar -->

                        <!-- Content Wrapper -->
                        <div id="content-wrapper" class="d-flex flex-column">

                            <!-- Main Content -->
                            <div id="content">

                                <!-- Topbar -->
                                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                                    <!-- Sidebar Toggle (Topbar) -->
                                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                        <i class="fa fa-bars"></i>
                                    </button>


                                    <form method="POST" 
                                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Lokasyon ara..."
                                        aria-label="Search" aria-describedby="basic-addon2" name="search_loc">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit" name="search_location">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form> 

                                <!-- Topbar Navbar -->
                                <ul class="navbar-nav ml-auto">

                                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                                    <li class="nav-item dropdown no-arrow d-sm-none">
                                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-search fa-fw"></i>
                                    </a>
                                    <!-- Dropdown - Messages -->
                                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search" method="POST" >
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Lokasyon ara..." aria-label="Search"
                                            aria-describedby="basic-addon2" name="search_loc">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit" name="search_location">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">1</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Bildirim Merkezi
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">25 Mayıs 2021</div>
                                    <span class="font-weight-bold">Asisst Panel'e hoşgeldin. Kullanmaya başla ve işlerini kolaylaştır.</span>
                                </div>
                            </a>

                            <a class="dropdown-item text-center small text-gray-500" href="#">Tüm bildirimleri göster</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username'];?></span>
                        <img class="img-profile rounded-circle"
                        src="img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="profile.php">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profil
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Çıkış yap
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

    <?php
    if(isset($_GET['i'])) {

        if($_GET['i']=="1") {
         ?>

         <!-- Begin Page Content -->
         <div class="container-fluid">

             <div class="container">
              <br>

              <?php
              if(isset($_GET['p']) && !empty($_GET['p'])){
                $loc_id = $_GET['p'];
                $il = "";
                $ilce = "";

                $baglanti3 = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
                $baglanti3->set_charset("utf8");
                if(!$baglanti3)
                {

                }
                else{

                    $sqlsorgu3 = "SELECT * FROM lokasyonlar WHERE id = $loc_id LIMIT 1";

                    $result3 = mysqli_query($baglanti3,$sqlsorgu3);

                    if(mysqli_num_rows($result3) > 0)
                    {
                        $row3 = mysqli_fetch_assoc($result3);

                        $il = $row3['il'];
                        $ilce = $row3['ilce'];
                    }

                    mysqli_close($baglanti3);
                }
                ?>
                <h3>Lokasyon Düzenle</h3>
                <hr>
                <br>
                <form method="POST">
                    <input type="hidden" name="e_loc_id" value="<?php echo $loc_id; ?>" />
                    <div class="mb-3">
                        <label class="form-label">İl</label>
                        <input type="text" class="form-control" name="e_il" value="<?php echo $il; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">İlçe</label>
                        <input type="text" class="form-control" name="e_ilce" value="<?php echo $ilce; ?>"  required>
                    </div>

                    <button type="submit" class="btn btn-primary" name="edit_loc">Düzenle</button>
                </form>

            <?php }
            else
                {   ?>
                    <h3>Lokasyon Ekle</h3>
                    <hr>
                    <br>
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">İl</label>
                            <input type="text" class="form-control" name="a_il" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">İlçe</label>
                            <input type="text" class="form-control" name="a_ilce" required>
                        </div>

                        <button type="submit" class="btn btn-primary" name="add_loc">Ekle</button>
                    </form>
                <?php }
                ?>



                <br>

                <?php

                if(isset($_GET['s'])){
                  $s = $_GET['s'];
                  $title = "İşlem Başarısız";
                  $content = "Bir hata meydana geldi!";

                  if($s=="0"){
                    $content = "Gerekli alanları doldurmalısın!";
                }
                else if($s=="1"){
                    $content = "";
                }
                else if($s=="2"){
                    $content = "";
                }
                else if($s=="3"){
                    $content = "";
                }
                else if($s=="4"){
                    $content = "Bir hata meydana geldi!";
                }
                else if($s=="5"){
                    $title = "işlem Başarılı!";
                    $content = "Lokasyon başarıyla kaydedildi.";
                }

                if($s=="5"){
                  ?>
                  <div class="col-lg-6 mb-4">
                    <div class="card bg-success text-white shadow">
                        <div class="card-body">
                            <h5><?php echo $title; ?></h5>
                            <?php echo $content; ?>
                        </div>
                    </div>
                </div>

                <?php
            }else{
              ?>
              <div class="col-lg-6 mb-4">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                        <h5><?php echo $title; ?></h5>
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
            <?php
        }

    }
    ?>

</br>
</br>

</div>
</div>
<!-- /.container-fluid -->
<?php   
}
elseif($_GET['i']=="3"){ ?>

    <div class="container-fluid">

        <?php
        $loc_id = $_GET['l'];
        $il = "";
        $ilce = "";

        $baglanti3 = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
        $baglanti3->set_charset("utf8");
        if(!$baglanti3)
        {

        }
        else{

            $sqlsorgu3 = "SELECT * FROM lokasyonlar WHERE id = $loc_id LIMIT 1";

            $result3 = mysqli_query($baglanti3,$sqlsorgu3);

            if(mysqli_num_rows($result3) > 0)
            {
                $row3 = mysqli_fetch_assoc($result3);

                $il = $row3['il'];
                $ilce = $row3['ilce'];
            }

            mysqli_close($baglanti3);
        }
        ?>

        <div class="container">
          <br>
          <h3>Döküman Ekle</h3>
          <h5 class="mt-3"><?php echo $il." / ".$ilce; ?></h5>
          <hr>
          <br>

          <?php

          if(isset($_GET['s'])){
              $s = $_GET['s'];
              $title = "İşlem Başarısız";
              $content = "Bir hata meydana geldi!";

              if($s=="0"){
                $content = "Gerekli alanları doldurmalısın!";
            }
            else if($s=="1"){
                $content = "Yüklenebileceğin maksimum belge boyutu 30 Megabayt'tan fazla olamaz!";
            }
            else if($s=="2"){
                $content = "Belge yüklenirken hata meydana geldi!";
            }
            else if($s=="3"){
                $content = "Bir hata meydana geldi!";
            }
            ?>
            <div class="col-lg-6 mb-4">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                        <h5><?php echo $title; ?></h5>
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
            <?php
        }

        ?>



        <form method="POST" enctype="multipart/form-data">

            <div class="custom-file">
                <input type="file" class="custom-file-input" id="a_doc_belge" name="a_doc_belge" required>
                <label class="custom-file-label" for="customFile">Belge Seç</label>
            </div>

            <div class="form-group">
                <br>
                <label for="exampleFormControlSelect1">Döküman Türü</label>
                <select class="form-control" id="exampleFormControlSelect1" name="a_doc_tur">
                    <?php
                    $baglanti3 = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
                    $baglanti3->set_charset("utf8");
                    if(!$baglanti3)
                    {

                    }
                    else{
                        $sqlsorgu3 = "SELECT * FROM dokuman_turleri ORDER BY adi ASC";

                        $result3 = mysqli_query($baglanti3,$sqlsorgu3);

                        if(mysqli_num_rows($result3) > 0)
                        {
                            while($row3 = mysqli_fetch_assoc($result3))
                            {
                                $tur_adi = $row3['adi'];
                                ?>
                                <option><?php echo $tur_adi; ?></option>
                                <?php
                            }
                        }
                        mysqli_close($baglanti3);
                    }
                    ?>
                </select>
                <br>
            </div>

            <div class="form-group row">

                <label for="example-date-input" class="col-2 col-form-label">Son Geçerlilik Tarihi</label>
                <div class="col-10">

                    <input class="form-control" type="date" value="<?php echo getDateNow(); ?>" id="example-date-input" name="a_doc_son_gec" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="add_doc">Ekle</button>
        </form>

    </div>
</div>

<?php }

}
elseif(isset($_GET['l']) && !empty($_GET['l'])){ ?>
    <div class="container-fluid">

        <?php
        $loc_id = $_GET['l'];
        $il = "";
        $ilce = "";

        $baglanti3 = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
        $baglanti3->set_charset("utf8");
        if(!$baglanti3)
        {

        }
        else{

            $sqlsorgu3 = "SELECT * FROM lokasyonlar WHERE id = $loc_id LIMIT 1";

            $result3 = mysqli_query($baglanti3,$sqlsorgu3);

            if(mysqli_num_rows($result3) > 0)
            {
                $row3 = mysqli_fetch_assoc($result3);

                $il = $row3['il'];
                $ilce = $row3['ilce'];
            }

            mysqli_close($baglanti3);
        }
        ?>

        <div class="container">
          <br>
          <h3><?php echo $il." / ".$ilce; ?></h3>
          <hr>
          <br>
          <form method="POST">
              <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-primary" onclick="location.href='home.php?i=3&l=<?php echo $_GET['l']; ?>'">Döküman Ekle</button>
                </div>
            </div>
        </form>
    </br>
</br>


<div class="container-fluid">
    <div id="accordion">

        <?php
        $loc_id = $_GET['l'];
        $id = "";
        $adi = "";
        $url = "";
        $tur_id = "";
        $tur_adi = "";
        $son_gecerlilik = "";
        $datetime = "";

        $baglanti3 = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
        $baglanti3->set_charset("utf8");
        if(!$baglanti3)
        {

        }
        else{

            $sqlsorgu3 = "SELECT DISTINCT tur_id FROM dokumanlar WHERE lokasyon_id = $loc_id";

            $result3 = mysqli_query($baglanti3,$sqlsorgu3);

            if(mysqli_num_rows($result3) > 0)
            {
                while($row3 = mysqli_fetch_assoc($result3))
                {
                    $tur_id = $row3['tur_id'];

                    $sqlsorgu4 = "SELECT * FROM dokuman_turleri WHERE id = $tur_id LIMIT 1";

                    $result4 = mysqli_query($baglanti3,$sqlsorgu4);

                    if(mysqli_num_rows($result4) > 0)
                    {
                        $row4 = mysqli_fetch_assoc($result4);
                        $tur_adi = $row4['adi'];
                    }

                    ?>
                    <div class="card">
                        <div class="card-header bg-secondary">
                          <a class="collapsed card-link" data-toggle="">
                            <h4 class="text-white"><?php echo $tur_adi;?></h4>
                        </a>
                    </div>
                    <div class="collapse show" data-parent="" style="display:block;">
                      <div class="card-body">
                        <ul class="list-group list-group-flush" style="white-space: nowrap;
                        overflow-x: auto;">
                        <?php

                        $sqlsorgu5 = "SELECT * FROM dokumanlar WHERE lokasyon_id = $loc_id AND tur_id=$tur_id ORDER BY datetime DESC";

                        $result5 = mysqli_query($baglanti3,$sqlsorgu5);

                        if(mysqli_num_rows($result5) > 0)
                        {
                            while($row5 = mysqli_fetch_assoc($result5))
                            {
                                $id = $row5['id'];
                                $adi = $row5['adi'];
                                $url = $row5['url'];
                                $son_gecerlilik = $row5['son_gecerlilik_tarihi'];
                                $datetime = $row5['datetime'];

                                ?>


                                <li class="list-group-item">
                                    <div class="d-flex w-100 justify-content-between">
                                      <a href="<?php echo $url;?>"><h5 class="mb-1"><?php echo $adi;?></h5></a>
                                      <small class="text-muted ml-3"><?php echo $datetime;?></small>
                                  </div>
                                  <small class="text-muted"><?php echo "Son geçerlilik tarihi ".$son_gecerlilik;?></small>
                                  <a href="home.php?i=4&<?php echo "l=".$loc_id."&d=".$id; ?>"><i class="fa fa-trash fa-lg text-gray-500 ml-3 mt-3"></i></a>
                              </li>

                              <?php
                          }
                      }

                      ?>
                  </ul>
              </div>
          </div>
      </div>
      <?php


  }
}

mysqli_close($baglanti3);
}
?>
</div>
</div>
</div>
</div>
<?php }
else{
    ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

     <div class="container">
      <br>
      <h3>Tüm Lokasyonlar</h3>
      <hr>
      <br>

      <form method="POST">
          <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary" onclick="location.href='home.php?i=1'">Lokasyon Ekle</button>
            </div>
        </div>
    </form>
</br>
</br>

<div class="row">

    <?php


    $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    $baglanti->set_charset("utf8");
    if(!$baglanti)
    {

    }
    else{

      if(isset($_GET['s']) && !empty($_GET['s'])){

        $search = $_GET['s'];

        $sqlsorgu2 = "SELECT * FROM lokasyonlar Where (il like '%$search%') ORDER BY il ASC";
    }
    else
    {
        $sqlsorgu2 = "SELECT * FROM lokasyonlar ORDER BY il ASC";
    }

    $result2 = mysqli_query($baglanti,$sqlsorgu2);

    if(mysqli_num_rows($result2) > 0)
    {/*
        $random = ['primary','success','info','warning','secondary'];
        $i=0;
        */
      while($row = mysqli_fetch_assoc($result2))
      {
        $lokasyon_id = $row['id'];

        $sqlsorgu3 = "SELECT count(*) as total FROM dokumanlar WHERE lokasyon_id = '$lokasyon_id'";
        $result3 = mysqli_query($baglanti,$sqlsorgu3);
        $row_totel_size = mysqli_fetch_assoc($result3);
        $row_totel_size = $row_totel_size['total'];
        if($row_totel_size == null){
            $row_totel_size = "0";
        }
/*
        $secili = $random[$i];

        if($i<(count($random)-1)){
            $i=$i+1;
        }
        else
        {
            $i=0;
        }

*/

        ?>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="home.php?l=<?php echo $lokasyon_id;?>">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    <?php echo $row_totel_size." Döküman";?></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['il']." / ".$row['ilce'];?></div>
                                </a>
                            </br>
                            <div class="container-fluid">
                              <div class="row d-flex justify-content-center">
                                <div class="col">
                                    <div class="text-center">
                                        <a href="home.php?i=1&p=<?php echo $lokasyon_id;?>">
                                          <i class="fa fa-edit fa-lg text-gray-300"></i></a>
                                      </div>
                                  </div>
                                  <div class="col">
                                    <div class="text-center">
                                        <a href="home.php?i=2&p=<?php echo $lokasyon_id;?>">
                                            <i class="fa fa-trash fa-lg text-gray-300"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      <!--<div class="row">
                        <a href="#">Düzenle</a>
                        <div class="ml-3"></div>
                        <a href="#">Sil</a>
                    </div>
                -->
            </div>

        </div>
    </div>
</div>
</div>
<?php
}

}
else{

}


mysqli_close($baglanti);
}

?>


</div>

</div>
</div>
<!-- /.container-fluid -->


<?php 
}
?>


</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Tüm Hakları Saklıdır.</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Asisst Panel</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Hesabınızdan çıkış yapmak istediğinize emin misiniz?</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal</button>
            <a class="btn btn-primary" href="javascript:void(0)" onclick="location.href='index.php?u=1'">Çıkış Yap</a>
        </div>
    </div>
</div>
</div>

<!-- deleteUserModal Modal-->
<div class="modal fade" id="deleteLocModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Asisst Panel</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="location.href='home.php'">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Lokasyonu silmek istediğinize emin misiniz?</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal" onclick="location.href='home.php'">İptal</button>
            <form method="POST">
              <button type="submit" class="btn btn-primary" name="delete_loc">Sil</button>
          </form>
      </div>
  </div>
</div>
</div>

<!-- deleteUserModal Modal-->
<div class="modal fade" id="deleteDocModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Asisst Panel</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="location.href='home.php?l=<?php echo $_GET['l'] ?>'">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Dökümanı silmek istediğinize emin misiniz?</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal" onclick="location.href='home.php?l=<?php echo $_GET['l'] ?>'">İptal</button>
            <form method="POST">
              <button type="submit" class="btn btn-primary" name="delete_doc">Sil</button>
          </form>
      </div>
  </div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>




<script>

    function showdeleteLoc() {
        $("#deleteLocModal").modal()

    }

    function showdeleteDoc() {
        $("#deleteDocModal").modal()

    }


    $('#a_doc_belge').on('change',function()
    {
        var fileName = $(this).val();
        $(this).next('.custom-file-label').html(fileName);
    })

</script>

<?php

if(isset($_GET['p'],$_GET['i']) && $_GET['i']=="2" && !isset($_POST['delete_loc'])){
    echo '<script type="text/javascript">',
    'showdeleteLoc();',
    '</script>'
    ;
}

if(isset($_GET['l'],$_GET['i'],$_GET['d']) && $_GET['i']=="4" && !isset($_POST['delete_doc'])){
    echo '<script type="text/javascript">',
    'showdeleteDoc();',
    '</script>'
    ;
}

if(isset($_POST['search_location'])){

    header("Location:home.php?s=".$_POST['search_loc']);
    exit();
}
elseif(isset($_POST['add_loc'])){
    $il = trim($_POST['a_il']);
    $ilce = trim($_POST['a_ilce']);

    if(empty($il) || empty($ilce)){
        header("Location:home.php?i=1&s=0");
        exit();
    }else
    {
        add_loc($il,$ilce);
    }

    
}

elseif(isset($_POST['edit_loc'])){
    $id = trim($_POST['e_loc_id']);
    $il = trim($_POST['e_il']);
    $ilce = trim($_POST['e_ilce']);

    if(empty($id) ||empty($il) || empty($ilce)){
        header("Location:home.php?i=1&s=0");
        exit();
    }else
    {
        edit_loc($id,$il,$ilce);
    }

    
}
elseif(isset($_POST['delete_loc'],$_GET['p'])){

    if(deleteLoc($_GET['p'])){
        header("Location:home.php");
        exit();
    }
    else
    {
        header("Location:home.php");
        exit();
    }
}

elseif(isset($_POST['delete_doc'],$_GET['d'])){
    $loc_id = $_GET['l'];
    if(deleteDoc($_GET['d'])){ 

        header("Location:home.php?l=".$loc_id);
        exit();
    }
    else
    {
        header("Location:home.php?l=".$loc_id);
        exit();
    }
}
elseif(isset($_POST['add_doc'])){
    $loc_id = $_GET['l'];
    $adi="";
    $tur_name = $_POST['a_doc_tur'];
    echo $tur_name;
    $tur_id = get_tur_id($tur_name);
    $son_gec_tar = $_POST['a_doc_son_gec'];
    $url="";
    $target_dir = "uploads/";
    $file_name = pathinfo($_FILES['a_doc_belge']['name'], PATHINFO_FILENAME);
    $extension = pathinfo($_FILES['a_doc_belge']['name'], PATHINFO_EXTENSION);
    $i=1;
    $target_file = $target_dir . $file_name . "_" .$i . "." .$extension;

    while(true) {

        if (file_exists($target_file))
        {
            $i=$i+1;
            $target_file = $target_dir . $file_name . "_" .$i . "." .$extension;
        }
        else
        {
            break;
        }
    }



    $adi = substr($target_file,strlen($target_dir));

    if(empty($adi) || empty($tur_name) || empty($loc_id) || empty($son_gec_tar) || empty($_FILES["a_doc_belge"])){

        header("Location:home.php?i=3&s=0&l=".$loc_id);

    }else
    {
        if ($_FILES["a_doc_belge"]["size"] > 30000000) {
          header("Location:home.php?i=3&s=1&l=".$loc_id);
      }
      else{
        if (move_uploaded_file($_FILES["a_doc_belge"]["tmp_name"], $target_file)) {
            $url = "http://alpaslanyeter.com/panel/".$target_file;

            save_doc($adi,$url,$loc_id,$tur_id,$son_gec_tar);
            
        } else {
            header("Location:home.php?i=3&s=2&l=".$loc_id);
        }
    }
}

}

function get_tur_id($adi){

    $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    $baglanti->set_charset("utf8");
    if(!$baglanti)
    {

    }
    else{

        $sqlsorgu1 = "SELECT * FROM dokuman_turleri WHERE adi='$adi' LIMIT 1";

        $result1 = mysqli_query($baglanti,$sqlsorgu1);

        if(mysqli_num_rows($result1) > 0)
        {
            $row1 = mysqli_fetch_assoc($result1);
            return $row1['id'];
        }

        else
        {
            return 1;
        }

        mysqli_close($baglanti);
    }
}

function save_doc($adi,$url,$lokasyon_id,$tur_id,$son_gecerlilik_tarihi){

    $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    $baglanti->set_charset("utf8");
    if(!$baglanti)
    {
        header("Location:home.php?i=1&s=4");
        exit();
    }
    else{
        $datetime = getDatetimeNow();
        $sqlsorgu1 = "INSERT INTO dokumanlar (adi,url,lokasyon_id,tur_id,son_gecerlilik_tarihi,datetime) VALUES ('$adi','$url','$lokasyon_id','$tur_id','$son_gecerlilik_tarihi','$datetime')";

        if(mysqli_query($baglanti, $sqlsorgu1))
        {
            header("Location:home.php?l=".$lokasyon_id);
            exit();
        }

        else
        {
            header("Location:home.php?i=3&s=3&l=".$lokasyon_id);
            exit();
        }

        mysqli_close($baglanti);
    }
}



function add_loc($il,$ilce){

    $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    $baglanti->set_charset("utf8");
    if(!$baglanti)
    {
        header("Location:home.php?i=1&s=4");
        exit();
    }
    else{

        $sqlsorgu1 = "INSERT INTO lokasyonlar (il,ilce) VALUES ('$il','$ilce')";

        if(mysqli_query($baglanti, $sqlsorgu1))
        {
            header("Location:home.php?i=1&s=5");
            exit();
        }

        else
        {
            header("Location:home.php?i=1&s=4");
            exit();
        }

        mysqli_close($baglanti);
    }
}

function edit_loc($loc_id,$il,$ilce){


    $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    $baglanti->set_charset("utf8");
    if(!$baglanti)
    {
        header("Location:home.php?i=1&s=4&p=".$loc_id);
        exit();
    }
    else{

        $sqlsorgu2 = "UPDATE lokasyonlar SET il='$il' , ilce='$ilce' WHERE id='$loc_id' ";

        if(mysqli_query($baglanti, $sqlsorgu2))
        {
            header("Location:home.php");
            exit();
        }
        else
        {
            header("Location:home.php?i=1&s=4&p=".$loc_id);
            exit();
        }



        mysqli_close($baglanti);
    }
}

function deleteLoc($loc_id){


    $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    $baglanti->set_charset("utf8");
    if(!$baglanti)
    {
        return false;
    }
    else{


        $sqlsorgu2 = "DELETE FROM lokasyonlar WHERE id = $loc_id";
        $result2 = mysqli_query($baglanti,$sqlsorgu2);

        if(mysqli_num_rows($result2) > 0)
        {
            return true;
        }
        else{
            return false;
        }


        mysqli_close($baglanti);
    }
}

function deleteDoc($doc_id){


    $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    $baglanti->set_charset("utf8");
    if(!$baglanti)
    {
        return false;
    }
    else{


        $sqlsorgu2 = "DELETE FROM dokumanlar WHERE id = $doc_id";
        $result2 = mysqli_query($baglanti,$sqlsorgu2);

        if(mysqli_num_rows($result2) > 0)
        {
            return true;
        }
        else{
            return false;
        }


        mysqli_close($baglanti);
    }
}

ob_flush();
?>