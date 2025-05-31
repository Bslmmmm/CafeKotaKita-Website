<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fasilitas = [
            [
                'id' => Str::uuid(),
                'nama' => 'Wi-Fi',
                'deskripsi' => 'Koneksi internet nirkabel berkecepatan tinggi',
                'image' => null
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'AC',
                'deskripsi' => 'Pendingin ruangan untuk kenyamanan pengunjung',
                'image' => null
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'Stop Kontak',
                'deskripsi' => 'Tersedia colokan listrik di setiap meja',
                'image' => null
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'Toilet',
                'deskripsi' => 'Toilet bersih dengan fasilitas lengkap',
                'image' => null
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'Parkir Luas',
                'deskripsi' => 'Area parkir yang luas dan aman',
                'image' => null
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'Ruang Merokok',
                'deskripsi' => 'Area khusus untuk merokok',
                'image' => null
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'Live Music',
                'deskripsi' => 'Hiburan musik langsung di akhir pekan',
                'image' => null
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'Meja Outdoor',
                'deskripsi' => 'Area duduk di luar ruangan',
                'image' => null
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'Area Kerja',
                'deskripsi' => 'Meja khusus untuk bekerja dengan colokan listrik',
                'image' => null
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'Musholla',
                'deskripsi' => 'Tempat shalat yang nyaman',
                'image' => null
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'Boardgame',
                'deskripsi' => 'Fasilitas permainan boardgame untuk pengunjung',
                'image' => null
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'Cashless',
                'deskripsi' => 'Menerima pembayaran non-tunai seperti kartu atau aplikasi',
                'image' => null
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'Cash',
                'deskripsi' => 'Menerima pembayaran tunai secara langsung',
                'image' => null
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'Meeting',
                'deskripsi' => 'Ruang atau fasilitas untuk pertemuan dan meeting',
                'image' => null
            ]
        ];

        // Using insert method
        DB::table('fasilitas')->insert($fasilitas);

        // Alternatively, if you have a Fasilitas model:
        // \App\Models\Fasilitas::insert($fasilitas);
    }
}
