<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Ubah Testimoni</h1>
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

          <form action="<?= site_url('admin/testimony/update') ?>" method="post" enctype="multipart/form-data">
              
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "foto",
                        "type" => "file",
                        "fc" => "foto",
                        "placeholder" => "tambahkan foto",
                        "value" => $form_data->foto,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama",
                        "type" => "text",
                        "fc" => "nama",
                        "placeholder" => "tambahkan nama",
                        "value" => $form_data->nama,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "Deskripsi",
                        "type" => "text",
                        "fc" => "deskripsi",
                        "placeholder" => "tambahkan deskripsi",
                        "value" => $form_data->deskripsi,
                    ])
                ?>
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url('admin/testimony'); ?>">Back</a>
              </div>
          </form>

				</div>
			</div>
		</div>
	</div>
</div>
</section>