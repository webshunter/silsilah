<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Tambahkan admin</h1>
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
          
          <form action="<?= site_url('admin/admin/simpan') ?>" method="post" enctype="multipart/form-data">
              
                <?=
                    form::input([
                        "title" => "id",
                        "type" => "text",
                        "fc" => "id",
                        "placeholder" => "tambahkan id",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "username",
                        "type" => "text",
                        "fc" => "username",
                        "placeholder" => "tambahkan username",
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "password",
                        "type" => "text",
                        "fc" => "password",
                        "placeholder" => "tambahkan password",
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
                    form::input([
                        "title" => "status_id",
                        "type" => "text",
                        "fc" => "status_id",
                        "placeholder" => "tambahkan status_id",
                    ])
                ?>
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url('admin/admin'); ?>">Back</a>
              </div>
          </form>

				</div>
			</div>
		</div>
	</div>
</div>
</section>