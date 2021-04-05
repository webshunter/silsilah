<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Ubah Master Pekerjaan</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<br>

<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">

          <form action="<?= site_url('admin/mpekerjaan/update') ?>" method="post" enctype="multipart/form-data">
              
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "pekerjaan",
                        "type" => "text",
                        "fc" => "pekerjaan",
                        "placeholder" => "tambahkan pekerjaan",
                        "value" => $form_data->pekerjaan,
                    ])
                ?>
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url('admin/mpekerjaan'); ?>">Back</a>
              </div>
          </form>

				</div>
			</div>
		</div>
	</div>
</div>
</section>