<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Martikel extends CI_Controller {

	private $table1 = 'martikel';

	public function __construct()
	{
		parent::__construct();
    Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/martikel/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","artikel","status", "action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/martikel/view', $data);
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
                        'row' => ["artikel","status_id"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["artikel","status_id"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"artikel", "2"=>"status_id"],
                    ],
                     'custome' => [
        'status_id' => [
            'key' => ['status_id', 'id'],
            'content' => "
                <div class='toggle-select-act fm-cmp-mg'>
                    <div class='nk-toggle-switch'>
                        <input id='check{{id}}' checked type='checkbox' value='{{status_id}}' hidden='hidden'>
                        <label for='check{{id}}' class='ts-helper'></label>
                    </div>
                </div>
                <script>

                    $(document).ready(function(){

                        var newd = document.getElementById('check{{id}}');

                        if(newd.value != '1'){
                            newd.removeAttribute('checked');
                        }
                        newd.addEventListener('change', function(){
                            alert('ok')
                        }, false)
                    })

                </script>
            "
        ]
    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/martikel/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/martikel/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $artikel = post("artikel");



        $simpan = $this->db->query("
            INSERT INTO martikel
            (artikel) VALUES ('$artikel')
        ");


        if($simpan){
            redirect('admin/martikel');
        }
    }

    public function update(){
          $key = post('id'); $artikel = post("artikel");

        $simpan = $this->db->query("
            UPDATE martikel SET  artikel = '$artikel' WHERE id = '$key'
            ");


        if($simpan){
            redirect('admin/martikel');
        }
    }

}
