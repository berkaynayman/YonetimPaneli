<?php
if (!empty($_GET["tablo"]))
{
    $tablo=$VT->filter($_GET["tablo"]);
    $kontrol=$VT->VeriGetir("moduller","WHERE tablo=? AND durum=?",array($tablo,1),"ORDER BY ID ASC",1);    
    if ($kontrol!=false) 
    {
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-darl"><?=  $kontrol[0]["baslik"] ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active"><?=$kontrol[0]["baslik"]?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-right mb-4">
          <a href="<?=SITE?>ekle/<?=$kontrol[0]["tablo"]?>" class="btn btn-success"><i class="fa fa-plus"></i>YENİ EKLE</a>
        </div>
      </div>
        <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Sıra</th>
                      <th>Açıklama</th>
                      <th>Durum</th>
                      <th>Tarih</th>
                      <th>İşlem</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                        $veriler=$VT->VeriGetir($kontrol[0]["tablo"],"","","ORDER BY ID ASC");
                        if ($veriler!=false) 
                        {
                          $sira=0;
                          for($i=0;$i<count($veriler);$i++)
                          {
                            $sira++;
                            ?>
                              <tr>
                                <td><?=$sira?></td>
                                <td><?php 
                                echo stripslashes($veriler[$i]["baslik"]);
                                echo '<br/>'. mb_substr(strip_tags(stripslashes($veriler[$i]["metin"])),0,130,"UTF-8")."...";
                                ?>
                                </td>
                                <td>-</td>
                                <td><?=$veriler[$i]["tarih"]?></td>
                                <td>
                                <a href="<?=SITE?>duzenle/<?=$kontrol[0]["tablo"]?>/<?=$veriler[$i]["ID"]?>" class="btn btn-warning btn-sm">Düzenle</a>
                                <a href="<?=SITE?>sil/<?=$kontrol[0]["tablo"]?>/<?=$veriler[$i]["ID"]?>" class="btn btn-danger btn-sm">Sil</a>
                                </td>
                              </tr>
                            <?php
                          }
                        }
                      ?>
                    
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Sıra</th>
                      <th>Açıklama</th>
                      <th>Durum</th>
                      <th>Tarih</th>
                      <th>İşlem</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    <?php
    }
    else
    {
       ?>
       <meta http-equiv="refresh" content="0;url=<?=SITE?>">
       <?php
    }
}
else
{
    ?>
    <meta http-equiv="refresh" content="0;url=<?=SITE?>">
    <?php
}
?>