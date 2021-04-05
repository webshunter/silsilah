<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Ubah tree</h1>
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

          <form action="<?= site_url('admin/tree/update') ?>" method="post" enctype="multipart/form-data">
              
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "User",
                        "type" => "hidden",
                        "fc" => "user_id",
                        "placeholder" => "tambahkan user_id",
                        "value" => iduser(),
                    ])
                ?>
            
                <?=
                    form::select_db([
                        "title" => "User Keluarga",
                        "type" => "password",
                        "fc" => "user_kel_id",
                        "placeholder" => "tambahkan user_kel_id",
                        "db" => "user_kel",
                        "data" => "id",
                        "name" => "nama",
                        "selected" => $form_data->user_kel_id,
                    ])
                ?>
            
                <?=
                    form::select_db([
                        "title" => "Sebagai",
                        "type" => "password",
                        "fc" => "mkel_id",
                        "placeholder" => "tambahkan mkel_id",
                        "db" => "mkel",
                        "data" => "id",
                        "name" => "keluarga",
                        "selected" => $form_data->mkel_id,
                    ])
                ?>
            
                <?=
                    form::select_db([
                        "title" => "Child",
                        "type" => "password",
                        "fc" => "child",
                        "placeholder" => "tambahkan child",
                        "db" => "user_kel",
                        "data" => "id",
                        "name" => "nama",
                        "selected" => $form_data->child,
                    ])
                ?>
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url('admin/tree'); ?>">Back</a>
              </div>
          </form>

				</div>
			</div>
		</div>
	</div>
</div>
</section>