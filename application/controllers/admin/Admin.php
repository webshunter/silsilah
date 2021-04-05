<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	private $table1 = 'admin';

	public function __construct()
	{
		parent::__construct();
        Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/admin/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["id","username","password","nama","status id", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/admin/view', $data);
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
                        'row' => ["username","password","nama","status_id"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["username","password","nama","status_id"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"username", "2"=>"password", "3"=>"nama", "4"=>"status_id"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/admin/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/admin/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id = post("id");
$username = post("username");
$password = post("password");
$nama = post("nama");
$status_id = post("status_id");

        

        $simpan = $this->db->query("
            INSERT INTO admin
            (id,username,password,nama,status_id) VALUES ('$id','$username','$password','$nama','$status_id')
        ");
    

        if($simpan){
            redirect('admin/admin');
        }
    }

    public function update(){
          $key = post('id'); $id = post("id");
$username = post("username");
$password = post("password");
$nama = post("nama");
$status_id = post("status_id");

        $simpan = $this->db->query("
            UPDATE admin SET  id = '$id', username = '$username', password = '$password', nama = '$nama', status_id = '$status_id' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/admin');
        }
    }
    
}
