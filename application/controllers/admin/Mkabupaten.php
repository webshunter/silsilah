<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkabupaten extends CI_Controller {

	private $table1 = 'mkabupaten';

	public function __construct()
	{
		parent::__construct();
        Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/mkabupaten/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["id","province","name", "action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/mkabupaten/view', $data);
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
                        'row' => ["province_id","name"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["province_id","name"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"province_id", "2"=>"name"],
                    ],
                     'custome' => [
        'province_id' => [
            'replacerow' => [
                'table' => 'mprovinsi',
                'condition' => ['id'],
                'value' => ['province_id'],
                'get' => 'name',
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
            $this->load->view('admin/mkabupaten/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/mkabupaten/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id = post("id");
$province_id = post("province_id");
$name = post("name");

        

        $simpan = $this->db->query("
            INSERT INTO mkabupaten
            (id,province_id,name) VALUES ('$id','$province_id','$name')
        ");
    

        if($simpan){
            redirect('admin/mkabupaten');
        }
    }

    public function update(){
          $key = post('id'); $id = post("id");
$province_id = post("province_id");
$name = post("name");

        $simpan = $this->db->query("
            UPDATE mkabupaten SET  id = '$id', province_id = '$province_id', name = '$name' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/mkabupaten');
        }
    }
    
}
