<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Tambahkan User Keluarga</h1>
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

          <form action="<?= site_url('admin/user_kel/simpan') ?>" method="post" enctype="multipart/form-data">

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
                    form::input([
                        "title" => "nama",
                        "type" => "text",
                        "fc" => "nama",
                        "placeholder" => "tambahkan nama",
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
                    ])
                ?>

                <?=
                    form::input([
                        "title" => "tempat lahir",
                        "type" => "text",
                        "fc" => "tmptlahir",
                        "placeholder" => "tambahkan tmptlahir",
                    ])
                ?>

                <?=
                    form::input([
                        "title" => "tanggal lahir",
                        "type" => "date",
                        "fc" => "tgllahir",
                        "placeholder" => "tambahkan tgllahir",
                    ])
                ?>

                <?=
                    form::select_db([
                        "title" => "agama",
                        "type" => "password",
                        "fc" => "agama_id",
                        "placeholder" => "tambahkan agama_id",
                        "db" => "magama",
                        "data" => "id",
                        "name" => "agama",
                    ])
                ?>

                <?=
                    form::select_db([
                        "title" => "pendidikan",
                        "type" => "password",
                        "fc" => "pendidikan_id",
                        "placeholder" => "tambahkan pendidikan_id",
                        "db" => "mpendidikan",
                        "data" => "id",
                        "name" => "pendidikan",
                    ])
                ?>

                <?=
                    form::select_db([
                        "title" => "pekerjaan",
                        "type" => "password",
                        "fc" => "pekerjaan_id",
                        "placeholder" => "tambahkan pekerjaan_id",
                        "db" => "mpekerjaan",
                        "data" => "id",
                        "name" => "pekerjaan",
                    ])
                ?>

                <?=
                    form::input([
                        "title" => "alamat",
                        "type" => "text",
                        "fc" => "alamat",
                        "placeholder" => "tambahkan alamat",
                    ])
                ?>

                <?=
                    form::select_db([
                        "title" => "provinsi",
                        "type" => "password",
                        "fc" => "prov_id",
                        "placeholder" => "tambahkan prov_id",
                        "db" => "mprovinsi",
                        "data" => "id",
                        "name" => "name",
                    ])
                ?>

                <?=
                    form::select([
                        "title" => "kabupaten",
                        "type" => "password",
                        "fc" => "kab_id",
                        "placeholder" => "tambahkan kab_id",
                    ])
                ?>



                <?=
                    form::select([
                        "title" => "kecamatan",
                        "type" => "password",
                        "fc" => "kec",
                        "placeholder" => "tambahkan kec",
                    ])
                ?>

                <?=
                    form::select([
                        "title" => "kelurahan",
                        "type" => "password",
                        "fc" => "kel",
                        "placeholder" => "tambahkan kel",
                    ])
                ?>

                <?=
                    form::select_db([
                        "title" => "perkawinan",
                        "type" => "password",
                        "fc" => "perkawinan_id",
                        "placeholder" => "tambahkan perkawinan_id",
                        "db" => "mstatkel",
                        "data" => "id",
                        "name" => "statkel",
                    ])
                ?>

                <?=
                    form::input([
                        "title" => "tanggal menikah",
                        "type" => "date",
                        "fc" => "tglmenikah",
                        "placeholder" => "tambahkan tglmenikah",
                    ])
                ?>

                <?=
                    form::input([
                        "title" => "tanggal meninggal",
                        "type" => "date",
                        "fc" => "tglmeninggal",
                        "placeholder" => "tambahkan tglmeninggal",
                    ])
                ?>

                <?=
                    form::input([
                        "title" => "tempat meninggal",
                        "type" => "text",
                        "fc" => "tmptmeninggal",
                        "placeholder" => "tambahkan tmptmeninggal",
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
                    form::input([
                        "title" => "username",
                        "type" => "username",
                        "fc" => "username",
                        "placeholder" => "tambahkan username",
                    ])
                ?>

                <?=
                    form::input([
                        "title" => "password",
                        "type" => "password",
                        "fc" => "password",
                        "placeholder" => "tambahkan password",
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
                        "type" => "password",
                        "fc" => "status_id",
                        "placeholder" => "tambahkan status_id",
                        "db" => "mstatus",
                        "data" => "id",
                        "name" => "status",
                    ])
                ?>

                <?=
                    form::select_db([
                        "title" => "sebagai",
                        "type" => "password",
                        "fc" => "sebagai",
                        "placeholder" => "tambahkan sebagai",
                        "db" => "mkel",
                        "data" => "id",
                        "name" => "keluarga",
                    ])
                ?>

                <?=
                    form::select_db([
                        "title" => "kepala keluarga",
                        "type" => "password",
                        "fc" => "id_kel",
                        "placeholder" => "tambahkan id_kel",
                        "db" => "user_kel",
                        "data" => "id",
                        "name" => "nama",
                        "condition" => [
                          "user_id" => iduser(),
                          "sebagai" => '1'
                        ]
                    ])
                ?>



                                                <script type="text/javascript">
                                                  $(document).on('change', '#prov_id', function(){
                                                    var val = $(this).val();

                                                    $.ajax({
                                                      url: '<?= site_url('admin/user_kel/getkab/') ?>'+val,
                                                      success: function(response){
                                                        var opsi = JSON.parse(response);
                                                        opsi = opsi.map(function(el){
                                                          return `<option value='${el.id}'>${el.name}</option>`
                                                        }).join('');

                                                        opsi = '<option val="">Pilih Kabupaten</option>'+opsi;

                                                        document.getElementById('kab_id').innerHTML = opsi;

                                                      }
                                                    })


                                                  })
                                                </script>


                                                <script type="text/javascript">
                                                  $(document).on('change', '#kab_id', function(){
                                                    var val = $(this).val();

                                                    $.ajax({
                                                      url: '<?= site_url('admin/user_kel/getkec/') ?>'+val,
                                                      success: function(response){
                                                        var opsi = JSON.parse(response);
                                                        opsi = opsi.map(function(el){
                                                          return `<option value='${el.id}'>${el.name}</option>`
                                                        }).join('');

                                                        opsi = '<option val="">Pilih Kecamatan</option>'+opsi;

                                                        document.getElementById('kec').innerHTML = opsi;

                                                      }
                                                    })


                                                  })
                                                </script>


                                <script type="text/javascript">
                                  $(document).on('change', '#kec', function(){
                                    var val = $(this).val();
                                    $.ajax({
                                      url: '<?= site_url('admin/user_kel/getdes/') ?>'+val,
                                      success: function(response){
                                        var opsi = JSON.parse(response);
                                        opsi = opsi.map(function(el){
                                          return `<option value='${el.id}'>${el.name}</option>`
                                        }).join('');
                                        opsi = '<option val="">Pilih Desa</option>'+opsi;
                                        document.getElementById('kel').innerHTML = opsi;
                                      }
                                    })

                                  })
                                </script>



              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?php if (generate_session('kembali') != ''): ?>
                    <a class="btn btn-default" href="<?= site_url(generate_session('kembali')); ?>">Back</a>
                  <?php else: ?>
                    <a class="btn btn-default" href="<?= site_url('admin/user_kel'); ?>">Back</a>
                <?php endif; ?>
              </div>
          </form>

				</div>
			</div>
		</div>
	</div>
</div>
</section>
