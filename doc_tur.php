<?php
ob_start();
session_start();
require_once __DIR__ . '/db_config.php';

if(!isset($_SESSION['username'])){
    header("Location:login.php");
    exit();
}
?>

<!doctype html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Döküman Türleri</title>

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
            <li class="nav-item">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-map-marker-alt"></i>
                    <span>Tüm Lokasyonlar</span></a>
                </li>

                <li class="nav-item active">
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

                                    <h3>Döküman Türleri</h3>
                                    <!-- Topbar Navbar -->
                                    <ul class="navbar-nav ml-auto">



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
                if(isset($_GET['i']))
                {
                    if($_GET['i']=="1"){ ?>
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                           <div class="container">
                              <br>

                              <?php
                              if(isset($_GET['t']) && !empty($_GET['t'])){

                                $doc_tur_id = $_GET['t'];
                                $doc_tur_adi = "";

                                $baglanti3 = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
                                $baglanti3->set_charset("utf8");
                                if(!$baglanti3)
                                {

                                }
                                else{

                                    $sqlsorgu3 = "SELECT * FROM dokuman_turleri WHERE id = $doc_tur_id LIMIT 1";

                                    $result3 = mysqli_query($baglanti3,$sqlsorgu3);

                                    if(mysqli_num_rows($result3) > 0)
                                    {
                                        $row3 = mysqli_fetch_assoc($result3);

                                        $doc_tur_adi = $row3['adi'];
                                    }

                                    mysqli_close($baglanti3);
                                }

                                ?>
                                <h3>Döküman Türü Düzenle</h3>
                                <hr>
                                <br>

                                <form method="POST">
                                    <input type="hidden" name="e_doc_tur_id" value="<?php echo $doc_tur_id; ?>" />
                                    <div class="mb-3">
                                        <label class="form-label">Döküman Türü Adı</label>
                                        <input type="text" class="form-control" name="e_doc_tur_adi" required value="<?php echo $doc_tur_adi;?>">
                                    </div>

                                    <button type="submit" class="btn btn-primary" name="edit_doc_tur">Güncelle</button>
                                </form>
                            <?php }else
                            { ?>
                                <h3>Döküman Türü Ekle</h3>
                                <hr>
                                <br>

                                <form method="POST">
                                    <div class="mb-3">
                                        <label class="form-label">Döküman Türü Adı</label>
                                        <input type="text" class="form-control" name="a_doc_tur_adi" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary" name="add_doc_tur">Ekle</button>
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
                                    $content = "Bir hata meydana geldi!";
                                } ?>

                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            <h5><?php echo $title; ?></h5>
                                            <?php echo $content; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php }

                            ?>

                        </div>
                    </div>
                <?php }
            }else
            { ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                 <div class="container">
                  <br>
                  <h3>Tüm Döküman Türleri</h3>
                  <hr>
                  <br>
                  <form method="POST">
                      <div class="row">
                        <div class="col">
                         <button type="button" class="btn btn-primary" onclick="location.href='doc_tur.php?i=1'">Döküman Türü Ekle</button>
                     </div>
                 </div>
             </form>

             <br>
             <br>

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

                    $sqlsorgu2 = "SELECT * FROM dokuman_turleri Where (adi like '%$search%') ORDER BY adi ASC";
                }
                else
                {
                    $sqlsorgu2 = "SELECT * FROM dokuman_turleri ORDER BY adi ASC";
                }

                $result2 = mysqli_query($baglanti,$sqlsorgu2);

                if(mysqli_num_rows($result2) > 0)
                {
                  while($row = mysqli_fetch_assoc($result2))
                  {
                    $doc_tur_id = $row['id'];
                    $doc_tur_adi = $row['adi'];

                    $sqlsorgu3 = "SELECT count(*) as total FROM dokumanlar WHERE tur_id = '$doc_tur_id'";
                    $result3 = mysqli_query($baglanti,$sqlsorgu3);
                    $row_totel_size = mysqli_fetch_assoc($result3);
                    $row_totel_size = $row_totel_size['total'];
                    if($row_totel_size == null){
                        $row_totel_size = "0";
                    }

                    ?>



                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                            <?php echo $row_totel_size." Döküman";?></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $doc_tur_adi; ?></div>
                                        </br>
                                        <div class="container-fluid">
                                          <div class="row d-flex justify-content-center">
                                            <div class="col">
                                                <div class="text-center">
                                                    <a href="doc_tur.php?i=1&t=<?php echo $doc_tur_id;?>">
                                                      <i class="fa fa-edit fa-lg text-gray-300"></i></a>
                                                  </div>
                                              </div>

                                              <?php 
                                              if($row_totel_size=="0"){
                                                ?>
                                                <div class="col">
                                                    <div class="text-center">
                                                        <a href="doc_tur.php?i=2&t=<?php echo $doc_tur_id;?>">
                                                            <i class="fa fa-trash fa-lg text-gray-300"></i></a>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>


                                            </div>
                                        </div>

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
<?php }
?>

<!-- /.container-fluid -->

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
<div class="modal fade" id="deleteDocTurModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Asisst Panel</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="location.href='doc_tur.php'">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Döküman türünü silmek istediğinize emin misiniz?</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal" onclick="location.href='doc_tur.php'">İptal</button>
            <form method="POST">
              <button type="submit" class="btn btn-primary" name="delete_doc_tur">Sil</button>
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

</body>

</html>

<script>

    function showdeleteDocTur() {
        $("#deleteDocTurModal").modal()

    }

</script>

<?php

if(isset($_GET['t'],$_GET['i']) && $_GET['i']=="2" && !isset($_POST['delete_doc_tur'])){
    echo '<script type="text/javascript">',
    'showdeleteDocTur();',
    '</script>'
    ;
}
if(isset($_POST['delete_doc_tur'],$_GET['t'])){
    $doc_tur_id = $_GET['t'];
    if(deleteDocTur($doc_tur_id)){ 

        header("Location:doc_tur.php");
        exit();
    }
    else
    {
        header("Location:doc_tur.php");
        exit();
    }
}
elseif(isset($_POST['add_doc_tur'])){
    $adi = trim($_POST['a_doc_tur_adi']);

    if(empty($adi)){
        header("Location:doc_tur.php?i=1&s=0");
        exit();
    }else
    {
        add_doc_tur($adi);
    }

    
}

elseif(isset($_POST['edit_doc_tur'])){
    $id = trim($_POST['e_doc_tur_id']);
    $adi = trim($_POST['e_doc_tur_adi']);

    if(empty($id) ||empty($adi)){
        header("Location:doc_tur.php?i=1&s=0&t=$id");
        exit();
    }else
    {
        edit_doc_tur($id,$adi);
    }

    
}


function add_doc_tur($adi){

    $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    $baglanti->set_charset("utf8");
    if(!$baglanti)
    {
        header("Location:doc_tur.php?i=1&s=1");
        exit();
    }
    else{

        $sqlsorgu1 = "INSERT INTO dokuman_turleri (adi) VALUES ('$adi')";

        if(mysqli_query($baglanti, $sqlsorgu1))
        {
            header("Location:doc_tur.php");
            exit();
        }

        else
        {
            header("Location:doc_tur.php?i=1&s=1");
            exit();
        }

        mysqli_close($baglanti);
    }
}

function edit_doc_tur($id,$adi){


    $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    $baglanti->set_charset("utf8");
    if(!$baglanti)
    {
        header("Location:doc_tur.php?i=1&s=1&t=".$id);
        exit();
    }
    else{

        $sqlsorgu2 = "UPDATE dokuman_turleri SET adi='$adi' WHERE id='$id' ";

        if(mysqli_query($baglanti, $sqlsorgu2))
        {
            header("Location:doc_tur.php");
            exit();
        }
        else
        {
            header("Location:doc_tur.php?i=1&s=1&t=".$id);
            exit();
        }



        mysqli_close($baglanti);
    }
}


function deleteDocTur($doc_tur_id){


    $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    $baglanti->set_charset("utf8");
    if(!$baglanti)
    {
        return false;
    }
    else{


        $sqlsorgu2 = "DELETE FROM dokuman_turleri WHERE id = $doc_tur_id";
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