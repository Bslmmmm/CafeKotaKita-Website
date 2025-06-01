<?php

namespace Database\Seeders;

use App\Models\Kafe;
use App\Models\Fasilitas;
use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class KafeSeeder extends Seeder
{
    public function run(): void
    {
        // Dapatkan semua genre dan fasilitas yang sudah ada
        $genres = Genre::all()->keyBy('nama');
        $fasilitas = Fasilitas::all()->keyBy('nama');

        // Data kafe
        $kafes = [
            [
                'id' => Str::uuid(),
                'owner_id' => null,
                'nama' => 'Perasa Coffe Jember',
                'alamat' => 'Jl. Sumatra No.128, Tegal Boto Lor, Kabupaten, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121',
                'telp' => '085366567799',
                'latitude' => '-8.1697631',
                'longitude' => '113.6283861',
                'jam_buka' => '00:00',
                'jam_tutup' => '23:59',
                'genres' => ['Tradisional', 'Retro'],
                'fasilitas' => ['Wi-Fi', 'Stop Kontak', 'Toilet', 'Cashless', 'Cash']
            ],
            [
                'id' => Str::uuid(),
                'owner_id' => null,
                'nama' => 'Cuscuss Cafe Jember',
                'alamat' => 'Jl. Semeru, Tegal Boto Kidul, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur',
                'telp' => '082231308837',
                'latitude' => '-8.1766265',
                'longitude' => '113.6436995',
                'jam_buka' => '10:00',
                'jam_tutup' => '03:00',
                'genres' => ['Modern', 'Co-Working Space'],
                'fasilitas' => ['Wi-Fi', 'AC', 'Stop Kontak', 'Toilet', 'Cashless']
            ],
            // ... (tambahkan data kafe lainnya dengan format yang sama)
            [
                'id' => Str::uuid(),
                'owner_id' => null,
                'nama' => 'Omah Kopi',
                'alamat' => 'Jl. Rasamala No.62, Baratan, Kec. Patrang, Kabupaten Jember, Jawa Timur 68112',
                'telp' => '085315863734',
                'latitude' => '-8.1346764',
                'longitude' => '113.6500488',
                'jam_buka' => '17:00',
                'jam_tutup' => '00:00',
                'genres' => ['Retro', 'Outdoor', 'Tradisional', 'Coffee Specialty'],
                'fasilitas' => ['Wi-Fi', 'Meja Outdoor', 'Stop Kontak', 'Toilet', 'Cashless', 'Cash']
            ]
        ];

        foreach ($kafes as $kafeData) {
            // Simpan data utama kafe
            $kafe = Kafe::create([
                'id' => $kafeData['id'],
                'owner_id' => $kafeData['owner_id'],
                'nama' => $kafeData['nama'],
                'alamat' => $kafeData['alamat'],
                'telp' => $kafeData['telp'],
                'latitude' => $kafeData['latitude'],
                'longitude' => $kafeData['longitude'],
                'jam_buka' => $kafeData['jam_buka'],
                'jam_tutup' => $kafeData['jam_tutup'],
            ]);

            // Tambahkan relasi genre jika ada
            if (isset($kafeData['genres'])) {
                $genreIds = [];
                foreach ($kafeData['genres'] as $genreName) {
                    if (isset($genres[$genreName])) {
                        $genreIds[] = $genres[$genreName]->id;
                    }
                }

                // Simpan ke tabel pivot genre_kafe
                foreach ($genreIds as $genreId) {
                    DB::table('genre_kafe')->insert([
                        'id' => Str::uuid(),
                        'kafe_id' => $kafe->id,
                        'genre_id' => $genreId
                    ]);
                }
            }

            // Tambahkan relasi fasilitas jika ada
            if (isset($kafeData['fasilitas'])) {
                $fasilitasIds = [];
                foreach ($kafeData['fasilitas'] as $fasilitasName) {
                    if (isset($fasilitas[$fasilitasName])) {
                        $fasilitasIds[] = $fasilitas[$fasilitasName]->id;
                    }
                }

                // Simpan ke tabel pivot fasilitas_kafe
                foreach ($fasilitasIds as $fasilitasId) {
                    DB::table('fasilitas_kafe')->insert([
                        'id' => Str::uuid(),
                        'kafe_id' => $kafe->id,
                        'fasilitas_id' => $fasilitasId
                    ]);
                }
            }
        }
    }
}