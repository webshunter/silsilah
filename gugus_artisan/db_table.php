<?php

require_once 'fontawesome/fontFunc.php';
require_once 'table_opsi_set.php';


function crdb()
{

    // login sistem
    // --------------------------------------
        // coming soon

        // login sistem cant return data
        /*
            [
                ......
                    "datalogin" => [
                        "id" => "value",
                        "username" => "value",
                        "position" => "",
                        "allconf can build from this" => "",
                    ]
                ......
            ]
        */

    // landing setting up
    // --------------------------------------

        // coming soon

    // -----------------------------------------------------------------------------------------------------------------------------------//

    // datatable setting up

    // #1. set all data on crude here
    // create database name ------------------------- //
    /*
        [
            ....
                "table" => "table name"
            ....
        ]
    */

    // #2. create table row
    /*
        [
            ....
                "data" => [
                    "row_name" => char(255)
                ]
            ....
        ]
        row setting data
        ai() -----> autoincrement row
        char(255) ------> VARCHAR 255 //number can custome 1 - 255
        textlong() ------> set for text long
        no(11) ------> integer data
        timestamp() ------> set timestamp value for auto date
        timestampupdate() ------> timestamp auto update on update data
        relation(table, table_row, table_relation, table_relation_row) ----> relationship database setting
    */

    // dalam penggunaan metode ini user harus paham karakteristk dari array.
    // #4. form setting

        // comming soon

        /*
            -> no condition form tidak akan di tampilkan dalam kata lain form tidak akan dibuat untuk row table tersebut
            [
                ....
                    "form" => [
                        "id" => "no"
                    ],
                ....
            ]

            -> text condition digunakan untuk membuat text form format
            [
                ....
                    "form" => [
                        "username" => "text"
                    ],
                ....
            ]

            -> number condition digunakan untuk membuat number form format
            [
                ....
                    "form" => [
                        "total" => "number"
                    ],
                ....
            ]

            -> username condition digunakan untuk membuat username form format
            [
                ....
                    "form" => [
                        "total" => "username"
                    ],
                ....
            ]

            -> password condition digunakan untuk membuat password form format
            [
                ....
                    "form" => [
                        "total" => "password"
                    ],
                ....
            ]

            -> editor condition digunakan untuk membuat edito form format dalam hal ini summernote editor
            [
                ....
                    "form" => [
                        "total" => "number"
                    ],
                ....
            ]

            -> select condition digunakan untuk membuat selection dalam hal ini selection membutuhkan database untuk menopangnya
            -> multiple condition yang digunakan untuk membuat multipple selection
            [
                ....
                    "category_id" => [
                        "type" => "select / multiple",  // type digunakan untuk menentukan tipe form
                        "data" => [                     // data merupakan setting dari selection
                            "db" => "category",         // db disini anda akan memilih data dari table mana yang ingin anda ambil
                            "data" => "id",             // data merupakan setting untuk value yang akan digunakan pada option
                            "name" => "nama_kategori"   // name digunakan untuk tampilan dari option
                        ]
                    ],
                ....
            ]

            -> login condition yang digunakan untuk membuat dengan nilai default id user yang aktif/ dan hidden form
            [
                ....
                    "user" => "login"
                ....
            ]

        */


    // #4. array condition for join table for view
        // coming soon

    /*
        [
            ....
                "data" => [
                    "row_name" => char(255)
                ]
            ....
        ]
    */

    // #4. array condition for join table for view
        // coming soon


    // #5. set default nilai table

        // coming soon

    // #6 title page of admin crud sistem setting
    /*
        [
            ....
                "title" => [
                    "view" => "Customer", -> set for view page
                    "edit" => "Ubah Customer", -> set for edit page
                    "new" => "Tambahkan Customer" -> set for page create new data
                ],
            ....
        ]
    */

    // #6 commandAll digunakan untuk membuat command process for create all system
                // coming soon data setting like below
    /*
        [
            ....
               'command' => command("link_name", "table_name"),
               'commandAll' => true,
            ....
        ]
    */

    // #7 email setting confige page

        // coming soon



    // #8 table design automaticaly
        // coming soon


    // #9 selection icon with modal for font awesome

    // builder with database

$arr = [];
$arr[] = [
  'table' => 'admin',
  'data' => [
      'id' => char(255),
      'username' => char(255),
      'password' => char(255),
      'nama' => char(255),
      'status_id' => char(255),
  ],
  'form' => [
      'id' => 'text',
      'username' => 'text',
      'password' => 'text',
      'nama' => 'text',
      'status_id' => 'text',
  ],
  'name' => [
      'id',
      'username',
      'password',
      'nama',
      'status_id',
  ],
  "title" => [
        "view" => "admin",
        "edit" => "Ubah admin",
        "new" => "Tambahkan admin"
    ],
  'command' => 'php gugus template admin --crud admin'
];

$arr[] = [
  'table' => 'magama',
  'data' => [
      'id' => ai(),
      'agama' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'agama' => 'text',
  ],
  'name' => [
      'no',
      'agama',
  ],
  "title" => [
        "view" => "Master Agama",
        "edit" => "Ubah Master Agama",
        "new" => "Tambahkan Master Agama"
    ],
  'command' => 'php gugus template magama --crud magama'
];

$arr[] = [
  'table' => 'martikel',
  'data' => [
      'id' => ai(),
      'artikel' => char(255),
      'status_id' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'artikel' => 'text',
      'status_id' => 'no',
  ],
  'name' => [
      'no',
      'artikel',
      'status',
  ],
  "title" => [
        "view" => "Master Artikel",
        "edit" => "Ubah Master Artikel",
        "new" => "Tambahkan Master Artikel"
    ],
    "custome" => "[
        'status_id' => [
            'key' => ['status_id', 'id'],
            'content' => \"
                <div class='toggle-select-act fm-cmp-mg'>
                    <div class='nk-toggle-switch'>
                        <input id='check{{id}}' checked type='checkbox' value='{{status_id}}' hidden='hidden'>
                        <label for='check{{id}}' class='ts-helper'></label>
                    </div>
                </div>
                <script>

                    \$(document).ready(function(){

                        var newd = document.getElementById('check{{id}}');

                        if(newd.value != '1'){
                            newd.removeAttribute('checked');
                        }
                        newd.addEventListener('change', function(){
                            alert('ok')
                        }, false)
                    })

                </script>
            \"
        ]
    ]",
    "newapi" => "

        public function apiactive(){

        }

    ",
  'command' => 'php gugus template martikel --crud martikel'
];

