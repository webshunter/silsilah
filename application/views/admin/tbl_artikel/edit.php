<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Ubah Tabel Artikel</h1>
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

          <form action="<?= site_url('admin/tbl_artikel/update') ?>" method="post" enctype="multipart/form-data">
              
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::select_db([
                        "title" => "artikel",
                        "type" => "password",
                        "fc" => "artikel_id",
                        "placeholder" => "tambahkan artikel_id",
                        "db" => "martikel",
                        "data" => "id",
                        "name" => "artikel",
                        "selected" => $form_data->artikel_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "judul",
                        "type" => "text",
                        "fc" => "judul",
                        "placeholder" => "tambahkan judul",
                        "value" => $form_data->judul,
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
                        "title" => "deskripsi",
                        "type" => "text",
                        "fc" => "deskripsi",
                        "placeholder" => "tambahkan deskripsi",
                        "value" => $form_data->deskripsi,
                    ])
                ?>
            
                <?=
                    form::editor([
                        "title" => "content",
                        "type" => "text",
                        "fc" => "content",
                        "placeholder" => "tambahkan content",
                        "value" => $form_data->content,
                    ])
                ?>
            
                <?=
                    form::select_db([
                        "title" => "status",
                        "type" => "password",
                        "fc" => "status_id",
                        "placeholder" => "tambahkan status_id",
                        "db" => "mstatus",
                        "data" => "id",
                        "name" => "status",
                        "selected" => $form_data->status_id,
                    ])
                ?>
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url('admin/tbl_artikel'); ?>">Back</a>
              </div>
          </form>

				</div>
			</div>
		</div>
	</div>
</div>
</section>