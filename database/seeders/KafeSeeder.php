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

        // Data kafe lengkap
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
                'genres' => ['Modern', 'Rooftop', 'Co-Working Space'],
                'fasilitas' => ['Wi-Fi', 'AC', 'Stop Kontak', 'Toilet', 'Cashless', 'Cash', 'Area Kerja']
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
                'genres' => ['Modern', 'Industrial', 'Outdoor'],
                'fasilitas' => ['Wi-Fi', 'AC', 'Meja Outdoor', 'Stop Kontak', 'Toilet', 'Cashless', 'Cash']
            ],
            [
                'id' => Str::uuid(),
                'owner_id' => null,
                'nama' => 'Viking Coffe',
                'alamat' => 'Jalan semeru 47, Kloncing, Karangrejo, kec.sumbersari, kabupaten jember, jawa timur, Jawa Timur 68124',
                'telp' => '085233156241',
                'latitude' => '-8.1770277',
                'longitude' => '113.6466928',
                'jam_buka' => '08:00',
                'jam_tutup' => '02:00',
                'genres' => ['Outdoor'],
                'fasilitas' => ['Wi-Fi', 'Meja Outdoor', 'Stop Kontak', 'Toilet', 'Cashless', 'Cash', 'Musholla', 'Live Music']
            ],
            [
                'id' => Str::uuid(),
                'owner_id' => null,
                'nama' => 'Poppins',
                'alamat' => 'Jl. Semeru No.235, Tegal Boto Kidul, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124',
                'telp' => '088326192667',
                'latitude' => '-8.1762306',
                'longitude' => '113.6403166',
                'jam_buka' => '10:00',
                'jam_tutup' => '03:00',
                'genres' => ['Outdoor', 'Industrial'],
                'fasilitas' => ['Wi-Fi', 'Meja Outdoor', 'Stop Kontak', 'Toilet', 'Cashless', 'Cash', 'Live Music']
            ],
            [
                'id' => Str::uuid(),
                'owner_id' => null,
                'nama' => 'Kopi Boss Jember',
                'alamat' => 'Jl. Tidar Plindu, Karangrejo, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124',
                'telp' => '0895329542125',
                'latitude' => '-8.173717',
                'longitude' => '113.6489769',
                'jam_buka' => '08:00',
                'jam_tutup' => '03:00',
                'genres' => ['View-Oriented', 'Tradisional', 'Outdoor'],
                'fasilitas' => ['Wi-Fi', 'Musholla', 'Meja Outdoor', 'Stop Kontak', 'Toilet', 'Cashless', 'Cash', 'Parkir Luas', 'Live Music']
            ],
            [
                'id' => Str::uuid(),
                'owner_id' => null,
                'nama' => 'Alocasia Cafe and Eatery',
                'alamat' => 'Jl. Riau Gg. Paving, Krajan Barat, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur',
                'telp' => '085934670958',
                'latitude' => '-8.173717',
                'longitude' => '113.6489769',
                'jam_buka' => '10:00',
                'jam_tutup' => '21:30',
                'genres' => ['Nature', 'Co-Working Space'],
                'fasilitas' => ['AC', 'Wi-Fi', 'Musholla', 'Meja Outdoor', 'Stop Kontak', 'Toilet', 'Cashless', 'Cash', 'Parkir Luas', 'Live Music']
            ],
            [
                'id' => Str::uuid(),
                'owner_id' => null,
                'nama' => 'Eterno Coffee & Eatery',
                'alamat' => 'Ruko Greenland, Jl. Tidar Cluster no. 5, Kloncing, Karangrejo, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124',
                'telp' => '082142567676',
                'latitude' => '-8.1711335',
                'longitude' => '113.6468099',
                'jam_buka' => '09:00',
                'jam_tutup' => '23:00',
                'genres' => ['Modern', 'Co-Working Space'],
                'fasilitas' => ['AC', 'Wi-Fi', 'Meja Outdoor', 'Stop Kontak', 'Toilet', 'Cashless', 'Cash', 'Parkir Luas']
            ],
            [
                'id' => Str::uuid(),
                'owner_id' => null,
                'nama' => 'Nuansa Kopi',
                'alamat' => 'Jl. Semeru, Kloncing, Karangrejo, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124',
                'telp' => '081322001006',
                'latitude' => '-8.1765442',
                'longitude' => '113.6453766',
                'jam_buka' => '09:00',
                'jam_tutup' => '23:30',
                'genres' => ['View-Oriented', 'Nature'],
                'fasilitas' => ['AC', 'Wi-Fi', 'Musholla', 'Meja Outdoor', 'Stop Kontak', 'Toilet', 'Cashless', 'Cash', 'Parkir Luas']
            ],
            [
                'id' => Str::uuid(),
                'owner_id' => null,
                'nama' => 'Rekopi Chapter 2',
                'alamat' => 'Jl. Semeru Sebelum Pertigaan Scaba, Kloncing, Karangrejo, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121',
                'telp' => '085733096122',
                'latitude' => '-8.1770094',
                'longitude' => '113.6467911',
                'jam_buka' => '10:00',
                'jam_tutup' => '03:00',
                'genres' => ['Co-Working Space'],
                'fasilitas' => ['Wi-Fi', 'Stop Kontak', 'Toilet', 'Cashless', 'Cash']
            ],
            [
                'id' => Str::uuid(),
                'owner_id' => null,
                'nama' => '50:50 Cafe Jember',
                'alamat' => 'Jl. Semeru, Kloncing, Karangrejo, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124',
                'telp' => '087754751959',
                'latitude' => '-8.1767018',
                'longitude' => '113.6455774',
                'jam_buka' => '07:00',
                'jam_tutup' => '02:00',
                'genres' => ['Tradisional'],
                'fasilitas' => ['Wi-Fi', 'Stop Kontak', 'Toilet', 'Cashless', 'Cash', 'Live Music']
            ],
            [
                'id' => Str::uuid(),
                'owner_id' => null,
                'nama' => 'Monochrome. Cafe & Eatery',
                'alamat' => 'Jl. Semeru No.27, Kloncing, Karangrejo, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124',
                'telp' => '0822344892467',
                'latitude' => '-8.1770101',
                'longitude' => '113.6456726',
                'jam_buka' => '10:00',
                'jam_tutup' => '00:00',
                'genres' => ['Industrial', 'Outdoor'],
                'fasilitas' => ['Wi-Fi', 'Meja Outdoor', 'Stop Kontak', 'Toilet', 'Cashless', 'Cash', 'Live Music']
            ],
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
