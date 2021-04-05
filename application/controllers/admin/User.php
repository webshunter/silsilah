<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	private $table1 = 'user';

	public function __construct()
	{
		parent::__construct();
        Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/user/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","foto","username","password","nama","hp","namaayah","namaibu","email","status","dibuat pada","diupdate pada", "action"]);
        $this->Createtable->order_set('0, 12');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/user/view', $data);
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
												["id", '=', iduser()]
										],
                    'limit' => [
                        'start' => post('start'),
                        'end' => post('length')
                    ],
                    'search' => [
                        'value' => $this->Datatable_gugus->search(),
                        'row' => ["foto","username","password","nama","hp","namaayah","namaibu","email","status_id","created_at","updated_at"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["foto","username","password","nama","hp","namaayah","namaibu","email","status_id","created_at","updated_at"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"foto","2"=>"username", "3"=>"password", "4"=>"nama", "5"=>"hp", "6"=>"namaayah", "7"=>"namaibu", "8"=>"email", "9"=>"status_id", "10"=>"created_at", "11"=>"updated_at"],
                    ],
										"custome" => [
											'status_id' => [
							            'replacerow' => [
							                'table' => 'mstatus',
							                'condition' => ['id'],
							                'value' => ['status_id'],
							                'get' => 'status',
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
            $this->load->view('admin/user/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/user/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $username = post("username");
$password = md5(md5(post("password")));
$nama = post("nama");
$hp = post("hp");
$namaayah = post("namaayah");
$namaibu = post("namaibu");
$email = post("email");
$status_id = post("status_id");
$foto = Form::getfile("foto", "assets/gambar/$this->table1/");



        $simpan = $this->db->query("
            INSERT INTO user
            (username,password,nama,hp,namaayah,namaibu,email,status_id, foto) VALUES ('$username','$password','$nama','$hp','$namaayah','$namaibu','$email','$status_id', '$foto')
        ");


        if($simpan){
            redirect('admin/user');
        }
    }

    public function update(){
          $key = post('id');
					$username = post("username");
					$ceks = $this->db->query("SELECT * FROM user WHERE id = '$key' ")->row()->password;
					$password = post("password");
					if ($ceks != post("password")) {
						$password = md5(md5(post("password")));
					}
$nama = post("nama");
$hp = post("hp");
$namaayah = post("namaayah");
$namaibu = post("namaibu");
$email = post("email");
$status_id = post("status_id");
$foto = Form::getfile("foto", "assets/gambar/$this->table1/", $key, $this->table1);

        $simpan = $this->db->query("
            UPDATE user SET  username = '$username', password = '$password', nama = '$nama', hp = '$hp', namaayah = '$namaayah', namaibu = '$namaibu', email = '$email', status_id = '$status_id', foto = '$foto' WHERE id = '$key'
            ");


        if($simpan){
            redirect('admin/user');
        }
    }

}
