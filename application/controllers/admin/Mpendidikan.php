<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpendidikan extends CI_Controller {

	private $table1 = 'mpendidikan';

	public function __construct()
	{
		parent::__construct();
        Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/mpendidikan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","pendidikan", "action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/mpendidikan/view', $data);
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
                        'row' => ["pendidikan"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["pendidikan"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"pendidikan"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/mpendidikan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/mpendidikan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $pendidikan = post("pendidikan");

        

        $simpan = $this->db->query("
            INSERT INTO mpendidikan
            (pendidikan) VALUES ('$pendidikan')
        ");
    

        if($simpan){
            redirect('admin/mpendidikan');
        }
    }

    public function update(){
          $key = post('id'); $pendidikan = post("pendidikan");

        $simpan = $this->db->query("
            UPDATE mpendidikan SET  pendidikan = '$pendidikan' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/mpendidikan');
        }
    }
    
}
