<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_kegiatan extends CI_Controller {

	private $table1 = 'tbl_kegiatan';

	public function __construct()
	{
		parent::__construct();
        Cek_login::ceklogin();
				$this->load->model('Createtable');
				$this->load->model('Datatable_gugus');
	}

	public function index($limit = 0, $page = 0)
	{
		$id = iduser();
		$tot = $this->db->query("SELECT * FROM tbl_kegiatan WHERE user_id = '$id'")->num_rows();
		$show = "";
		if ($tot > 0) {
			// code...

			$pageb = 5;
			$batas = 6;
			$beforelimit = $limit;
			$limit = $limit * $batas;
			$next = ($limit + $pageb) * $batas;
			$pagec = $page * $pageb;
			$pageo = $page;
			$pagem = $page - 1;
			$pagen = $page + 1;
			$pagin = ceil($tot / $batas);
			if ($pagin < $pageb) {
				$pageb = $pagin;
			}
			if ($pagin != 0) {
				if ($pagen >= $pagin/$pageb) {
					$pagen = $pageo;
				}
			}else{
				$pagen = $pageo;
			}
			if ($pagem < 0) {
				$pagem = $pageo;
			}
			$pathd = site_url('admin/tbl_kegiatan/tambah_data');
			$show .= "<br><br>";
			$show .= "<div class='row'>";
			foreach ($this->db->query("SELECT * FROM tbl_kegiatan WHERE user_id = '$id' limit $limit, $batas ")->result() as $key => $value) {
				$show .= "<div class='col-md-4' style='margin-bottom: 16px; padding: 20px;'>";
				$show .= "<div class='card text-center hover-card' style='margin: 10px; width: auto; box-shadow: 0px 0px 20px rgba(123,123,123,0.3); padding-bottom: 16px; border-radius: 10px; overflow: hidden;'>";
				$path = base_url('assets/gambar/tbl_kegiatan');
				$linkdetail = site_url('admin/tbl_kegiatan/detail');
				$show .= "<div style=\"background-image: url('$path/$value->foto'); width: 100%; height: 18rem; background-size: cover: background-position: center; background-repeat: no-repeat; \"></div>";
				$show .= "<h4 style=\"margin-top: 10px; margin-bottom: 10px; padding: 16px;\">$value->judul</h4>";
				$show .= "<a href=\"$linkdetail/$value->id\" class=\"btn btn-primary\" >Detail Kegiatan</a>";
				$show .= "</div>";
				$show .= "</div>";
			}
			$show .= "</div>";
			$show .= "<div>";
			$cx = site_url('admin/tbl_kegiatan/index');
			$show .= "
			<nav aria-label=\"Page navigation example\">
			<ul class=\"pagination\">";
			$show .= " <li class=\"page-item\"><a class=\"page-link\" href=\"$cx/".($pagem * $pageb)."/$pagem\">prev</a></li>";
			for ($i=$pagec; $i < $pageb + $pagec; $i++) {
				$cs = site_url('admin/tbl_kegiatan/index/'.$i.'/'.$pageo);
				$show .= " <li class=\"page-item\"><a class=\"page-link\" href=\"$cs\">".($i+1)."</a></li>";
			}
			$show .= " <li class=\"page-item\"><a class=\"page-link\" href=\"$cx/".($pagen * $pageb)."/$pagen\">next</a></li>";
			$show .= "</ul>
		</nav>
		";
		$show .= "</div>";
		}
				$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/tbl_kegiatan/view', $data);
        $this->load->view('templateadmin/footer');
	}

	public function detail($id)
	{
				$show = "";
				$id = $id;
				$pathd = site_url('admin/tbl_kegiatan');
				$pathedt = site_url('admin/tbl_kegiatan/table_show/update');
				$show .= "<div class='row'>";
				foreach ($this->db->query("SELECT * FROM tbl_kegiatan WHERE id = '$id' ")->result() as $key => $value) {
					$show .= "<div class='col-md-12'>";
						$show .= "<div class='card'>";
						$path = base_url('assets/gambar/tbl_kegiatan');
						$show .= "<img width='100%' src=\"$path/$value->foto\"></h3>";
						$show .= "<h3>$value->judul</h3>";
						$show .= htmlspecialchars_decode($value->isi);
						$show .= "<button class='btn btn-default' onclick=\"window.history.back()\" >Kembali</button>";
						$show .= "</div>";
					$show .= "</div>";
				}
				$show .= "</div>";
				$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/tbl_kegiatan/view', $data);
        $this->load->view('templateadmin/footer');
	}


	public function editor()
	{
        $this->Createtable->location('admin/tbl_kegiatan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","judul","foto","isi","waktu","action"]);
        $this->Createtable->order_set('0, 5');
				$show = $this->Createtable->create();
				$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/tbl_kegiatan/editor', $data);
        $this->load->view('templateadmin/footer');
	}

	public function table_show($action = 'show', $keyword = '')
	{
		if ($action == "show") {

            if (isset($_POST['order'])): $setorder = $_POST['order']; else: $setorder = ''; endif;

            $this->Datatable_gugus->datatable(
                [
                    "table" => $this->table1,
                    "select" => [
											"*"
										],
										"where" => [
												["user_id", '=', iduser()]
										],
                    'limit' => [
                        'start' => post('start'),
                        'end' => post('length')
                    ],
                    'search' => [
                        'value' => $this->Datatable_gugus->search(),
                        'row' => ["judul","foto","isi","waktu"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["judul","foto","isi","waktu"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"judul", "2"=>"foto", "3"=>"isi", "4"=>"waktu"],
                    ],
										"custome" => [
											"isi" => [
												"key" => ["id"],
												"content" => "<a href='".site_url('admin/tbl_kegiatan/detail/')."{{id}}'>Tampilkan Kegiatan</a>"
											]
										]

                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/tbl_kegiatan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/tbl_kegiatan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $user_id = post("user_id");
				$user_kel_id = post("user_kel_id");
				$kegiatan_id = post("kegiatan_id");
				$judul = post("judul");
				$foto = Form::getfile("foto", "assets/gambar/$this->table1/");
				$isi = post("isi");
				$waktu = post("waktu");
				$status_id = post("status_id");
        $simpan = $this->db->query("
            INSERT INTO tbl_kegiatan
            (user_id,user_kel_id,kegiatan_id,judul,foto,isi,waktu,status_id) VALUES ('$user_id','$user_kel_id','$kegiatan_id','$judul','$foto',\"$isi\",'$waktu','$status_id')
        ");


        if($simpan){
            redirect('admin/tbl_kegiatan/editor');
        }
    }

    public function update(){
          $key = post('id'); $user_id = post("user_id");
$user_kel_id = post("user_kel_id");
$kegiatan_id = post("kegiatan_id");
$judul = post("judul");
$foto = Form::getfile("foto", "assets/gambar/$this->table1/", $key, $this->table1);
$isi = post("isi");
$waktu = post("waktu");
$status_id = post("status_id");

        $simpan = $this->db->query("
            UPDATE tbl_kegiatan SET  user_id = '$user_id', user_kel_id = '$user_kel_id', kegiatan_id = '$kegiatan_id', judul = '$judul', foto = '$foto', isi = \"$isi\", waktu = '$waktu', status_id = '$status_id' WHERE id = '$key'
            ");


        if($simpan){
            redirect('admin/tbl_kegiatan/editor/');
        }
    }


		public function all()
		{
			$this->Createtable->location('admin/tbl_kegiatan/table_show');
			$this->Createtable->table_name('tableku');
			$this->Createtable->create_row(["no","user","user keluarga","kegiatan","judul","foto","isi","waktu","status", "action"]);
			$this->Createtable->order_set('0, 9');
	$show = $this->Createtable->create();

	$data['datatable'] = $show;
			$this->load->view('templateadmin/head');
			$this->load->view('admin/tbl_kegiatan/view', $data);
			$this->load->view('templateadmin/footer');
		}

}
