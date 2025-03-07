<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Nama',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'jabatan'                  => 'Jabatan',
            'jabatan_helper'           => ' ',
            'jenis_pegawai'            => 'Jenis Pegawai',
            'jenis_pegawai_helper'     => ' ',
            'jenis_kelamin'            => 'Jenis Kelamin',
            'jenis_kelamin_helper'     => ' ',
            'tempat_lahir'             => 'Tempat Lahir',
            'tempat_lahir_helper'      => ' ',
            'agama'                    => 'Agama',
            'agama_helper'             => ' ',
            'no_ktp'                   => 'No KTP',
            'no_ktp_helper'            => ' ',
            'no_kk'                    => 'No KK',
            'no_kk_helper'             => ' ',
            'tmt_masuk'                => 'TMT Masuk',
            'tmt_masuk_helper'         => ' ',
            'no_bpjstk'                => 'No BPJS Ketenagakerjaan',
            'no_bpjstk_helper'         => ' ',
            'no_bpjskes'               => 'No BPJS Kesehatan',
            'no_bpjskes_helper'        => ' ',
            'alamat'                   => 'Alamat',
            'alamat_helper'            => ' ',
            'no_rekening'              => 'No Rekening',
            'no_rekening_helper'       => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'area' => [
        'title'          => 'Area',
        'title_singular' => 'Area',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => ' ',
            'nama'                       => 'Nama',
            'nama_helper'                => ' ',
            'umr'                        => 'UMR',
            'umr_helper'                 => ' ',
            'tunjangan_kemahalan'        => 'Tunjangan Kemahalan',
            'tunjangan_kemahalan_helper' => ' ',
            'created_at'                 => 'Created at',
            'created_at_helper'          => ' ',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => ' ',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => ' ',
        ],
    ],
    'perusahaan' => [
        'title'          => 'Perusahaan',
        'title_singular' => 'Perusahaan',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'area'              => 'Area',
            'area_helper'       => ' ',
            'nama'              => 'Nama',
            'nama_helper'       => ' ',
            'alamat'            => 'Alamat',
            'alamat_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'kantor' => [
        'title'          => 'Kantor',
        'title_singular' => 'Kantor',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'perusahaan'        => 'Perusahaan',
            'perusahaan_helper' => ' ',
            'area'              => 'Area',
            'area_helper'       => ' ',
            'nama'              => 'Nama',
            'nama_helper'       => ' ',
            'alamat'            => 'Alamat',
            'alamat_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'pengaturan' => [
        'title'          => 'Pengaturan',
        'title_singular' => 'Pengaturan',
    ],
    'jabatan' => [
        'title'          => 'Jabatan',
        'title_singular' => 'Jabatan',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'kantor'                      => 'Kantor',
            'kantor_helper'               => ' ',
            'kode'                        => 'Kode',
            'kode_helper'                 => ' ',
            'nama'                        => 'Nama',
            'nama_helper'                 => ' ',
            'koefisien_tunjangan'         => 'Koefisien Tunjangan',
            'koefisien_tunjangan_helper'  => ' ',
            'is_lembur_otomatis'          => 'Lembur Otomatis',
            'is_lembur_otomatis_helper'   => ' ',
            'tujangan_kinerja'            => 'Tujangan Kinerja',
            'tujangan_kinerja_helper'     => ' ',
            'tunjangan_komunikasi'        => 'Tunjangan Komunikasi',
            'tunjangan_komunikasi_helper' => ' ',
            'tunjangan_cuti'              => 'Tunjangan Cuti',
            'tunjangan_cuti_helper'       => ' ',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
            'tunjangan_pakaian'           => 'Tunjangan Pakaian',
            'tunjangan_pakaian_helper'    => ' ',
            'tunjangan_jabatan'           => 'Tunjangan Jabatan',
            'tunjangan_jabatan_helper'    => ' ',
            'tunjangan_kemahalan'         => 'Tunjangan Kemahalan',
            'tunjangan_kemahalan_helper'  => ' ',
        ],
    ],
    'bank' => [
        'title'          => 'Bank',
        'title_singular' => 'Bank',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'area'              => 'Area',
            'area_helper'       => ' ',
            'kode'              => 'Kode',
            'kode_helper'       => ' ',
            'nama'              => 'Nama',
            'nama_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'manajemenKaryawan' => [
        'title'          => 'Manajemen Pegawai',
        'title_singular' => 'Manajemen Pegawai',
    ],
    'keluarga' => [
        'title'          => 'Keluarga',
        'title_singular' => 'Keluarga',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'user'                     => 'User',
            'user_helper'              => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'nama'                     => 'Nama',
            'nama_helper'              => ' ',
            'hubungan_keluarga'        => 'Hubungan Keluarga',
            'hubungan_keluarga_helper' => ' ',
            'jenis_kelamin'            => 'Jenis Kelamin',
            'jenis_kelamin_helper'     => ' ',
            'tempat_lahir'             => 'Tempat Lahir',
            'tempat_lahir_helper'      => ' ',
            'tanggal_lahir'            => 'Tanggal Lahir',
            'tanggal_lahir_helper'     => ' ',
            'agama'                    => 'Agama',
            'agama_helper'             => ' ',
            'no_ktp'                   => 'No KTP',
            'no_ktp_helper'            => ' ',
            'no_kk'                    => 'No KK',
            'no_kk_helper'             => ' ',
            'no_bpjskes'               => 'No BPJS Kesehatan',
            'no_bpjskes_helper'        => ' ',
            'alamat'                   => 'Alamat',
            'alamat_helper'            => ' ',
        ],
    ],
    'absensi' => [
        'title'          => 'Absensi',
        'title_singular' => 'Absensi',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'tanggal'           => 'Tanggal',
            'tanggal_helper'    => ' ',
            'jam_datang'        => 'Jam Datang',
            'jam_datang_helper' => ' ',
            'jam_pulang'        => 'Jam Pulang',
            'jam_pulang_helper' => ' ',
            'keterangan'        => 'Keterangan',
            'keterangan_helper' => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'manajemenAbsensiDanLembur' => [
        'title'          => 'Absensi dan Lembur',
        'title_singular' => 'Absensi dan Lembur',
    ],
    'lembur' => [
        'title'          => 'Lembur',
        'title_singular' => 'Lembur',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'user'                        => 'User',
            'user_helper'                 => ' ',
            'tanggal'                     => 'Tanggal',
            'tanggal_helper'              => ' ',
            'jam_mulai'                   => 'Jam Mulai',
            'jam_mulai_helper'            => ' ',
            'jam_akhir'                   => 'Jam Akhir',
            'jam_akhir_helper'            => ' ',
            'keterangan_pekerjaan'        => 'Keterangan Pekerjaan',
            'keterangan_pekerjaan_helper' => ' ',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
            'status'                      => 'Status',
            'status_helper'               => ' ',
        ],
    ],
    'absensiSetting' => [
        'title'          => 'Absensi Setting',
        'title_singular' => 'Absensi Setting',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'kantor'            => 'Kantor',
            'kantor_helper'     => ' ',
            'hari'              => 'Hari',
            'hari_helper'       => ' ',
            'jam_datang'        => 'Jam Datang',
            'jam_datang_helper' => ' ',
            'jam_pulang'        => 'Jam Pulang',
            'jam_pulang_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'potonganAbsensi' => [
        'title'          => 'Potongan Absensi',
        'title_singular' => 'Potongan Absensi',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'perusahaan'          => 'Perusahaan',
            'perusahaan_helper'   => ' ',
            'terlambat'           => 'Terlambat (%)',
            'terlambat_helper'    => ' ',
            'pulang_cepat'        => 'Pulang Cepat (%)',
            'pulang_cepat_helper' => ' ',
            'izin'                => 'Izin (%)',
            'izin_helper'         => ' ',
            'sakit'               => 'Sakit (%)',
            'sakit_helper'        => ' ',
            'tanpa_kabar'         => 'Tanpa Kabar',
            'tanpa_kabar_helper'  => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'hariLiburNasional' => [
        'title'          => 'Hari Libur Nasional',
        'title_singular' => 'Hari Libur Nasional',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'perusahaan'        => 'Perusahaan',
            'perusahaan_helper' => ' ',
            'tanggal'           => 'Tanggal',
            'tanggal_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'jenisGaji' => [
        'title'          => 'Jenis Gaji',
        'title_singular' => 'Jenis Gaji',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'perusahaan'        => 'Perusahaan',
            'perusahaan_helper' => ' ',
            'kode'              => 'Kode',
            'kode_helper'       => ' ',
            'nama'              => 'Nama',
            'nama_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'refBpj' => [
        'title'          => 'Ref BPJS',
        'title_singular' => 'Ref BPJ',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'kode'               => 'Kode',
            'kode_helper'        => ' ',
            'provider'           => 'Provider',
            'provider_helper'    => ' ',
            'nama'               => 'Nama',
            'nama_helper'        => ' ',
            'presentase'         => 'Presentase',
            'presentase_helper'  => ' ',
            'jenis_beban'        => 'Jenis Beban',
            'jenis_beban_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'manajemenGaji' => [
        'title'          => 'Manajemen Gaji',
        'title_singular' => 'Manajemen Gaji',
    ],
    'rekanan' => [
        'title'          => 'Rekanan',
        'title_singular' => 'Rekanan',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'perusahaan'        => 'Perusahaan',
            'perusahaan_helper' => ' ',
            'area'              => 'Area',
            'area_helper'       => ' ',
            'nama'              => 'Nama',
            'nama_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'potonganGaji' => [
        'title'          => 'Potongan Gaji',
        'title_singular' => 'Potongan Gaji',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'user'                => 'User',
            'user_helper'         => ' ',
            'rekanan'             => 'Rekanan',
            'rekanan_helper'      => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'periode_gaji'        => 'Periode Gaji',
            'periode_gaji_helper' => ' ',
            'keterangan'          => 'Keterangan',
            'keterangan_helper'   => ' ',
            'nominal'             => 'Nominal',
            'nominal_helper'      => ' ',
        ],
    ],
    'gajiBulanan' => [
        'title'          => 'Gaji Bulanan',
        'title_singular' => 'Gaji Bulanan',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'perusahaan'        => 'Perusahaan',
            'perusahaan_helper' => ' ',
            'jenis_gaji'        => 'Jenis Gaji',
            'jenis_gaji_helper' => ' ',
            'tanggal'           => 'Tanggal',
            'tanggal_helper'    => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'gajiBulananDetail' => [
        'title'          => 'Gaji Bulanan Detail',
        'title_singular' => 'Gaji Bulanan Detail',
        'fields'         => [
            'id'                                 => 'ID',
            'id_helper'                          => ' ',
            'gaji_bulanan'                       => 'Gaji Bulanan',
            'gaji_bulanan_helper'                => ' ',
            'user'                               => 'User',
            'user_helper'                        => ' ',
            'gaji_pokok'                         => 'Gaji Pokok',
            'gaji_pokok_helper'                  => ' ',
            'total_tunjangan'                    => 'Total Tunjangan',
            'total_tunjangan_helper'             => ' ',
            'total_iuran_bpjstk'                 => 'Total Iuran Bpjstk',
            'total_iuran_bpjstk_helper'          => ' ',
            'total_iuran_bpjskes'                => 'Total Iuran Bpjskes',
            'total_iuran_bpjskes_helper'         => ' ',
            'total_lembur'                       => 'Total Lembur',
            'total_lembur_helper'                => ' ',
            'total_pajak'                        => 'Total Pajak',
            'total_pajak_helper'                 => ' ',
            'total_premi_bpjstk'                 => 'Total Premi Bpjstk',
            'total_premi_bpjstk_helper'          => ' ',
            'total_premi_bpjskes'                => 'Total Premi Bpjskes',
            'total_premi_bpjskes_helper'         => ' ',
            'premi_taspen_save'                  => 'Premi Taspen Save',
            'premi_taspen_save_helper'           => ' ',
            'total_potongan_absensi'             => 'Total Potongan Absensi',
            'total_potongan_absensi_helper'      => ' ',
            'total_potongan_pihak_ketiga'        => 'Total Potongan Pihak Ketiga',
            'total_potongan_pihak_ketiga_helper' => ' ',
            'total_thp'                          => 'Total THP',
            'total_thp_helper'                   => ' ',
            'created_at'                         => 'Created at',
            'created_at_helper'                  => ' ',
            'updated_at'                         => 'Updated at',
            'updated_at_helper'                  => ' ',
            'deleted_at'                         => 'Deleted at',
            'deleted_at_helper'                  => ' ',
        ],
    ],

];