$arr[] = [
  'table' => 'mberita',
  'data' => [
      'id' => ai(),
      'user' => char(255),
      'berita' => char(255),
      'status_id' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'user' => 'login',
      'berita' => 'text',
      'status_id' => 'no',
  ],
  'name' => [
      'no',
      'user',
      'berita',
      'status',
  ],
  "title" => [
        "view" => "Master Berita",
        "edit" => "Ubah Master Berita",
        "new" => "Tambahkan Master Berita"
    ],
    "custome" => "[
        'status_id' => [
            'key' => ['status_id', 'id'],
            'content' => \"
                <div class='toggle-select-act fm-cmp-mg'>
                    <div class='nk-toggle-switch'>
                        <input id='check{{id}}' checked type='checkbox' value='{{status_id}}' hidden='hidden'>
                        <label for='check{{id}}' class='ts-helper'></label>
                    </div>
                </div>
                <script>

                    \$(document).ready(function(){

                        var newd = document.getElementById('check{{id}}');

                        if(newd.value != '1'){
                            newd.removeAttribute('checked');
                        }
                        newd.addEventListener('change', function(){
                            alert('ok')
                        }, false)
                    })

                </script>
            \"
        ]
    ]",
    "newapi" => "

        public function apiactive(){

        }

    ",
  'command' => 'php gugus template mberita --crud mberita'
];

