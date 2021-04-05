<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Tambahkan Tabel Kegiatan</h1>
        </div><!-- /.col -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<br>

<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">

          <form action="<?= site_url('admin/tbl_kegiatan/simpan') ?>" method="post" enctype="multipart/form-data">

                <?=
                    form::input([
                        "title" => "user",
                        "type" => "hidden",
                        "fc" => "user_id",
                        "placeholder" => "tambahkan user_id",
                        "value" => iduser(),
                    ])
                ?>
                <?php if (generate_session('loginkelid') != ""): ?>
                    <?=
                    form::select_db([
                      "title" => "user keluarga",
                      "type" => "text",
                      "fc" => "user_kel_id",
                      "db" => "user_kel",
                      "data" => "id",
                      "name" => "nama",
                      "placeholder" => "tambahkan user_kel_id",
                      "condition" => [
                        "user_id" => iduser()
                      ],
                      "selected" => generate_session('loginkelid')
                    ])
                    ?>
                  <?php else: ?>
                    <?=
                    form::select_db([
                      "title" => "user keluarga",
                      "type" => "text",
                      "fc" => "user_kel_id",
                      "db" => "user_kel",
                      "data" => "id",
                      "name" => "nama",
                      "placeholder" => "tambahkan user_kel_id",
                      "condition" => [
                        "user_id" => iduser()
                      ]
                    ])
                    ?>
                <?php endif; ?>

                <?=
                    form::select_db([
                        "title" => "kegiatan",
                        "type" => "text",
                        "fc" => "kegiatan_id",
                        "db" => "mkegiatan",
                        "data" => "id",
                        "name" => "kegiatan",
                        "placeholder" => "tambahkan user_kel_id",
                        "condition" => [
                          "user" => iduser()
                        ]
                    ])
                ?>

                <?=
                    form::input([
                        "title" => "judul",
                        "type" => "text",
                        "fc" => "judul",
                        "placeholder" => "tambahkan judul",
                    ])
                ?>

                <?=
                    form::input([
                        "title" => "foto",
                        "type" => "file",
                        "fc" => "foto",
                        "placeholder" => "tambahkan foto",
                    ])
                ?>

                <?=
                    form::editor([
                        "title" => "isi",
                        "type" => "text",
                        "fc" => "isi",
                        "placeholder" => "tambahkan isi",
                    ])
                ?>

                <?=
                    form::input([
                        "title" => "waktu",
                        "type" => "date",
                        "fc" => "waktu",
                        "placeholder" => "tambahkan waktu",
                    ])
                ?>

                <?=
                    form::select_db([
                        "title" => "status",
                        "type" => "text",
                        "fc" => "status_id",
                        "db" => "mstatus",
                        "data" => "id",
                        "name" => "status",
                        "placeholder" => "tambahkan status",
                    ])
                ?>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url('admin/tbl_kegiatan'); ?>">Back</a>
              </div>
          </form>

				</div>
			</div>
		</div>
	</div>
</div>
</section>
