<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_artikel extends CI_Controller {

	private $table1 = 'tbl_artikel';

	public function __construct()
	{
		parent::__construct();
        Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/tbl_artikel/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","artikel","judul","slug","foto","deskripsi","content","waktu","status", "action"]);
        $this->Createtable->order_set('0, 9');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/tbl_artikel/view', $data);
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
                    'limit' => [
                        'start' => post('start'),
                        'end' => post('length')
                    ],
                    'search' => [
                        'value' => $this->Datatable_gugus->search(),
                        'row' => ["artikel_id","judul","slug","foto","deskripsi","content","waktu","status_id"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["artikel_id","judul","slug","foto","deskripsi","content","waktu","status_id"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"artikel_id", "2"=>"judul", "3"=>"slug", "4"=>"foto", "5"=>"deskripsi", "6"=>"content", "7"=>"waktu", "8"=>"status_id"],
                    ],
                     'custome' => [
        'content' => [
            'key' => ['id', 'slug'],
            'content' => '<a class="btn btn-primary" href="'.site_url('').'artikel/detail/{{slug}}" onclick="alert("https://www.w3schools.com") ">Lihat Artikel</a>',
        ],
        'artikel_id' => [
            'replacerow' => [
                'table' => 'martikel',
                'condition' => ['id'],
                'value' => ['artikel_id'],
                'get' => 'artikel',
            ],
        ],
        'status_id' => [
            'replacerow' => [
                'table' => 'mstatus',
                'condition' => ['id'],
                'value' => ['status_id'],
                'get' => 'status',
            ],
        ]
    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/tbl_artikel/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/tbl_artikel/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $artikel_id = post("artikel_id");
$judul = post("judul");
$slug = slug(post("judul"));
$foto = Form::getfile("foto", "assets/gambar/$this->table1/");
$deskripsi = post("deskripsi");
$content = post("content");
$status_id = post("status_id");

        

        $simpan = $this->db->query("
            INSERT INTO tbl_artikel
            (artikel_id,judul,slug,foto,deskripsi,content,status_id) VALUES ('$artikel_id','$judul','$slug','$foto','$deskripsi','$content','$status_id')
        ");
    

        if($simpan){
            redirect('admin/tbl_artikel');
        }
    }

    public function update(){
          $key = post('id'); $artikel_id = post("artikel_id");
$judul = post("judul");
$foto = Form::getfile("foto", "assets/gambar/$this->table1/", $key, $this->table1);
$deskripsi = post("deskripsi");
$content = post("content");
$status_id = post("status_id");

        $simpan = $this->db->query("
            UPDATE tbl_artikel SET  artikel_id = '$artikel_id', judul = '$judul', foto = '$foto', deskripsi = '$deskripsi', content = '$content', status_id = '$status_id' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/tbl_artikel');
        }
    }
    
}