$arr[] = [
  'table' => 'mkabupaten',
  'data' => [
      'id' => char(255),
      'province_id' => char(255),
      'name' => char(255),
  ],
  'form' => [
      'id' => 'text',
      'province_id' => 'text',
      'name' => 'text',
  ],
  'name' => [
      'id',
      'province',
      'name',
  ],
  "title" => [
        "view" => "Master Kabupaten",
        "edit" => "Ubah Master Kabupaten",
        "new" => "Tambahkan Master Kabupaten"
    ],
    "custome" => "[
        'province_id' => [
            'replacerow' => [
                'table' => 'mprovinsi',
                'condition' => ['id'],
                'value' => ['province_id'],
                'get' => 'name',
            ],
        ]
    ]",
  'command' => 'php gugus template mkabupaten --crud mkabupaten'
];

$arr[] = [
  'table' => 'mdesa',
  'data' => [
      'id' => char(255),
      'district_id' => char(255),
      'name' => char(255),
  ],
  'form' => [
      'id' => 'text',
      'district_id' => 'text',
      'name' => 'text',
  ],
  'name' => [
      'id',
      'id desa',
      'Desa',
  ],
  "title" => [
        "view" => "Desa",
        "edit" => "Ubah Desa",
        "new" => "Tambahkan Desa"
    ],
  'command' => 'php gugus template mkabupaten --crud mkabupaten'
];

$arr[] = [
  'table' => 'mkecamatan',
  'data' => [
      'id' => char(255),
      'regency_id' => char(255),
      'name' => char(255),
  ],
  'form' => [
      'id' => 'text',
      'regency_id' => 'text',
      'name' => 'text',
  ],
  'name' => [
      'id',
      'id Kecamatan',
      'Desa',
  ],
  "title" => [
        "view" => "Kecamatan",
        "edit" => "Ubah Kecamatan",
        "new" => "Tambahkan Kecamatan"
    ],
  'command' => 'php gugus template mkabupaten --crud mkabupaten'
];

$arr[] = [
  'table' => 'mkegiatan',
  'data' => [
      'id' => ai(),
      'user' => char(255),
      'kegiatan' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'user' => 'login',
      'kegiatan' => 'text',
  ],
  'name' => [
      'no',
      'user',
      'kegiatan',
  ],
  "title" => [
        "view" => "Master Kegiatan",
        "edit" => "Ubah Master Kegiatan",
        "new" => "Tambahkan Master Kegiatan"
    ],
  'command' => 'php gugus template mkegiatan --crud mkegiatan'
];

$arr[] = [
  'table' => 'mkel',
  'data' => [
      'id' => ai(),
      'keluarga' => char(255),
      'kelamin_id' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'keluarga' => 'text',
      'kelamin_id' => [
          "type" => "select",
          "data" => [
              "db" => "mkelamin",
              "data" => "id",
              "name" => "kelamin"
          ]
      ],
  ],
  'name' => [
      'no',
      'keluarga',
      'jenis kelamin',
  ],
  "title" => [
        "view" => "Master Keluarga",
        "edit" => "Ubah Master Keluarga",
        "new" => "Tambahkan Master Keluarga"
    ],
    "custome" => "[
        'kelamin_id' => [
            'replacerow' => [
                'table' => 'mkelamin',
                'condition' => ['id'],
                'value' => ['kelamin_id'],
                'get' => 'kelamin',
            ],
        ]
    ]",
  'command' => 'php gugus template mkel --crud mkel'
];

$arr[] = [
  'table' => 'mstatus',
  'data' => [
      'id' => ai(),
      'status' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'status' => 'text',
  ],
  'name' => [
      'no',
      'status',
  ],
  "title" => [
        "view" => "Status",
        "edit" => "Ubah Status",
        "new" => "Tambahkan Status"
    ],
  'command' => 'php gugus template mstatus --crud mstatus'
];

