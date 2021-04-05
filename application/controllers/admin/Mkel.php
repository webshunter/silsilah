<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkel extends CI_Controller {

	private $table1 = 'mkel';

	public function __construct()
	{
		parent::__construct();
        Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/mkel/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","keluarga","jenis kelamin", "action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/mkel/view', $data);
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
                        'row' => ["keluarga","kelamin_id"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["keluarga","kelamin_id"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"keluarga", "2"=>"kelamin_id"],
                    ],
                     'custome' => [
        'kelamin_id' => [
            'replacerow' => [
                'table' => 'mkelamin',
                'condition' => ['id'],
                'value' => ['kelamin_id'],
                'get' => 'kelamin',
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
            $this->load->view('admin/mkel/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/mkel/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $keluarga = post("keluarga");
$kelamin_id = post("kelamin_id");

        

        $simpan = $this->db->query("
            INSERT INTO mkel
            (keluarga,kelamin_id) VALUES ('$keluarga','$kelamin_id')
        ");
    

        if($simpan){
            redirect('admin/mkel');
        }
    }

    public function update(){
          $key = post('id'); $keluarga = post("keluarga");
$kelamin_id = post("kelamin_id");

        $simpan = $this->db->query("
            UPDATE mkel SET  keluarga = '$keluarga', kelamin_id = '$kelamin_id' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/mkel');
        }
    }
    
}
