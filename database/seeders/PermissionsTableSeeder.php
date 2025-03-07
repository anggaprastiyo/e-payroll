<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'area_create',
            ],
            [
                'id'    => 20,
                'title' => 'area_edit',
            ],
            [
                'id'    => 21,
                'title' => 'area_show',
            ],
            [
                'id'    => 22,
                'title' => 'area_delete',
            ],
            [
                'id'    => 23,
                'title' => 'area_access',
            ],
            [
                'id'    => 24,
                'title' => 'perusahaan_create',
            ],
            [
                'id'    => 25,
                'title' => 'perusahaan_edit',
            ],
            [
                'id'    => 26,
                'title' => 'perusahaan_show',
            ],
            [
                'id'    => 27,
                'title' => 'perusahaan_delete',
            ],
            [
                'id'    => 28,
                'title' => 'perusahaan_access',
            ],
            [
                'id'    => 29,
                'title' => 'kantor_create',
            ],
            [
                'id'    => 30,
                'title' => 'kantor_edit',
            ],
            [
                'id'    => 31,
                'title' => 'kantor_show',
            ],
            [
                'id'    => 32,
                'title' => 'kantor_delete',
            ],
            [
                'id'    => 33,
                'title' => 'kantor_access',
            ],
            [
                'id'    => 34,
                'title' => 'pengaturan_access',
            ],
            [
                'id'    => 35,
                'title' => 'jabatan_create',
            ],
            [
                'id'    => 36,
                'title' => 'jabatan_edit',
            ],
            [
                'id'    => 37,
                'title' => 'jabatan_show',
            ],
            [
                'id'    => 38,
                'title' => 'jabatan_delete',
            ],
            [
                'id'    => 39,
                'title' => 'jabatan_access',
            ],
            [
                'id'    => 40,
                'title' => 'bank_create',
            ],
            [
                'id'    => 41,
                'title' => 'bank_edit',
            ],
            [
                'id'    => 42,
                'title' => 'bank_show',
            ],
            [
                'id'    => 43,
                'title' => 'bank_delete',
            ],
            [
                'id'    => 44,
                'title' => 'bank_access',
            ],
            [
                'id'    => 45,
                'title' => 'manajemen_karyawan_access',
            ],
            [
                'id'    => 46,
                'title' => 'keluarga_create',
            ],
            [
                'id'    => 47,
                'title' => 'keluarga_edit',
            ],
            [
                'id'    => 48,
                'title' => 'keluarga_show',
            ],
            [
                'id'    => 49,
                'title' => 'keluarga_delete',
            ],
            [
                'id'    => 50,
                'title' => 'keluarga_access',
            ],
            [
                'id'    => 51,
                'title' => 'absensi_create',
            ],
            [
                'id'    => 52,
                'title' => 'absensi_edit',
            ],
            [
                'id'    => 53,
                'title' => 'absensi_show',
            ],
            [
                'id'    => 54,
                'title' => 'absensi_delete',
            ],
            [
                'id'    => 55,
                'title' => 'absensi_access',
            ],
            [
                'id'    => 56,
                'title' => 'manajemen_absensi_dan_lembur_access',
            ],
            [
                'id'    => 57,
                'title' => 'lembur_create',
            ],
            [
                'id'    => 58,
                'title' => 'lembur_edit',
            ],
            [
                'id'    => 59,
                'title' => 'lembur_show',
            ],
            [
                'id'    => 60,
                'title' => 'lembur_delete',
            ],
            [
                'id'    => 61,
                'title' => 'lembur_access',
            ],
            [
                'id'    => 62,
                'title' => 'absensi_setting_create',
            ],
            [
                'id'    => 63,
                'title' => 'absensi_setting_edit',
            ],
            [
                'id'    => 64,
                'title' => 'absensi_setting_show',
            ],
            [
                'id'    => 65,
                'title' => 'absensi_setting_delete',
            ],
            [
                'id'    => 66,
                'title' => 'absensi_setting_access',
            ],
            [
                'id'    => 67,
                'title' => 'potongan_absensi_create',
            ],
            [
                'id'    => 68,
                'title' => 'potongan_absensi_edit',
            ],
            [
                'id'    => 69,
                'title' => 'potongan_absensi_show',
            ],
            [
                'id'    => 70,
                'title' => 'potongan_absensi_delete',
            ],
            [
                'id'    => 71,
                'title' => 'potongan_absensi_access',
            ],
            [
                'id'    => 72,
                'title' => 'hari_libur_nasional_create',
            ],
            [
                'id'    => 73,
                'title' => 'hari_libur_nasional_edit',
            ],
            [
                'id'    => 74,
                'title' => 'hari_libur_nasional_show',
            ],
            [
                'id'    => 75,
                'title' => 'hari_libur_nasional_delete',
            ],
            [
                'id'    => 76,
                'title' => 'hari_libur_nasional_access',
            ],
            [
                'id'    => 77,
                'title' => 'jenis_gaji_create',
            ],
            [
                'id'    => 78,
                'title' => 'jenis_gaji_edit',
            ],
            [
                'id'    => 79,
                'title' => 'jenis_gaji_show',
            ],
            [
                'id'    => 80,
                'title' => 'jenis_gaji_delete',
            ],
            [
                'id'    => 81,
                'title' => 'jenis_gaji_access',
            ],
            [
                'id'    => 82,
                'title' => 'ref_bpj_create',
            ],
            [
                'id'    => 83,
                'title' => 'ref_bpj_edit',
            ],
            [
                'id'    => 84,
                'title' => 'ref_bpj_show',
            ],
            [
                'id'    => 85,
                'title' => 'ref_bpj_delete',
            ],
            [
                'id'    => 86,
                'title' => 'ref_bpj_access',
            ],
            [
                'id'    => 87,
                'title' => 'manajemen_gaji_access',
            ],
            [
                'id'    => 88,
                'title' => 'rekanan_create',
            ],
            [
                'id'    => 89,
                'title' => 'rekanan_edit',
            ],
            [
                'id'    => 90,
                'title' => 'rekanan_show',
            ],
            [
                'id'    => 91,
                'title' => 'rekanan_delete',
            ],
            [
                'id'    => 92,
                'title' => 'rekanan_access',
            ],
            [
                'id'    => 93,
                'title' => 'potongan_gaji_create',
            ],
            [
                'id'    => 94,
                'title' => 'potongan_gaji_edit',
            ],
            [
                'id'    => 95,
                'title' => 'potongan_gaji_show',
            ],
            [
                'id'    => 96,
                'title' => 'potongan_gaji_delete',
            ],
            [
                'id'    => 97,
                'title' => 'potongan_gaji_access',
            ],
            [
                'id'    => 98,
                'title' => 'gaji_bulanan_create',
            ],
            [
                'id'    => 99,
                'title' => 'gaji_bulanan_edit',
            ],
            [
                'id'    => 100,
                'title' => 'gaji_bulanan_show',
            ],
            [
                'id'    => 101,
                'title' => 'gaji_bulanan_delete',
            ],
            [
                'id'    => 102,
                'title' => 'gaji_bulanan_access',
            ],
            [
                'id'    => 103,
                'title' => 'gaji_bulanan_detail_create',
            ],
            [
                'id'    => 104,
                'title' => 'gaji_bulanan_detail_edit',
            ],
            [
                'id'    => 105,
                'title' => 'gaji_bulanan_detail_show',
            ],
            [
                'id'    => 106,
                'title' => 'gaji_bulanan_detail_delete',
            ],
            [
                'id'    => 107,
                'title' => 'gaji_bulanan_detail_access',
            ],
            [
                'id'    => 108,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
