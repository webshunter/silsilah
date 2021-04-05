<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tree extends CI_Controller {

	private $table1 = 'tree';

	public function __construct()
	{
		parent::__construct();
        Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/tree/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["No","User","User Keluarga","Sebagai","Kepala Keluarga"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/tree/view', $data);
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
                        'row' => ["user_id","user_kel_id","mkel_id","child"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["user_id","user_kel_id","mkel_id","child"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"user_id", "2"=>"user_kel_id", "3"=>"mkel_id", "4"=>"child"],
                    ],
                    "custome" => [
											'user_id' => [
							            'replacerow' => [
							                'table' => 'user',
							                'condition' => ['id'],
							                'value' => ['user_id'],
							                'get' => 'nama',
							            ],
							        ],
											'user_kel_id' => [
							            'replacerow' => [
							                'table' => 'user_kel',
							                'condition' => ['id'],
							                'value' => ['user_kel_id'],
							                'get' => 'nama',
							            ],
							        ],
											'mkel_id' => [
							            'replacerow' => [
							                'table' => 'mkel',
							                'condition' => ['id'],
							                'value' => ['mkel_id'],
							                'get' => 'keluarga',
							            ],
							        ],
											'child' => [
							            'replacerow' => [
							                'table' => 'user_kel',
							                'condition' => ['id'],
							                'value' => ['child'],
							                'get' => 'nama',
							            ],
							        ],
										]
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/tree/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/tree/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $user_id = post("user_id");
				$user_kel_id = post("user_kel_id");
				$mkel_id = post("mkel_id");
				$child = post("child");

        $simpan = $this->db->query("
            INSERT INTO tree
            (user_id,user_kel_id,mkel_id,child) VALUES ('$user_id','$user_kel_id','$mkel_id','$child')
        ");


        if($simpan){
            redirect('admin/tree');
        }
    }

    public function update(){
        $key = post('id'); $user_id = post("user_id");
				$user_kel_id = post("user_kel_id");
				$mkel_id = post("mkel_id");
				$child = post("child");
        $simpan = $this->db->query("
            UPDATE tree SET  user_id = '$user_id', user_kel_id = '$user_kel_id', mkel_id = '$mkel_id', child = '$child' WHERE id = '$key'
        ");
        if($simpan){
            redirect('admin/tree');
        }
    }

}
