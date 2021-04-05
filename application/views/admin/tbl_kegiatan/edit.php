<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Ubah Tabel Kegiatan</h1>
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

          <form action="<?= site_url('admin/tbl_kegiatan/update') ?>" method="post" enctype="multipart/form-data">

        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>


        <?=
            form::input([
                "title" => "user",
                "type" => "hidden",
                "fc" => "user_id",
                "placeholder" => "tambahkan user_id",
                "value" => iduser(),
            ])
        ?>

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
                "selected" => $form_data->user_kel_id,
            ])
        ?>

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
                ],
                "selected" => $form_data->kegiatan_id,
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
            form::editor([
                "title" => "isi",
                "type" => "text",
                "fc" => "isi",
                "placeholder" => "tambahkan isi",
                "value" => $form_data->isi,
            ])
        ?>

        <?=
            form::input([
                "title" => "waktu",
                "type" => "date",
                "fc" => "waktu",
                "placeholder" => "tambahkan waktu",
                "value" => $form_data->waktu,
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
                "selected" => $form_data->status_id,
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
