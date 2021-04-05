<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mstatkel extends CI_Controller {

	private $table1 = 'mstatkel';

	public function __construct()
	{
		parent::__construct();
        Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/mstatkel/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","statkel", "action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/mstatkel/view', $data);
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
                        'row' => ["statkel"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["statkel"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"statkel"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/mstatkel/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/mstatkel/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $statkel = post("statkel");

        

        $simpan = $this->db->query("
            INSERT INTO mstatkel
            (statkel) VALUES ('$statkel')
        ");
    

        if($simpan){
            redirect('admin/mstatkel');
        }
    }

    public function update(){
          $key = post('id'); $statkel = post("statkel");

        $simpan = $this->db->query("
            UPDATE mstatkel SET  statkel = '$statkel' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/mstatkel');
        }
    }
    
}