$arr[] = [
  'table' => 'mkelamin',
  'data' => [
      'id' => ai(),
      'kelamin' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'kelamin' => 'text',
  ],
  'name' => [
      'no',
      'kelamin',
  ],
  "title" => [
        "view" => "Janis Kelamin",
        "edit" => "Ubah Janis Kelamin",
        "new" => "Tambahkan Janis Kelamin"
    ],
  'command' => 'php gugus template mkelamin --crud mkelamin'
];

$arr[] = [
  'table' => 'mpekerjaan',
  'data' => [
      'id' => ai(),
      'pekerjaan' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'pekerjaan' => 'text',
  ],
  'name' => [
      'no',
      'pekerjaan',
  ],
  "title" => [
        "view" => "Master Pekerjaan",
        "edit" => "Ubah Master Pekerjaan",
        "new" => "Tambahkan Master Pekerjaan"
    ],
  'command' => 'php gugus template mpekerjaan --crud mpekerjaan'
];

$arr[] = [
  'table' => 'mpendidikan',
  'data' => [
      'id' => ai(),
      'pendidikan' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'pendidikan' => 'text',
  ],
  'name' => [
      'no',
      'pendidikan',
  ],
  "title" => [
        "view" => "Master Pendidikan",
        "edit" => "Ubah Master Pendidikan",
        "new" => "Tambahkan Master Pendidikan"
    ],
  'command' => 'php gugus template mpendidikan --crud mpendidikan'
];

$arr[] = [
  'table' => 'mprovinsi',
  'data' => [
      'id' => ai(),
      'name' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'name' => 'text',
  ],
  'name' => [
      'id',
      'name',
  ],
  "title" => [
        "view" => "Master Provinsi",
        "edit" => "Ubah Master Provinsi",
        "new" => "Tambahkan Master Provinsi"
    ],
  'command' => 'php gugus template mprovinsi --crud mprovinsi'
];

$arr[] = [
  'table' => 'mstatkel',
  'data' => [
      'id' => ai(),
      'statkel' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'statkel' => 'text',
  ],
  'name' => [
      'no',
      'statkel',
  ],
  "title" => [
        "view" => "Master Status Keluarga",
        "edit" => "Ubah Master Status Keluarga",
        "new" => "Tambahkan Master Status Keluarga"
    ],
  'command' => 'php gugus template mstatkel --crud mstatkel'
];

$arr[] = [
  'table' => 'fileup',
  'data' => [
      'id' => ai(),
      'statkel' => char(255),
      'file' => char(255),
      'created_at' => timestamp(),
      'updated_at' => timestampupdate(),
  ],
  'form' => [
      'id' => 'no',
      'statkel' => 'text',
      'file' => 'file',
      'created_at' => 'no',
      'updated_at' => 'no',
  ],
  'name' => [
      'no',
      'statkel',
      'file',
      'dibuat',
      'diupdate',
  ],
  "title" => [
        "view" => "Master Status fileup",
        "edit" => "Ubah Master Status fileup",
        "new" => "Tambahkan Master Status fileup"
    ],
  'command' => 'php gugus template fileup --crud fileup'
];

$arr[] = [
  'table' => 'mumur',
  'data' => [
      'id' => ai(),
      'umur' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'umur' => 'text',
  ],
  'name' => [
      'no',
      'umur',
  ],
  "title" => [
        "view" => "Master Umur",
        "edit" => "Ubah Master Umur",
        "new" => "Tambahkan Master Umur"
    ],
  'command' => 'php gugus template mumur --crud mumur'
];

