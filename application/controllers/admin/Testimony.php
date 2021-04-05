<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimony extends CI_Controller {

	private $table1 = 'testimony';

	public function __construct()
	{
		parent::__construct();
        Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/testimony/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","foto","nama","Deskripsi", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/testimony/view', $data);
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
                        'row' => ["foto","nama","deskripsi"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["foto","nama","deskripsi"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"foto", "2"=>"nama", "3"=>"deskripsi"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/testimony/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/testimony/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $foto = Form::getfile("foto", "assets/gambar/$this->table1/");
$nama = post("nama");
$deskripsi = post("deskripsi");

        

        $simpan = $this->db->query("
            INSERT INTO testimony
            (foto,nama,deskripsi) VALUES ('$foto','$nama','$deskripsi')
        ");
    

        if($simpan){
            redirect('admin/testimony');
        }
    }

    public function update(){
          $key = post('id'); $foto = Form::getfile("foto", "assets/gambar/$this->table1/", $key, $this->table1);
$nama = post("nama");
$deskripsi = post("deskripsi");

        $simpan = $this->db->query("
            UPDATE testimony SET  foto = '$foto', nama = '$nama', deskripsi = '$deskripsi' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/testimony');
        }
    }
    
}
