<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Ubah Master Kabupaten</h1>
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

          <form action="<?= site_url('admin/mkabupaten/update') ?>" method="post" enctype="multipart/form-data">
              
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "id",
                        "type" => "text",
                        "fc" => "id",
                        "placeholder" => "tambahkan id",
                        "value" => $form_data->id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "province",
                        "type" => "text",
                        "fc" => "province_id",
                        "placeholder" => "tambahkan province_id",
                        "value" => $form_data->province_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "name",
                        "type" => "text",
                        "fc" => "name",
                        "placeholder" => "tambahkan name",
                        "value" => $form_data->name,
                    ])
                ?>
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url('admin/mkabupaten'); ?>">Back</a>
              </div>
          </form>

				</div>
			</div>
		</div>
	</div>
</div>
</section>