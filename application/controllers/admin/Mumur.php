<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mumur extends CI_Controller {

	private $table1 = 'mumur';

	public function __construct()
	{
		parent::__construct();
        Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/mumur/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","umur", "action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/mumur/view', $data);
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
                        'row' => ["umur"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["umur"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"umur"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/mumur/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/mumur/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $umur = post("umur");

        

        $simpan = $this->db->query("
            INSERT INTO mumur
            (umur) VALUES ('$umur')
        ");
    

        if($simpan){
            redirect('admin/mumur');
        }
    }

    public function update(){
          $key = post('id'); $umur = post("umur");

        $simpan = $this->db->query("
            UPDATE mumur SET  umur = '$umur' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/mumur');
        }
    }
    
}
