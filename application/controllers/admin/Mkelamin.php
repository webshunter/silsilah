<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkelamin extends CI_Controller {

	private $table1 = 'mkelamin';

	public function __construct()
	{
		parent::__construct();
        Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/mkelamin/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","kelamin", "action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/mkelamin/view', $data);
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
                        'row' => ["kelamin"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["kelamin"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"kelamin"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/mkelamin/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/mkelamin/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $kelamin = post("kelamin");

        

        $simpan = $this->db->query("
            INSERT INTO mkelamin
            (kelamin) VALUES ('$kelamin')
        ");
    

        if($simpan){
            redirect('admin/mkelamin');
        }
    }

    public function update(){
          $key = post('id'); $kelamin = post("kelamin");

        $simpan = $this->db->query("
            UPDATE mkelamin SET  kelamin = '$kelamin' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/mkelamin');
        }
    }
    
}
