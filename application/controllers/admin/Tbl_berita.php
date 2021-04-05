<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_berita extends CI_Controller {

	private $table1 = 'tbl_berita';

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
        Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index($limit = 0, $page = 0)
	{
		$id = iduser();
				$tot = $this->db->query("SELECT * FROM tbl_berita WHERE user_id = '$id'")->num_rows();
				$show = "";
				if ($tot > 0) {
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
					$pathd = site_url('admin/tbl_berita/tambah_data');
					$show .= "<br><br>";
					$show .= "<div class='row'>";
					foreach ($this->db->query("SELECT * FROM tbl_berita WHERE user_id = '$id' limit $limit, $batas ")->result() as $key => $value) {
						$show .= "<div class='col-md-4' style='margin-bottom: 16px; padding: 20px;'>";
						$show .= "<div class='card text-center hover-card' style='margin: 10px; width: auto; box-shadow: 0px 0px 20px rgba(123,123,123,0.3); padding-bottom: 16px; border-radius: 10px; overflow: hidden;'>";
						$path = base_url('assets/gambar/tbl_berita');
						$linkdetail = site_url('admin/tbl_berita/detail');
						$show .= "<div style=\"background-image: url('$path/$value->foto'); width: 100%; height: 18rem; background-size: cover: background-position: center; background-repeat: no-repeat; \"></div>";
						$show .= "<h4 style=\"margin-top: 10px; margin-bottom: 10px; padding: 16px;\">$value->judul</h4>";
						$show .= '<p class="text-justify">'.mb_substr(htmlspecialchars_decode($value->isi),0,255,'HTML-ENTITIES').'.... </p>';
						$show .= "<a href=\"$linkdetail/$value->id\" class=\"btn btn-success\" >Selengkapnya</a>";
						$show .= "</div>";
						$show .= "</div>";
					}
					$show .= "</div>";
					$show .= "<div>";
					$cx = site_url('admin/tbl_berita/index');
					$show .= "
					<nav aria-label=\"Page navigation example\">
					<ul class=\"pagination\">";
					$show .= " <li class=\"page-item\"><a class=\"page-link\" href=\"$cx/$beforelimit/$pagem\">prev</a></li>";
					for ($i=$pagec; $i < $pageb + $pagec; $i++) {
						$cs = site_url('admin/tbl_berita/index/'.$i.'/'.$pageo);
						$show .= " <li class=\"page-item\"><a class=\"page-link\" href=\"$cs\">".($i+1)."</a></li>";
					}
					$show .= " <li class=\"page-item\"><a class=\"page-link\" href=\"$cx/$beforelimit/$pagen\">next</a></li>";
					$show .= "</ul>
				</nav>
				";
				$show .= "</div>";
				}
        $data['list_berita'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/tbl_berita/view', $data);
        $this->load->view('templateadmin/footer');
	}


	public function detail($id)
	{
				$show = "";
				$id = $id;
				$show .= "<div style='clear: both;'></div>";
				$show .= "<br>";
				$show .= "<div class='row'>";
				foreach ($this->db->query("SELECT * FROM tbl_berita WHERE id = '$id' ")->result() as $key => $value) {
					$show .= "<div class='col-md-12'>";
						$show .= "<div class='card'>";
						$path = base_url('assets/gambar/tbl_berita');
						$show .= '<img width="100%" style="margin-bottom:10px;" src="'.$path.'/'.$value->foto.'"></h3>';
						$show .= "<h3 style='margin:10px'>$value->judul</h3>";
						$show .= '<div style="margin:10px" class="text-justify">'.htmlspecialchars_decode($value->isi).'</div>';
						$show .= "<button class='btn btn-default' onclick=\"window.history.back()\" >Kembali</button>";
						$show .= "</div>";
					$show .= "</div>";
				}
				$show .= "</div>";
				$data['detail'] = $show;
				$this->load->view('templateadmin/head');
				$this->load->view('admin/tbl_berita/view',$data);
				$this->load->view('templateadmin/footer');
	}


	public function editor()
	{
        $this->Createtable->location('admin/tbl_berita/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","judul","foto","isi","waktu", "action"]);
        $this->Createtable->order_set('0, 5');
	    	$show = $this->Createtable->create();

		    $data['datatable'] = $show;


        $this->load->view('templateadmin/head');
        $this->load->view('admin/tbl_berita/editor', $data);
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
											 "content" => "<a href='".site_url('admin/tbl_berita/detail/')."{{id}}'>Tampilkan Berita</a>"
										 ]
    					 			],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/tbl_berita/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/tbl_berita/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $user_id = post("user_id");
$user_kel_id = post("user_kel_id");
$berita_id = post("berita_id");
$judul = post("judul");
$foto = Form::getfile("foto", "assets/gambar/$this->table1/");
$isi =  post("isi");
$status_id = post("status_id");



        $simpan = $this->db->query("
            INSERT INTO tbl_berita
            (user_id,user_kel_id,berita_id,judul,foto,isi,status_id) VALUES ('$user_id','$user_kel_id','$berita_id','$judul','$foto',\"$isi\",'$status_id')
        ");


        if($simpan){
            redirect('admin/tbl_berita');
        }
    }

    public function update(){
          $key = post('id'); $user_id = post("user_id");
$user_kel_id = post("user_kel_id");
$berita_id = post("berita_id");
$judul = post("judul");
$foto = Form::getfile("foto", "assets/gambar/$this->table1/", $key, $this->table1);
$isi = post("isi");
$status_id = post("status_id");

        $simpan = $this->db->query("
            UPDATE tbl_berita SET  user_id = '$user_id', user_kel_id = '$user_kel_id', berita_id = '$berita_id', judul = '$judul', foto = '$foto', isi = '$isi', status_id = '$status_id' WHERE id = '$key'
            ");


        if($simpan){
            redirect('admin/tbl_berita');
        }
    }

}
