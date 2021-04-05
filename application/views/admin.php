<br>
<style media="screen">
img {
max-width: 100%;
}
.slide-wrapper {
text-align: center;
}
</style>
<div class="notika-status-area">
  <div class="container">
<div class="row">
  <?php $idus = iduser();

  ?>
<?php if ($this->db->query("SELECT * FROM user_kel WHERE user_id = '$idus' ")->num_rows() > 0): ?>


<div id="myCarousel" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<?php foreach($this->db->query("SELECT * FROM user_kel WHERE user_id = '$idus' ")->result() as $key => $val) : ?>
<?php if ($key == 0): ?>
  <li data-target="#myCarousel" data-slide-to="<?= $key; ?>" class="active"></li>
  <?php else: ?>
    <li data-target="#myCarousel" data-slide-to="<?= $key; ?>"></li>
<?php endif; ?>
<?php endforeach ?>
</ol>

<!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox">
<?php
  $total = $this->db->query("SELECT * FROM user_kel WHERE user_id = '$idus' ")->num_rows();
  $r = 0;
?>
<?php foreach($this->db->query("SELECT * FROM user_kel WHERE user_id = '$idus' ")->result() as $key => $val) : ?>
  <?php if (fmod($key,4) == 0): ?>
        <div class="item active">
  <?php endif; ?>
    <div class="slide-wrapper col-sm-3">
      <a class="slide-link" href="#" tabindex="0"><img class="slide-image" src="<?= base_url('assets/gambar/user_kel/'.$val->foto) ?>" alt=""></a>
    </div>
    <?php $r++; ?>
   <?php if ($key == $total - 1): ?>
     </div>
     <?php else: ?>
       <?php if ($key == 4): ?>
         </div>
         <?php $r = 0; ?>
       <?php endif; ?>
   <?php endif; ?>
 <?php

  $r++;


   ?>
<?php endforeach ?>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
 <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
 <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
 <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
 <span class="sr-only">Next</span>
</a>
</div>
</div>
</div>
 </div>
<?php endif; ?>

<br>

<script type="text/javascript">
$(document).ready(function() {

$(window).resize(function() {

var browserWidth = $(window).innerWidth();

function resizeSlider(numColumns) {

  //Translate number of bootstrap columns
  if (numColumns == 4) {
    var bsColumn = "col-xs-3";
  } else if (numColumns == 3) {
    var bsColumn = "col-xs-4";
  } else if (numColumns == 2) {
    var bsColumn = "col-xs-6";
  } else if (numColumns == 1) {
    var bsColumn = "col-xs-12";
  }

  //Upwrap the slide images from their containing divs
  $(".slide-link").unwrap().unwrap();

  //Wrap every card in the appropriate bootstrap column
  $(".slide-link").wrap("<div class='" + bsColumn + " slide-wrapper'></div>");

  var slideWrappers = $(".slide-wrapper");

  //Wrap every 3 cards in an item class, forming 1 whole slide
  for (var i = 0; i < slideWrappers.length; i += numColumns) {
    if (i == 0) {
      var activeItem = ' active';
    } else {
      var activeItem = '';
    }

    slideWrappers.slice(i, i + numColumns).wrapAll("<div class='item" + activeItem + "'></div>");
  }

  //Empty the control indicators and rebuild them based on new number of slides
  $(".carousel-indicators").html("");

  var newNumberOfSlides = $("#myCarousel .item").length;

  for (var s = 0; s < newNumberOfSlides; s++) {
    if (s == 0) {
      var activeClass = "class='active'";
    } else {
      var activeClass = "";
    }

    $(".carousel-indicators").append("<li data-target='#carousel' data-slide-to='" + s + "'" + activeClass + "></li>");
  }
}

//if we're on a large desktop, organize the slides in 3 columns
if (browserWidth > 991) {
  resizeSlider(3);
  //Large Tablet - 3 columns
} else if (browserWidth > 767) {
  resizeSlider(2);
  //Small Tablet - 2 column
} else {
  resizeSlider(1);
}
}).resize();

});
</script>



