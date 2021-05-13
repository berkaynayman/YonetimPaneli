<?php
 //error_reporting(0);
@session_start(); 
@ob_start();                // yönlendirme ve bazı header işlemlerini kullanmak için
define("DATA","data/");     // define komutu kullanarak sabit değişken tanımşamış oluyoruz
define("SAYFA","include/");
define("SINIF","class/");

include_once(DATA."baglanti.php");

define("SITE",$siteURL);

if(!empty($_SESSION["ID"]) && !empty($_SESSION["adsoyad"]) && !empty($_SESSION["mail"]))
{
}
else 
{
  ?>
  <meta http-equiv="refresh" content="0;url=<?=SITE?>giris-yap">
  <?php  
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $sitebaslik ?></title>
  <meta http-equiv="keywords" content="<?= $siteanahtar ?>">
  <meta http-equiv="description" content="<?= $siteaciklama ?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=SITE?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?=SITE?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=SITE?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=SITE?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=SITE?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=SITE?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=SITE?>plugins/daterangepicker/daterangepicker.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=SITE?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=SITE?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=SITE?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Select2 Ekle Page -->
  <link rel="stylesheet" href="<?=SITE?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=SITE?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=SITE?>plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php
  include_once(DATA."ust.php");

  include_once(DATA."menu.php"); 

  if ($_GET && !empty($_GET["sayfa"]))
  {
    $sayfa=$_GET["sayfa"].".php";
    if (file_exists(SAYFA.$sayfa)) 
    {
      include_once(SAYFA.$sayfa);
    }
    else
    {
      include_once(SAYFA."home.php");
    }

  }
  else{
    include_once(SAYFA."home.php");
  }

  include_once(DATA."footer.php");
  ?>



  <!-- Preloader -->
  
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?=SITE?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=SITE?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=SITE?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=SITE?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=SITE?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=SITE?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?=SITE?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=SITE?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=SITE?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=SITE?>plugins/moment/moment.min.js"></script>
<script src="<?=SITE?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=SITE?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=SITE?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=SITE?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=SITE?>dist/js/adminlte.js"></script>
<!-- DataTables -->
<script src="<?=SITE?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=SITE?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=SITE?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=SITE?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=SITE?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=SITE?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=SITE?>plugins/jszip/jszip.min.js"></script>
<script src="<?=SITE?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=SITE?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=SITE?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=SITE?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=SITE?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
<script src="<?=SITE?>plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=SITE?>dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=SITE?>dist/js/pages/dashboard.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
</script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()
  })
  function aktifpasif(ID,tablo){
    var durum=0;
    if($(".aktifpasif"+ID).is(':checked'))
    {
      durum=1;
    }
    else
    {
      durum=2;
    }
    $.ajax({
      method:"POST",
      url:"<?=SITE?>ajax.php",
      data:{"tablo":tablo,"ID":ID,"durum":durum},
      success: function()
      {
        if(sonuc=="TAMAM")
        {
        }
        else
        {
          alert("İşleminiz şuan geçersizdir ltfen daha sonra tekrar dene");
        }
      }
    });
  }
</script>
</body>
</html>
