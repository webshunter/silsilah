<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_kel extends CI_Controller {

	private $table1 = 'user_kel';

	public function __construct()
	{
		parent::__construct();
        Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/user_kel/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","user","nama","jenis kelamin","tempat lahir","tanggal lahir","agama","pendidikan","pekerjaan","alamat","kelurahan","kecamatan","kabupaten","provinsi","perkawinan","tanggal menikah","tanggal meninggal","tempat meninggal","foto","username","password","waktu","status","sebagai","kepala keluarga", "action"]);
        $this->Createtable->order_set('0, 25');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/user_kel/view', $data);
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
											["user_id", "=", iduser()]
										],
                    'limit' => [
                        'start' => post('start'),
                        'end' => post('length')
                    ],
                    'search' => [
                        'value' => $this->Datatable_gugus->search(),
                        'row' => ["user_id","nama","kelamin_id","tmptlahir","tgllahir","agama_id","pendidikan_id","pekerjaan_id","alamat","kel","kec","kab_id","prov_id","perkawinan_id","tglmenikah","tglmeninggal","tmptmeninggal","foto","username","password","waktu","status_id","sebagai","id_kel"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["user_id","nama","kelamin_id","tmptlahir","tgllahir","agama_id","pendidikan_id","pekerjaan_id","alamat","kel","kec","kab_id","prov_id","perkawinan_id","tglmenikah","tglmeninggal","tmptmeninggal","foto","username","password","waktu","status_id","sebagai","id_kel"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"user_id", "2"=>"nama", "3"=>"kelamin_id", "4"=>"tmptlahir", "5"=>"tgllahir", "6"=>"agama_id", "7"=>"pendidikan_id", "8"=>"pekerjaan_id", "9"=>"alamat", "10"=>"kel", "11"=>"kec", "12"=>"kab_id", "13"=>"prov_id", "14"=>"perkawinan_id", "15"=>"tglmenikah", "16"=>"tglmeninggal", "17"=>"tmptmeninggal", "18"=>"foto", "19"=>"username", "20"=>"password", "21"=>"waktu", "22"=>"status_id", "23"=>"sebagai", "24"=>"id_kel"],
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
											'kelamin_id' => [
							            'replacerow' => [
							                'table' => 'mkelamin',
							                'condition' => ['id'],
							                'value' => ['kelamin_id'],
							                'get' => 'kelamin',
							            ],
							        ],
											'agama_id' => [
							            'replacerow' => [
							                'table' => 'magama',
							                'condition' => ['id'],
							                'value' => ['agama_id'],
							                'get' => 'agama',
							            ],
							        ],
											'pendidikan_id' => [
							            'replacerow' => [
							                'table' => 'mpendidikan',
							                'condition' => ['id'],
							                'value' => ['pendidikan_id'],
							                'get' => 'pendidikan',
							            ],
							        ],
											'pekerjaan_id' => [
							            'replacerow' => [
							                'table' => 'mpekerjaan',
							                'condition' => ['id'],
							                'value' => ['pekerjaan_id'],
							                'get' => 'pekerjaan',
							            ],
							        ],
											'perkawinan_id' => [
							            'replacerow' => [
							                'table' => 'mstatkel',
							                'condition' => ['id'],
							                'value' => ['perkawinan_id'],
							                'get' => 'statkel',
							            ],
							        ],
											'sebagai' => [
							            'replacerow' => [
							                'table' => 'mkel',
							                'condition' => ['id'],
							                'value' => ['sebagai'],
							                'get' => 'keluarga',
							            ],
							        ],
											'status_id' => [
							            'replacerow' => [
							                'table' => 'mstatus',
							                'condition' => ['id'],
							                'value' => ['status_id'],
							                'get' => 'status',
							            ],
							        ],
											'prov_id' => [
							            'replacerow' => [
							                'table' => 'mprovinsi',
							                'condition' => ['id'],
							                'value' => ['prov_id'],
							                'get' => 'name',
							            ],
							        ],
											'kab_id' => [
							            'replacerow' => [
							                'table' => 'mkabupaten',
							                'condition' => ['id'],
							                'value' => ['kab_id'],
							                'get' => 'name',
							            ],
							        ],
											'kel' => [
							            'replacerow' => [
							                'table' => 'mdesa',
							                'condition' => ['id'],
							                'value' => ['kel'],
							                'get' => 'name',
							            ],
							        ],
											'kec' => [
							            'replacerow' => [
							                'table' => 'mkecamatan',
							                'condition' => ['id'],
							                'value' => ['kec'],
							                'get' => 'name',
							            ],
							        ],
											'id_kel' => [
							            'replacerow' => [
							                'table' => 'user_kel',
							                'condition' => ['id'],
							                'value' => ['id_kel'],
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
            $this->load->view('admin/user_kel/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {

						$dd = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".post("id")."'")->row();
						$user = iduser();
						$this->db->query("DELETE
							FROM tree WHERE
							user_id = '$user'
							AND
							user_kel_id = '$dd->id'

						");
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/user_kel/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $user_id = post("user_id");
				$nama = post("nama");
				$kelamin_id = post("kelamin_id");
				$tmptlahir = post("tmptlahir");
				$tgllahir = post("tgllahir");
				$agama_id = post("agama_id");
				$pendidikan_id = post("pendidikan_id");
				$pekerjaan_id = post("pekerjaan_id");
				$alamat = post("alamat");
				$kel = post("kel");
				$kec = post("kec");
				$kab_id = post("kab_id");
				$prov_id = post("prov_id");
				$perkawinan_id = post("perkawinan_id");
				$tglmenikah = post("tglmenikah");
				$tglmeninggal = post("tglmeninggal");
				$tmptmeninggal = post("tmptmeninggal");
				$foto = Form::getfile("foto", "assets/gambar/$this->table1/");
				$username = post("username");
				$password = md5(md5(post("password")));
				$waktu = post("waktu");
				$status_id = post("status_id");
				$sebagai = post("sebagai");
				$id_kel = post("id_kel");

        $simpan = $this->db->query("
            INSERT INTO user_kel
            (user_id,nama,kelamin_id,tmptlahir,tgllahir,agama_id,pendidikan_id,pekerjaan_id,alamat,kel,kec,kab_id,prov_id,perkawinan_id,tglmenikah,tglmeninggal,tmptmeninggal,foto,username,password,waktu,status_id,sebagai,id_kel) VALUES ('$user_id','$nama','$kelamin_id','$tmptlahir','$tgllahir','$agama_id','$pendidikan_id','$pekerjaan_id','$alamat','$kel','$kec','$kab_id','$prov_id','$perkawinan_id','$tglmenikah','$tglmeninggal','$tmptmeninggal','$foto','$username','$password','$waktu','$status_id','$sebagai','$id_kel')
        ");

				$lastid = $this->db->query("SELECT * FROM user_kel ORDER BY id DESC ")->row();

				$user = iduser();
				$userkel = $lastid->id;
				$sebagai = post('sebagai');
				$ch = $id_kel;

				$this->db->query("INSERT INTO tree (user_id, user_kel_id, mkel_id, child) VALUES ('$user', '$userkel', '$sebagai', '$ch')");

        if($simpan){
					if (generate_session('kembali') != '') {
						redirect(generate_session('kembali'));
					}else{
						redirect('admin/user_kel');
					}
        }
    }

    public function update(){
        $key = post('id'); $user_id = post("user_id");
				$nama = post("nama");
				$kelamin_id = post("kelamin_id");
				$tmptlahir = post("tmptlahir");
				$tgllahir = post("tgllahir");
				$agama_id = post("agama_id");
				$pendidikan_id = post("pendidikan_id");
				$pekerjaan_id = post("pekerjaan_id");
				$alamat = post("alamat");
				$kel = post("kel");
				$kec = post("kec");
				$kab_id = post("kab_id");
				$prov_id = post("prov_id");
				$perkawinan_id = post("perkawinan_id");
				$tglmenikah = post("tglmenikah");
				$tglmeninggal = post("tglmeninggal");
				$tmptmeninggal = post("tmptmeninggal");
				$foto = Form::getfile("foto", "assets/gambar/$this->table1/", $key, $this->table1);
				$username = post("username");
				$elm = $this->db->query("SELECT *
					FROM user_kel WHERE id = '$key' ")->row()->password;
					if ($elm != post("password")) {
						$password = md5(md5(post("password")));
					}
				$waktu = post("waktu");
				$status_id = post("status_id");
				$sebagai = post("sebagai");
				$id_kel = post("id_kel");
				if ($elm != post("password")) {
				$simpan = $this->db->query("
					UPDATE user_kel SET  user_id = '$user_id', nama = '$nama', kelamin_id = '$kelamin_id', tmptlahir = '$tmptlahir', tgllahir = '$tgllahir', agama_id = '$agama_id', pendidikan_id = '$pendidikan_id', pekerjaan_id = '$pekerjaan_id', alamat = '$alamat', kel = '$kel', kec = '$kec', kab_id = '$kab_id', prov_id = '$prov_id', perkawinan_id = '$perkawinan_id', tglmenikah = '$tglmenikah', tglmeninggal = '$tglmeninggal', tmptmeninggal = '$tmptmeninggal', foto = '$foto', username = '$username', password = '$password', waktu = '$waktu', status_id = '$status_id', sebagai = '$sebagai', id_kel = '$id_kel' WHERE id = '$key'
					");
				}else{
				$simpan = $this->db->query("
					UPDATE user_kel SET  user_id = '$user_id', nama = '$nama', kelamin_id = '$kelamin_id', tmptlahir = '$tmptlahir', tgllahir = '$tgllahir', agama_id = '$agama_id', pendidikan_id = '$pendidikan_id', pekerjaan_id = '$pekerjaan_id', alamat = '$alamat', kel = '$kel', kec = '$kec', kab_id = '$kab_id', prov_id = '$prov_id', perkawinan_id = '$perkawinan_id', tglmenikah = '$tglmenikah', tglmeninggal = '$tglmeninggal', tmptmeninggal = '$tmptmeninggal', foto = '$foto', username = '$username', waktu = '$waktu', status_id = '$status_id', sebagai = '$sebagai', id_kel = '$id_kel' WHERE id = '$key'
					");
				}

						$user = iduser();
						$userkel = post('id');
						$sebagai = post('sebagai');
						$ch = $id_kel;


						if ($this->db->query("SELECT *
							FROM tree WHERE
							user_id = '$user'
							AND
							user_kel_id = '$userkel'
							 ")->num_rows() > 0) {

								 echo "run";

								 $this->db->query(" UPDATE
									 tree
									 SET
									 user_id = '$user'
									 , user_kel_id = '$userkel'
									 , mkel_id = '$sebagai'
									 , child = '$ch'
									 	WHERE
									 	user_id = '$user'
		 								AND
		 								user_kel_id = '$userkel'
		 								AND
		 								mkel_id = '$sebagai'
									   ");
							 }else{
								 $this->db->query("INSERT INTO tree (user_id, user_kel_id, mkel_id, child) VALUES ('$user', '$userkel', '$sebagai', '$ch')");
							 }

        if($simpan){
            redirect('admin/user_kel');
        }
    }


		public function getkab($id='')
		{
			echo json_encode($this->db->query("SELECT * FROM mkabupaten WHERE province_id = '$id' ")->result());
		}

		public function getkec($id='')
		{
			echo json_encode($this->db->query("SELECT * FROM mkecamatan WHERE regency_id = '$id' ")->result());
		}

		public function getdes($id='')
		{
			echo json_encode($this->db->query("SELECT * FROM mdesa WHERE district_id = '$id' ")->result());
		}

}