<h2 style="text-align: center !important;">Silsilah Keluarga Besarku</h2>
<div class="notika-status-area">
     <div class="container">
         <div class="row">
             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                 <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                     <div class="website-traffic-ctn">
                        <?php
                          $c = iduser();
                          $cc = $this->db->query("SELECT * FROM user WHERE id = '$c' ")->row()->foto;
                          $credential = NULL;
                          if ($this->db->query("SELECT * FROM user_kel WHERE id = '$c' ")->num_rows() > 0) {
                            $credential = $this->db->query("SELECT * FROM user_kel WHERE id = '$c' ")->row()->id_kel;
                          }
                         ?>
                         <img src="<?= base_url('assets/gambar/user/'.$cc) ?>" width="100%" alt="">
                     </div>
                 </div>
             </div>
             <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                 <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                     <div class="website-traffic-ctn"  style="width: 100%;">
                         <h4>Data Keluarga Saya, <?= $this->db->query("SELECT * FROM user_kel WHERE user_id = '$c'")->num_rows();?></h4>
                         <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <h5>Keluarga Besar</h5>
                             <ul>
                               <?php if ($credential != NULL): ?>
                                 <?php foreach ($this->db->query("SELECT DISTINCT(mkel.keluarga) from
                                 user_kel LEFT JOIN mkel ON user_kel.sebagai = mkel.id
                                 where user_id = $c and id_kel = $credential order by user_kel.tgllahir ASC ")->result() as $key => $kUtama): ?>
                                 <li>
                                   <div class="row">
                                     <div class="col-md-6">
                                       <?= $kUtama->keluarga ?>
                                     </div>
                                     <div class="col-md-6">
                                       <?= $this->db->query("SELECT count(mkel.keluarga) as jumlah from user_kel LEFT JOIN mkel ON user_kel.sebagai = mkel.id where id_kel = $credential and mkel.keluarga = '$kUtama->keluarga' ")->row()
                                       ->jumlah ?>
                                     </div>
                                   </div>
                                 </li>
                               <?php endforeach; ?>
                               <?php endif; ?>
                             </ul>
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <h5>Keluarga Utama</h5>
                             <ul>
                               <?php if ($credential != NULL): ?>

                               <?php foreach ($this->db->query("SELECT DISTINCT(mkel.keluarga) from
                                 user_kel LEFT JOIN mkel ON user_kel.sebagai = mkel.id
                                 where user_id = $c and id_kel <> $credential and id_kel <> '' order by user_kel.tgllahir ASC ")->result() as $key => $kUtama): ?>
                               <li>
                                 <div class="row">
                                   <div class="col-md-6">
                                     <?= str_replace('Ibu','Istri',$kUtama->keluarga) ?>
                                   </div>
                                   <div class="col-md-6">
                                     <?= $this->db->query("SELECT count(mkel.keluarga) as jumlah from user_kel LEFT JOIN mkel ON user_kel.sebagai = mkel.id where id_kel = $c and mkel.keluarga = '$kUtama->keluarga'")->row()
                                     ->jumlah ?>
                                   </div>
                                 </div>
                              </li>
                             <?php endforeach; ?>
                           <?php endif; ?>
                             </ul>
                           </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
<br>
<div class="notika-status-area">
     <div class="container">
         <div class="row">
             <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
               <div class="row">
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                     <div class="website-traffic-ctn">
                       <h4>Sebaran Keluarga</h4>
                       <?php



                        $pekerjaan = $this->db->query("SELECT DISTINCT(kab_id) FROM user_kel WHERE user_id = '$c' ")->result();
                        echo "<ul>";
                        foreach ($pekerjaan as $key => $value) {
                          echo '<li>
                            <div class="row">
                              <div class="col-xs-10">
                          '.$this->db->query("SELECT * FROM mkabupaten WHERE id='$value->kab_id' ")->row()->name;
                          echo "
                              </div>
                              <div class=\"col-xs-2 text-right\">
                          <span class=\"pills\">".$this->db->query("SELECT * FROM user_kel  WHERE user_id = '$c' AND kab_id = '$value->kab_id' ")->num_rows().'</span>
                            </div>
                          </div>
                          </li>';
                        };
                        echo "</ul>";
                        ?>
                     </div>
                   </div>
                 </div>
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                     <div class="website-traffic-ctn"  style="width: 100%;">
                       <h4>Pekerjaan Keluarga</h4>

                       <?php



                        $pekerjaan = $this->db->query("SELECT DISTINCT(pekerjaan_id) FROM user_kel WHERE user_id = '$c' ")->result();
                        echo "<ul>";
                        foreach ($pekerjaan as $key => $value) {
                          echo '<li>
                            <div class="row">
                              <div class="col-xs-10">
                          '.$this->db->query("SELECT * FROM mpekerjaan WHERE id='$value->pekerjaan_id' ")->row()->pekerjaan;
                          echo "
                              </div>
                              <div class=\"col-xs-2 text-right\">
                          <span class=\"pills\">".$this->db->query("SELECT * FROM user_kel  WHERE user_id = '$c' AND pekerjaan_id = '$value->pekerjaan_id' ")->num_rows().'</span>
                            </div>
                          </div>
                          </li>';
                        };
                        echo "</ul>";
                        ?>
                     </div>
                   </div>
                 </div>
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 16px;">
                   <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                     <div class="website-traffic-ctn">
                       <div class="row">
                         <?php $id = iduser(); ?>
                         <?php if ($this->db->query("SELECT * FROM mkegiatan WHERE user = '$id' ")->num_rows() > 0): ?>
                           <?php foreach ($this->db->query("SELECT * FROM mkegiatan WHERE user = '$id' ")->result() as $key => $value): ?>
                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                               <h4><?= $value->kegiatan ?></h4>
                               <ul>
                                 <?php foreach ($this->db->query("SELECT * FROM tbl_kegiatan WHERE user_id = '".iduser()."' AND kegiatan_id = '$value->id' ")->result() as $key => $ff): ?>
                                   <li><?= $key + 1; ?>. <a href="<?= site_url('admin/tbl_kegiatan/detail/'.$ff->id); ?>"><?= $ff->judul ?></a></li>
                                 <?php endforeach; ?>
                               </ul>
                             </div>
                           <?php endforeach; ?>
                         <?php endif; ?>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                 <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                     <div class="website-traffic-ctn" style="width:100%;">
                         <h4>Data Umur</h4>
                         <?php



                          $pekerjaan = $this->db->query("SELECT DISTINCT(pekerjaan_id) FROM user_kel WHERE user_id = '$c' ")->result();
                          echo "<ul>";
                          $umenya = $this->db->query("SELECT * FROM mumur")->result();
                          foreach ($umenya as $key => $value) {
                            echo '<li>
                              <div class="row">
                                <div class="col-xs-10">
                            ';
                              echo "<span> $value->umur </span>";
                              $umur = 0;
                              foreach ($this->db->query("SELECT YEAR(CURDATE()) - DATE_FORMAT(tgllahir, '%Y') as umur FROM user_kel where user_id= '$c' ")->result() as $key => $value2) {
                                  if ($value2->umur >= $value->rentang_awal && $value2->umur <= $value->rentang_akhir) {
                                    // var_dump($value2->umur);
                                    $umur++;
                                  }
                              }
                            echo "
                                </div>
                                <div class=\"col-xs-2 text-right\">
                            <span class=\"pills\">".$umur.'</span>
                              </div>
                            </div>
                            </li>';
                          };
                          echo "</ul>";
                          ?>

                     </div>
                 </div>
                 <br>
                 <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                     <div class="website-traffic-ctn" style="width:100%;">
                         <h4>Status Keluarga</h4>
                         <?php



                          $pekerjaan = $this->db->query("SELECT DISTINCT(perkawinan_id) FROM user_kel WHERE user_id = '$c' ")->result();
                          echo "<ul>";
                          foreach ($pekerjaan as $key => $value) {
                            echo '<li>
                              <div class="row">
                                <div class="col-xs-10">
                            '.$this->db->query("SELECT * FROM mstatkel WHERE id='$value->perkawinan_id' ")->row()->statkel;
                            echo "
                                </div>
                                <div class=\"col-xs-2 text-right\">
                            <span class=\"pills\">".$this->db->query("SELECT * FROM user_kel  WHERE user_id = '$c' AND perkawinan_id = '$value->perkawinan_id' ")->num_rows().'</span>
                              </div>
                            </div>
                            </li>';
                          };
                          echo "</ul>";
                          ?>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <br>
