<?php

namespace Database\Seeders;

use App\Models\AssessmentResult;
use App\Models\Major;
use Illuminate\Database\Seeder;

class AssessmentResultSeeder extends Seeder
{
    public function run(): void
    {
        $majors = Major::all();
        if ($majors->isEmpty()) {
            return;
        }

        $candidates = [
            [
                'nama_maba' => 'Ahmad Fauzi',
                'email_maba' => 'ahmad.fauzi@gmail.com',
                'no_wa' => '081234567890',
                'asal_sekolah' => 'SMKN 1 Jakarta',
                'r' => 85, 'i' => 90, 'a' => 45, 's' => 40, 'e' => 55, 'c' => 80,
                'prodi1' => 'Teknologi Informasi',
                'prodi2' => 'Rekayasa Perangkat Lunak',
                'prodi3' => 'Sistem Informasi',
                'summary' => 'Kombinasi dominan tipe Investigative (I) dan Realistic (R) menunjukkan potensi analisis logis, pemrograman sistem, dan arsitektur data yang kuat.',
                'days_ago' => 1,
            ],
            [
                'nama_maba' => 'Siti Nurhaliza',
                'email_maba' => 'siti.nur@yahoo.com',
                'no_wa' => '082198765432',
                'asal_sekolah' => 'SMAN 3 Depok',
                'r' => 35, 'i' => 60, 'a' => 88, 's' => 92, 'e' => 70, 'c' => 40,
                'prodi1' => 'Ilmu Komunikasi',
                'prodi2' => 'Hubungan Masyarakat',
                'prodi3' => 'Penyiaran',
                'summary' => 'Profil dominan Social (S) dan Artistic (A) merefleksikan kecakapan komunikasi interpersonal, empati sosial, dan kreativitas narasi media publik.',
                'days_ago' => 2,
            ],
            [
                'nama_maba' => 'Rian Pratama',
                'email_maba' => 'rian.pratama@gmail.com',
                'no_wa' => '085712349876',
                'asal_sekolah' => 'SMA Bina Insani',
                'r' => 40, 'i' => 50, 'a' => 55, 's' => 65, 'e' => 95, 'c' => 88,
                'prodi1' => 'Manajemen',
                'prodi2' => 'Akuntansi',
                'prodi3' => 'Administrasi Bisnis',
                'summary' => 'Orientasi Enterprising (E) dan Conventional (C) yang sangat tinggi sangat ideal untuk strategi kepemimpinan bisnis, manajerial organisasi, dan tata kelola korporat.',
                'days_ago' => 3,
            ],
            [
                'nama_maba' => 'Dinda Putri Ayu',
                'email_maba' => 'dinda.putri@gmail.com',
                'no_wa' => '081388776655',
                'asal_sekolah' => 'SMKN 4 Bogor',
                'r' => 50, 'i' => 75, 'a' => 82, 's' => 60, 'e' => 65, 'c' => 45,
                'prodi1' => 'Ilmu Komputer',
                'prodi2' => 'Rekayasa Perangkat Lunak',
                'prodi3' => 'Sistem Informasi',
                'summary' => 'Keseimbangan Artistic (A) dan Investigative (I) memfasilitasi visualisasi data analitis, eksplorasi riset UI/UX, dan pemodelan kecerdasan buatan terapan.',
                'days_ago' => 4,
            ],
            [
                'nama_maba' => 'Budi Santoso',
                'email_maba' => 'budi.santoso@gmail.com',
                'no_wa' => '081900112233',
                'asal_sekolah' => 'SMAN 2 Bekasi',
                'r' => 78, 'i' => 85, 'a' => 50, 's' => 45, 'e' => 60, 'c' => 72,
                'prodi1' => 'Rekayasa Perangkat Lunak',
                'prodi2' => 'Teknologi Informasi',
                'prodi3' => 'Sistem Informasi',
                'summary' => 'Skor dominan pada ranah Teknikal dan Riset Analitik (Investigative-Realistic) sesuai dengan disiplin ilmu rekayasa komputasi dan pengembangan perangkat lunak.',
                'days_ago' => 0,
            ],
        ];

        foreach ($candidates as $c) {
            $m1 = Major::where('major_name', 'like', '%' . $c['prodi1'] . '%')->first() ?? $majors->first();
            $m2 = Major::where('major_name', 'like', '%' . $c['prodi2'] . '%')->first() ?? $majors->skip(1)->first();
            $m3 = Major::where('major_name', 'like', '%' . $c['prodi3'] . '%')->first() ?? $majors->skip(2)->first();

            AssessmentResult::updateOrCreate(
                ['email_maba' => $c['email_maba']],
                [
                    'nama_maba' => $c['nama_maba'],
                    'no_wa' => $c['no_wa'],
                    'asal_sekolah' => $c['asal_sekolah'],
                    'score_r' => $c['r'],
                    'score_i' => $c['i'],
                    'score_a' => $c['a'],
                    'score_s' => $c['s'],
                    'score_e' => $c['e'],
                    'score_c' => $c['c'],
                    'top_1_major_id' => $m1->id,
                    'top_2_major_id' => $m2->id,
                    'top_3_major_id' => $m3->id,
                    'ai_explanation' => $c['summary'],
                    'completed_at' => now()->subDays($c['days_ago']),
                ]
            );
        }
    }
}
