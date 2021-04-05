<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Ubah Sosial Media</h1>
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

          <form action="<?= site_url('admin/sosmed/update') ?>" method="post" enctype="multipart/form-data">
              
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "nama sosmed",
                        "type" => "text",
                        "fc" => "title",
                        "placeholder" => "tambahkan title",
                        "value" => $form_data->title,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "icon",
                        "type" => "text",
                        "fc" => "icon",
                        "placeholder" => "tambahkan icon",
                        "value" => $form_data->icon,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "alamat",
                        "type" => "text",
                        "fc" => "link",
                        "placeholder" => "tambahkan link",
                        "value" => $form_data->link,
                    ])
                ?>
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url('admin/sosmed'); ?>">Back</a>
              </div>
          </form>

				</div>
			</div>
		</div>
	</div>
</div>
</section>