<br>
<style media="screen">
.hover-card{
  transition: 0.3s;
}
.hover-card:hover{
  box-shadow: 5px 15px 25px rgba(123,123,123,0.5) !important;
}
</style>
<div class="notika-email-post-area">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="email-statis-inner notika-shadow">
                    <h1 class="m-0 text-dark">Berita Terkini</h1>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <br>
<div class="notika-email-post-area">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="email-statis-inner notika-shadow">
                  <!-- Start Card -->
                  <div class="row">

                  <?php if (!empty($detail)):


                  echo htmlspecialchars_decode($detail);
                  ?>

                  <?php
                  elseif(!empty($datatable)):
                    echo $datatable;
                  ?>

                  <?php else:
                    echo $list_berita;
                  ?>
                  </div>

                <?php endif; ?>
              </div>
          </div>
      </div>
  </div>
