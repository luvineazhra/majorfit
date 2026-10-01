<?php

namespace Database\Seeders;

use App\Models\RiasecQuestion;
use Illuminate\Database\Seeder;

class RiasecQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            // Realistic (R) - 4 Questions
            [
                'question_text' => 'Saya suka merakit alat, memperbaiki perangkat keras komputer, atau bekerja dengan mesin teknologi fisik.',
                'dimension' => 'R',
                'is_active' => true,
            ],
            [
                'question_text' => 'Saya lebih menyukai kegiatan praktek langsung di laboratorium/bengkel daripada hanya membaca teori di kelas.',
                'dimension' => 'R',
                'is_active' => true,
            ],
            [
                'question_text' => 'Saya tertarik mempelajari cara kerja sirkuit elektronik, mikrokontroler, atau perangkat Internet of Things (IoT).',
                'dimension' => 'R',
                'is_active' => true,
            ],
            [
                'question_text' => 'Saya senang melihat alur operasional perakitan barang, efisiensi kerja mesin, dan tata letak fasilitas pabrik.',
                'dimension' => 'R',
                'is_active' => true,
            ],

            // Investigative (I) - 4 Questions
            [
                'question_text' => 'Saya suka menganalisis data, memecahkan masalah logika, dan mempelajari cara kerja sistem teknologi.',
                'dimension' => 'I',
                'is_active' => true,
            ],
            [
                'question_text' => 'Saya menikmati mencari akar permasalahan dari suatu kode program atau algoritma komputasi yang error.',
                'dimension' => 'I',
                'is_active' => true,
            ],
            [
                'question_text' => 'Saya tertarik meneliti tren angka, pola statistik, dan menarik kesimpulan berdasarkan data yang objektif.',
                'dimension' => 'I',
                'is_active' => true,
            ],
            [
                'question_text' => 'Saya gemar membaca artikel ilmiah, riset kecerdasan buatan (AI), atau teknologi baru yang belum banyak diketahui.',
                'dimension' => 'I',
                'is_active' => true,
            ],

            // Artistic (A) - 4 Questions
            [
                'question_text' => 'Saya senang menuangkan ide dalam bentuk visual, ilustrasi grafis, animasi, atau desain antarmuka (UI/UX).',
                'dimension' => 'A',
                'is_active' => true,
            ],
            [
                'question_text' => 'Saya tertarik pada proses pembuatan video kreatif, penulisan skrip cerita, podcast, dan konten media penyiaran.',
                'dimension' => 'A',
                'is_active' => true,
            ],
            [
                'question_text' => 'Saya menyukai eksplorasi bahasa asing, sastra global, penerjemahan naskah, dan penulisan kreatif.',
                'dimension' => 'A',
                'is_active' => true,
            ],
            [
                'question_text' => 'Saya lebih menikmati tugas kuliah yang memberikan kebebasan berekspresi tanpa aturan kaku yang membatasi ide.',
                'dimension' => 'A',
                'is_active' => true,
            ],

            // Social (S) - 4 Questions
            [
                'question_text' => 'Saya senang mendengarkan cerita orang lain, memberikan bantuan konseling, atau membimbing teman memahami materi.',
                'dimension' => 'S',
                'is_active' => true,
            ],
            [
                'question_text' => 'Saya tertarik pada profesi pelayanan kesehatan medis yang bersentuhan langsung dengan perawatan pasien.',
                'dimension' => 'S',
                'is_active' => true,
            ],
            [
                'question_text' => 'Saya mudah bergaul dengan orang baru, senang memandu acara, dan menjaga hubungan baik antar kelompok.',
                'dimension' => 'S',
                'is_active' => true,
            ],
            [
                'question_text' => 'Saya menyukai dunia pelayanan keramahan (hospitality), menyambut tamu, dan memberikan pengalaman berkesan bagi orang lain.',
                'dimension' => 'S',
                'is_active' => true,
            ],

            // Enterprising (E) - 4 Questions
            [
                'question_text' => 'Saya bersemangat merancang ide bisnis, menjual produk, atau membangun startup digital mandiri.',
                'dimension' => 'E',
                'is_active' => true,
            ],
            [
                'question_text' => 'Saya senang mempengaruhi atau meyakinkan orang lain tentang sebuah gagasan dan mengambil peran kepemimpinan dalam tim.',
                'dimension' => 'E',
                'is_active' => true,
            ],
            [
                'question_text' => 'Saya tertarik memahami strategi periklanan digital, tren perilaku konsumen, dan kampanye media sosial berbayar.',
                'dimension' => 'E',
                'is_active' => true,
            ],
            [
                'question_text' => 'Saya berani berdebat, menganalisis kontrak kerjasama bisnis, dan menegosiasikan kesepakatan komersial.',
                'dimension' => 'E',
                'is_active' => true,
            ],

            // Conventional (C) - 4 Questions
            [
                'question_text' => 'Saya sangat rapi dalam menyusun dokumen, mencatat pemasukan/pengeluaran uang, dan menyukai keteraturan data.',
                'dimension' => 'C',
                'is_active' => true,
            ],
            [
                'question_text' => 'Saya senang bekerja dengan tabel angka, spreadsheet Excel/Google Sheets, dan memverifikasi keakuratan kalkulasi.',
                'dimension' => 'C',
                'is_active' => true,
            ],
            [
                'question_text' => 'Saya merasa nyaman mengikuti instruksi kerja, standar operasional prosedur (SOP), dan aturan yang terdefinisi jelas.',
                'dimension' => 'C',
                'is_active' => true,
            ],
            [
                'question_text' => 'Saya tertarik mempelajari regulasi hukum, pasal-pasal undang-undang, serta pengarsipan berkas legal perusahaan.',
                'dimension' => 'C',
                'is_active' => true,
            ],
        ];

        foreach ($questions as $q) {
            RiasecQuestion::updateOrCreate(
                ['question_text' => $q['question_text']],
                [
                    'dimension' => $q['dimension'],
                    'is_active' => $q['is_active'],
                ]
            );
        }
    }
}