$arr[] = [
  'table' => 'perusahaan',
  'data' => [
      'id' => ai(),
      'nama' => char(255),
      'alamat' => char(255),
      'email' => char(255),
      'tlpn' => char(255),
      'hp' => char(255),
      'ig' => char(255),
      'fb' => char(255),
      'tw' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'nama' => 'text',
      'alamat' => 'text',
      'email' => 'text',
      'tlpn' => 'text',
      'hp' => 'text',
      'ig' => 'text',
      'fb' => 'text',
      'tw' => 'text',
  ],
  'name' => [
      'no',
      'nama',
      'alamat',
      'email',
      'telephone',
      'handphone',
      'instagram',
      'facebook',
      'twitter',
  ],
  "title" => [
        "view" => "Perusahaan",
        "edit" => "Ubah Perusahaan",
        "new" => "Tambahkan Perusahaan"
    ],
  'command' => 'php gugus template perusahaan --crud perusahaan'
];

$arr[] = [
  'table' => 'tbl_artikel',
  'data' => [
      'id' => ai(),
      'artikel_id' => char(255),
      'judul' => char(255),
      'slug' => char(255),
      'foto' => char(255),
      'deskripsi' => text(),
      'content' => textlong(),
      'waktu' => timestampupdate(),
      'status_id' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'artikel_id' => [
          "type" => "select",  // type digunakan untuk menentukan tipe form
          "data" => [                     // data merupakan setting dari selection
            "db" => "martikel",         // db disini anda akan memilih data dari table mana yang ingin anda ambil
            "data" => "id",             // data merupakan setting untuk value yang akan digunakan pada option
            "name" => "artikel"   // name digunakan untuk tampilan dari option
        ]
      ],
      'judul' => 'text',
      'slug' => [
            'type' => 'slug',
            'row' => 'judul'
        ],
      'foto' => 'file',
      'deskripsi' => 'text',
      'content' => 'editor',
      'waktu' => 'no',
      'status_id' => [
        "type" => "select",  // type digunakan untuk menentukan tipe form
        "data" => [                     // data merupakan setting dari selection
          "db" => "mstatus",         // db disini anda akan memilih data dari table mana yang ingin anda ambil
          "data" => "id",             // data merupakan setting untuk value yang akan digunakan pada option
          "name" => "status"   // name digunakan untuk tampilan dari option
      ]
    ],
  ],
  'name' => [
      'no',
      'artikel',
      'judul',
      'slug',
      'foto',
      'deskripsi',
      'content',
      'waktu',
      'status',
  ],
  "title" => [
        "view" => "Tabel Artikel",
        "edit" => "Ubah Tabel Artikel",
        "new" => "Tambahkan Tabel Artikel"
    ],
    "custome" => "[
        'content' => [
            'key' => ['id', 'slug'],
            'content' => '<a class=\"btn btn-primary\" href=\"'.site_url('').'artikel/detail/{{slug}}\" onclick=\"alert(\"https://www.w3schools.com\") \">Lihat Artikel</a>',
        ],
        'artikel_id' => [
            'replacerow' => [
                'table' => 'martikel',
                'condition' => ['id'],
                'value' => ['artikel_id'],
                'get' => 'artikel',
            ],
        ],
        'status_id' => [
            'replacerow' => [
                'table' => 'mstatus',
                'condition' => ['id'],
                'value' => ['status_id'],
                'get' => 'status',
            ],
        ]
    ]",
  'command' => 'php gugus template tbl_artikel --crud tbl_artikel'
];

