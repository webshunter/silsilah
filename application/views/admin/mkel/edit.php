<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Ubah Master Keluarga</h1>
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

          <form action="<?= site_url('admin/mkel/update') ?>" method="post" enctype="multipart/form-data">
              
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "keluarga",
                        "type" => "text",
                        "fc" => "keluarga",
                        "placeholder" => "tambahkan keluarga",
                        "value" => $form_data->keluarga,
                    ])
                ?>
            
                <?=
                    form::select_db([
                        "title" => "jenis kelamin",
                        "type" => "password",
                        "fc" => "kelamin_id",
                        "placeholder" => "tambahkan kelamin_id",
                        "db" => "mkelamin",
                        "data" => "id",
                        "name" => "kelamin",
                        "selected" => $form_data->kelamin_id,
                    ])
                ?>
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url('admin/mkel'); ?>">Back</a>
              </div>
          </form>

				</div>
			</div>
		</div>
	</div>
</div>
</section>