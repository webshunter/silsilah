<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Ubah User</h1>
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

          <form action="<?= site_url('admin/user/update') ?>" method="post" enctype="multipart/form-data">

        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>

                <?=
                    form::input([
                        "title" => "username",
                        "type" => "username",
                        "fc" => "username",
                        "placeholder" => "tambahkan username",
                        "value" => $form_data->username,
                    ])
                ?>

                <?=
                    form::input([
                        "title" => "password",
                        "type" => "password",
                        "fc" => "password",
                        "placeholder" => "tambahkan password",
                        "value" => $form_data->password,
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
                        "title" => "hp",
                        "type" => "text",
                        "fc" => "hp",
                        "placeholder" => "tambahkan hp",
                        "value" => $form_data->hp,
                    ])
                ?>

                <?=
                    form::input([
                        "title" => "namaayah",
                        "type" => "text",
                        "fc" => "namaayah",
                        "placeholder" => "tambahkan namaayah",
                        "value" => $form_data->namaayah,
                    ])
                ?>

                <?=
                    form::input([
                        "title" => "namaibu",
                        "type" => "text",
                        "fc" => "namaibu",
                        "placeholder" => "tambahkan namaibu",
                        "value" => $form_data->namaibu,
                    ])
                ?>

                <?=
                    form::input([
                        "title" => "email",
                        "type" => "email",
                        "fc" => "email",
                        "placeholder" => "tambahkan email",
                        "value" => $form_data->email,
                    ])
                ?>

                <?=
                    form::input([
                        "title" => "foto",
                        "type" => "file",
                        "fc" => "foto",
                        "placeholder" => "tambahkan status_id",
                        "value" => $form_data->foto,
                    ])
                ?>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url('admin/user'); ?>">Back</a>
              </div>
          </form>

				</div>
			</div>
		</div>
	</div>
</div>
</section>