$arr[] = [
  'table' => 'tbl_berita',
  'data' => [
      'id' => ai(),
      'user_id' => char(255),
      'user_kel_id' => char(255),
      'berita_id' => char(255),
      'judul' => char(255),
      'foto' => char(255),
      'isi' => char(255),
      'waktu' => timestampupdate(),
      'status_id' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'user_id' => 'login',
      'user_kel_id' => 'text',
      'berita_id' => [
            "type" => "select",  // type digunakan untuk menentukan tipe form
            "data" => [                     // data merupakan setting dari selection
                "db" => "mberita",         // db disini anda akan memilih data dari table mana yang ingin anda ambil
                "data" => "id",             // data merupakan setting untuk value yang akan digunakan pada option
                "name" => "berita"   // name digunakan untuk tampilan dari option
            ]
        ],
        'judul' => 'text',
        'foto' => 'file',
        'isi' => 'editor',
        'waktu' => 'no',
        'status_id' => [
            "type" => "select",  // type digunakan untuk menentukan tipe form
            "data" => [                     // data merupakan setting dari selection
                "db" => "mstatus",         // db disini anda akan memilih data dari table mana yang ingin anda ambil
                "data" => "id",             // data merupakan setting untuk value yang akan digunakan pada option
                "name" => "status"   // name digunakan untuk tampilan dari option
            ]
        ]
  ],
  'name' => [
      'no',
      'user',
      'user keluarga',
      'berita',
      'judul',
      'foto',
      'isi',
      'waktu',
      'status',
  ],
  "title" => [
        "view" => "Tabel Berita",
        "edit" => "Ubah Tabel Berita",
        "new" => "Tambahkan Tabel Berita"
    ],
    "custome" => "[
        'berita_id' => [
            'replacerow' => [
                'table' => 'mberita',
                'condition' => ['id'],
                'value' => ['berita_id'],
                'get' => 'berita',
            ],
        ],
        'status_id' => [
            'replacerow' => [
                'table' => 'mstatus',
                'condition' => ['id'],
                'value' => ['status_id'],
                'get' => 'status',
            ],
        ]
    ]",
  'command' => 'php gugus template tbl_berita --crud tbl_berita'
];

$arr[] = [
  'table' => 'tbl_kegiatan',
  'data' => [
      'id' => ai(),
      'user_id' => char(255),
      'user_kel_id' => char(255),
      'kegiatan_id' => char(255),
      'judul' => char(255),
      'foto' => char(255),
      'isi' => char(255),
      'waktu' => char(255),
      'status_id' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'user_id' => 'login',
      'user_kel_id' => 'text',
      'kegiatan_id' => 'text',
      'judul' => 'text',
      'foto' => 'text',
      'isi' => 'text',
      'waktu' => 'text',
      'status_id' => 'text',
  ],
  'name' => [
      'no',
      'user',
      'user keluarga',
      'kegiatan',
      'judul',
      'foto',
      'isi',
      'waktu',
      'status',
  ],
  "title" => [
        "view" => "Tabel Kegiatan",
        "edit" => "Ubah Tabel Kegiatan",
        "new" => "Tambahkan Tabel Kegiatan"
    ],
  'command' => 'php gugus template tbl_kegiatan --crud tbl_kegiatan'
];

$arr[] = [
  'table' => 'tree',
  'data' => [
      'id' => ai(),
      'user_id' => char(255),
      'user_kel_id' => char(255),
      'mkel_id' => char(255),
      'child' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'user_id' => 'login',
      'user_kel_id' =>  [
        "type" => "select",
        "data" => [
            "db" => "user_kel",
            "data" => "id",
            "name" => "nama"
        ]
    ],
      'mkel_id' => [
        "type" => "select",
        "data" => [
            "db" => "mkel",
            "data" => "id",
            "name" => "keluarga"
        ]
    ],
      'child' => [
        "type" => "select",
        "data" => [
            "db" => "user_kel",
            "data" => "id",
            "name" => "nama"
        ]
    ],
  ],
  'name' => [
      'No',
      'User',
      'User Keluarga',
      'Sebagai',
      'Child',
  ],
  "title" => [
        "view" => "tree",
        "edit" => "Ubah tree",
        "new" => "Tambahkan tree"
    ],
  'command' => 'php gugus template tree --crud tree'
];


// user admin
$arr[] = [
  'table' => 'user',
  'data' => [
      'id' => ai(),
      'username' => char(255),
      'password' => char(255),
      'nama' => char(255),
      'hp' => char(255),
      'namaayah' => char(255),
      'namaibu' => char(255),
      'email' => char(255),
      'status_id' => char(10),
      'created_at' => timestamp(),
      'updated_at' => timestampupdate(),
      'foto' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'username' => 'username',
      'password' => 'password',
      'nama' => 'text',
      'hp' => 'text',
      'namaayah' => 'text',
      'namaibu' => 'text',
      'email' => 'email',
      'status_id' => 'text',
      'created_at' => 'no',
      'updated_at' => 'no',
  ],
  'name' => [
      'no',
      'username',
      'password',
      'nama',
      'hp',
      'namaayah',
      'namaibu',
      'email',
      'status',
      'dibuat pada',
      'diupdate pada',
  ],
  "title" => [
        "view" => "User",
        "edit" => "Ubah User",
        "new" => "Tambahkan User"
    ],
  'command' => 'php gugus template user --crud user'
];

// customer
$arr[] = [
  'table' => 'user_kel',
  'data' => [
      'id' => ai(),
      'user_id' => char(255),
      'nama' => char(255),
      'kelamin_id' => char(255),
      'tmptlahir' => char(255),
      'tgllahir' => char(255),
      'agama_id' => char(255),
      'pendidikan_id' => char(255),
      'pekerjaan_id' => char(255),
      'alamat' => char(255),
      'kel' => char(255),
      'kec' => char(255),
      'kab_id' => char(255),
      'prov_id' => char(255),
      'perkawinan_id' => char(255),
      'tglmenikah' => char(255),
      'tglmeninggal' => char(255),
      'tmptmeninggal' => char(255),
      'foto' => char(255),
      'username' => char(255),
      'password' => char(255),
      'waktu' => char(255),
      'status_id' => char(255),
      'status_id' => char(255),
      'sebagai' => char(255),
      'id_kel' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'user_id' => 'login',
      'nama' => 'text',
      'kelamin_id' => [
          "type" => "select",
          "data" => [
              "db" => "mkelamin",
              "data" => "id",
              "name" => "kelamin"
          ]
      ],
      'tmptlahir' => 'text',
      'tgllahir' => 'date',
      'agama_id' => [
        "type" => "select",
        "data" => [
          "db" => "magama",
          "data" => "id",
          "name" => "agama"
        ]
      ],
      'pendidikan_id' => [
        "type" => "select",
        "data" => [
          "db" => "mpendidikan",
          "data" => "id",
          "name" => "pendidikan"
        ]
      ],
      'pekerjaan_id' => [
        "type" => "select",
        "data" => [
          "db" => "mpekerjaan",
          "data" => "id",
          "name" => "pekerjaan"
        ]
      ],
      'alamat' => 'text',
      'kel' => [
        "type" => "select",
        "data" => [
          "db" => "mdesa",
          "data" => "id",
          "name" => "name"
        ]
      ],
      'kec' => [
        "type" => "select",
        "data" => [
          "db" => "mkecamatan",
          "data" => "id",
          "name" => "name"
        ]
      ],
      'prov_id' => [
        "type" => "select",
        "data" => [
          "db" => "mprovinsi",
          "data" => "id",
          "name" => "name"
        ]
      ],
      'kab_id' => [
        "type" => "select",
        "data" => [
          "db" => "mkabupaten",
          "data" => "id",
          "name" => "name"
        ]
      ],
      'perkawinan_id' => [
        "type" => "select",
        "data" => [
          "db" => "mstatkel",
          "data" => "id",
          "name" => "statkel"
        ]
      ],
      'tglmenikah' => 'date',
      'tglmeninggal' => 'date',
      'tmptmeninggal' => 'date',
      'foto' => 'file',
      'username' => 'username',
      'password' => 'password',
      'waktu' => 'date',
      'status_id' => [
        "type" => "select",
        "data" => [
          "db" => "mstatus",
          "data" => "id",
          "name" => "status"
        ]
      ],
      'sebagai' => [
        "type" => "select",
        "data" => [
          "db" => "mkel",
          "data" => "id",
          "name" => "keluarga"
        ]
      ],
      'id_kel' => [
        "type" => "select",
        "data" => [
          "db" => "user_kel",
          "data" => "id",
          "name" => "nama"
        ]
      ],
  ],
  'name' => [
      'no',
      'user',
      'nama',
      'jenis kelamin',
      'tempat lahir',
      'tanggal lahir',
      'agama',
      'pendidikan',
      'pekerjaan',
      'alamat',
      'kelurahan',
      'kecamatan',
      'kabupaten',
      'provinsi',
      'perkawinan',
      'tanggal menikah',
      'tanggal meninggal',
      'tempat meninggal',
      'foto',
      'username',
      'password',
      'waktu',
      'status',
      'sebagai',
      'kepala keluarga',
  ],
  "title" => [
        "view" => "User Keluarga",
        "edit" => "Ubah User Keluarga",
        "new" => "Tambahkan User Keluarga"
    ],
  'command' => 'php gugus template user_kel --crud user_kel'
];


// testimony
$arr[] = [
  'table' => 'testimony',
  'data' => [
      'id' => ai(),
      'foto' => char(255),
      'nama' => char(255),
      'deskripsi' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'foto' => 'file',
      'nama' => 'text',
      'deskripsi' => 'text',
  ],
  'name' => [
      'no',
      'foto',
      'nama',
      'Deskripsi',
  ],
  "title" => [
        "view" => "Testimoni",
        "edit" => "Ubah Testimoni",
        "new" => "Tambahkan Testimoni"
    ],
  'command' => 'php gugus template testimony --crud testimony'
];


// sosmed
$arr[] = [
  'table' => 'sosmed',
  'data' => [
      'id' => ai(),
      'title' => char(255),
      'icon' => char(255),
      'link' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'title' => 'text',
      'icon' => 'text',
      'link' => 'text',
  ],
  'name' => [
      'no',
      'nama sosmed',
      'icon',
      'alamat',
  ],
  "title" => [
        "view" => "Sosial Media",
        "edit" => "Ubah Sosial Media",
        "new" => "Tambahkan Sosial Media"
    ],
  'command' => 'php gugus template sosmed --crud sosmed'
];

// service
$arr[] = [
  'table' => 'service',
  'data' => [
      'id' => ai(),
      'title' => char(255),
      'icon' => char(255),
      'link' => text(),
  ],
  'form' => [
      'id' => 'no',
      'title' => 'text',
      'icon' => 'text',
      'link' => 'text',
  ],
  'name' => [
      'no',
      'title',
      'icon',
      'deskripsi',
  ],
  "title" => [
        "view" => "Service",
        "edit" => "Ubah Service",
        "new" => "Tambahkan Service"
    ],
  'command' => 'php gugus template service --crud service'
];

// support
$arr[] = [
  'table' => 'support',
  'data' => [
      'id' => ai(),
      'foto' => char(255),
      'nama' => char(255),
  ],
  'form' => [
      'id' => 'no',
      'foto' => 'file',
      'nama' => 'text',
  ],
  'name' => [
      'no',
      'foto',
      'nama',
  ],
  "title" => [
        "view" => "Support",
        "edit" => "Ubah Support",
        "new" => "Tambahkan Support"
    ],
  'command' => 'php gugus template support --crud support'
];

// layanan
$arr[] = [
    'table' => 'layanan',
    'data' => [
        'id' => ai(),
        'title' => char(255),
        'icon' => char(255),
        'description' => text(),
    ],
    'form' => [
        'id' => 'no',
        'title' => 'text',
        'icon' => 'text',
        'description' => 'text',
    ],
    'name' => [
        'no',
        'Judul',
        'icon',
        'deskripsi',
    ],
    "title" => [
          "view" => "Layanan",
          "edit" => "Ubah Layanan",
          "new" => "Tambahkan Layanan"
      ],
    'command' => 'php gugus template layanan --crud layanan'
  ];


    return $arr;
}
