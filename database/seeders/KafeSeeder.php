<?php

namespace Database\Seeders;

use App\Models\Kafe;
use App\Models\Fasilitas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //fasilitas start
        $wifi = Fasilitas::firstOrCreate(
            ['nama' => 'Wi-Fi'],
            [
                'id' => Str::uuid(),
                'deskripsi' => 'Akses internet gratis',
                'image' => null,
            ]
        );

        $ac = Fasilitas::firstOrCreate(
            ['nama' => 'AC'],
            [
                'id' => Str::uuid(),
                'deskripsi' => 'Pendingin ruangan untuk kenyamanan pengunjung',
                'image' => null,
            ]
        );

        $areakerja = Fasilitas::firstOrCreate(
            ['nama' => 'Area Kerja'],
            [
                'id' => Str::uuid(),
                'deskripsi' => 'Meja khusus untuk bekerja dengan colokan listrik',
                'image' => null,
            ]
        );

        $livemusic = Fasilitas::firstOrCreate(
            ['nama' => 'Live Music'],
            [
                'id' => Str::uuid(),
                'deskripsi' => 'Hiburan musik langsung di akhir pekan',
                'image' => null,
            ]
        );

        $mejaoutdoor = Fasilitas::firstOrCreate(
            ['nama' => 'Meja Outdoor'],
            [
                'id' => Str::uuid(),
                'deskripsi' => 'Area duduk di luar ruangan',
                'image' => null,
            ]
        );

        $stopkontak = Fasilitas::firstOrCreate(
            ['nama' => 'Stop Kontak'],
            [
                'id' => Str::uuid(),
                'deskripsi' => 'Tersedia colokan listrik di setiap meja',
                'image' => null,
            ]
        );

        $musholla = Fasilitas::firstOrCreate(
            ['nama' => 'Musala'],
            [
                'id' => Str::uuid(),
                'deskripsi' => 'Tempat shalat yang nyaman',
                'image' => null,
            ]
        );

        $ruangmerokok = Fasilitas::firstOrCreate(
            ['nama' => 'Ruang Merokok'],
            [
                'id' => Str::uuid(),
                'deskripsi' => 'Area khusus untuk merokok',
                'image' => null,
            ]
        );

        $parkirluas = Fasilitas::firstOrCreate(
            ['nama' => 'Parkir Luas'],
            [
                'id' => Str::uuid(),
                'deskripsi' => 'Area parkir yang luas dan aman',
                'image' => null,
            ]
        );

        $toilet = Fasilitas::firstOrCreate(
            ['nama' => 'Toilet'],
            [
                'id' => Str::uuid(),
                'deskripsi' => 'Toilet bersih dengan fasilitas lengkap',
                'image' => null,
            ]
        );

        $boardgame = Fasilitas::firstOrCreate(
            ['nama' => 'Boardgame'],
            [
                'id' => Str::uuid(),
                'deskripsi' => 'Fasilitas permainan boardgame untuk pengunjung',
                'image' => null,
            ]
        );

        $cashless = Fasilitas::firstOrCreate(
            ['nama' => 'Cashless'],
            [
                'id' => Str::uuid(),
                'deskripsi' => 'Menerima pembayaran non-tunai seperti kartu atau aplikasi',
                'image' => null
            ]
        );

        $cash = Fasilitas::firstOrCreate(
            ['nama' => 'Cash'],
            [
                'id' => Str::uuid(),
                'deskripsi' => 'Menerima pembayaran tunai secara langsung',
                'image' => null
            ]
        );

        $meeting = Fasilitas::firstOrCreate(
            ['nama' => 'Meeting'],
            [
                'id' => Str::uuid(),
                'deskripsi' => 'Ruang atau fasilitas untuk pertemuan dan meeting',
                'image' => null
            ]
        );
        //fasilitas end

        //genre start
        $genres = [
            'Tradisional'      => 'd007a5fd-11fc-45f8-8f1f-e2c827301cb6',
            'Retro'            => '58b459d8-701a-4614-8395-346e65cd7552',
            'Co-Working Space' => 'af022268-e4fc-43a9-a3b0-44731a9b5227',
            'Modern'           => '4990e08f-02b9-48e1-b6bc-66e65838a9b1',
            'Pet-Friendly'     => 'a11e17c2-2e35-4396-858b-eb9498b7d9a8',
            'View-Oriented'    => '871eee6c-07db-453f-8f3c-c9d5d8c3a647',
            'Keluarga'         => 'abe97ac3-8a22-4f9a-ac9b-3a2fc6ac5e9d',
            'Coffee Specialty' => '2897bfe1-11de-4af8-9bd8-d5cfb5b112a3',
            'Rooftop'          => '7467fb17-e322-4e06-bcbd-b4e5507af08d',
            'Nature'           => '8725d300-1b0c-4e6a-81cc-d1eb167c1a1b',
            'Industrial'       => 'fce48d48-05fa-4b73-83dc-b1777be9be6f',
            'Jepang'           => '927298d9-afb5-4355-8296-471289741eb6',
            'Tea House'        => 'a00985eb-83c3-49fd-b45d-903e34a5d76e',
            'Outdoor'          => 'c7f04faf-b035-46d2-ba85-27fcbd8b5483',
        ];
        //genre end


        $kafe1 = Kafe::create([
            'id' => Str::uuid(),
            'owner_id' => null,
            'nama' => 'Perasa Coffe Jember',
            'alamat' => 'Jl. Sumatra No.128, Tegal Boto Lor, Kabupaten, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121',
            'telp' => '085366567799',
            'latitude' => '-8.1697631',
            'longitude' => '113.6283861',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
        ]);

        $kafe2 = Kafe::create([
            'id' => Str::uuid(),
            'owner_id' => null,
            'nama' => 'Cuscuss Cafe Jember',
            'alamat' => 'Jl. Semeru, Tegal Boto Kidul, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur',
            'telp' => '082231308837',
            'latitude' => '-8.1766265',
            'longitude' => '113.6436995',
            'jam_buka' => '10:00',
            'jam_tutup' => '03:00',
        ]);

        $kafe3 = Kafe::create([
            'id' => Str::uuid(),
            'owner_id' => null,
            'nama' => 'Viking Coffe',
            'alamat' => 'Jalan semeru 47, Kloncing, Karangrejo, kec.sumbersari, kabupaten jember, jawa timur, Jawa Timur 68124',
            'telp' => '085233156241',
            'latitude' => '-8.1770277',
            'longitude' => '113.6466928',
            'jam_buka' => '08:00',
            'jam_tutup' => '02:00',
        ]);

        $kafe4 = Kafe::create([
            'id' => Str::uuid(),
            'owner_id' => null,
            'nama' => 'Poppins',
            'alamat' => 'Jl. Semeru No.235, Tegal Boto Kidul, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124',
            'telp' => '088326192667',
            'latitude' => '-8.1762306',
            'longitude' => '113.6403166',
            'jam_buka' => '10:00',
            'jam_tutup' => '03:00',
        ]);

        $kafe5 = Kafe::create([
            'id' => Str::uuid(),
            'owner_id' => null,
            'nama' => 'Kopi Boss Jember',
            'alamat' => 'Jl. Tidar Plindu, Karangrejo, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124',
            'telp' => '0895329542125',
            'latitude' => '-8.173717',
            'longitude' => '113.6489769',
            'jam_buka' => '08:00',
            'jam_tutup' => '03:00',
        ]);

        $kafe6 = Kafe::create([
            'id' => Str::uuid(),
            'owner_id' => null,
            'nama' => 'Alocasia Cafe and Eatery',
            'alamat' => 'Jl. Riau Gg. Paving, Krajan Barat, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur',
            'telp' => '085934670958',
            'latitude' => '-8.173717',
            'longitude' => '113.6489769',
            'jam_buka' => '10:00',
            'jam_tutup' => '21:30',
        ]);

        $kafe7 = Kafe::create([
            'id' => Str::uuid(),
            'owner_id' => null,
            'nama' => 'Eterno Coffee & Eatery',
            'alamat' => 'Ruko Greenland, Jl. Tidar Cluster no. 5, Kloncing, Karangrejo, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124',
            'telp' => '082142567676',
            'latitude' => '-8.1711335',
            'longitude' => '113.6468099',
            'jam_buka' => '09:00',
            'jam_tutup' => '23:00',
        ]);

        $kafe8 = Kafe::create([
            'id' => Str::uuid(),
            'owner_id' => null,
            'nama' => 'Nuansa Kopi',
            'alamat' => 'Jl. Semeru, Kloncing, Karangrejo, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124',
            'telp' => '081322001006',
            'latitude' => '-8.1765442',
            'longitude' => '113.6453766',
            'jam_buka' => '09:00',
            'jam_tutup' => '23:30',
        ]);

        $kafe9 = Kafe::create([
            'id' => Str::uuid(),
            'owner_id' => null,
            'nama' => 'Rekopi Chapter 2',
            'alamat' => 'Jl. Semeru Sebelum Pertigaan Scaba, Kloncing, Karangrejo, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121',
            'telp' => '085733096122',
            'latitude' => '-8.1770094',
            'longitude' => '113.6467911',
            'jam_buka' => '10:00',
            'jam_tutup' => '03:00',
        ]);

        $kafe10 = Kafe::create([
            'id' => Str::uuid(),
            'owner_id' => null,
            'nama' => '50:50 Cafe Jember',
            'alamat' => 'Jl. Semeru, Kloncing, Karangrejo, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124',
            'telp' => '087754751959',
            'latitude' => '-8.1767018',
            'longitude' => '113.6455774',
            'jam_buka' => '07:00',
            'jam_tutup' => '02:00',
        ]);

        $kafe11 = Kafe::create([
            'id' => Str::uuid(),
            'owner_id' => null,
            'nama' => 'Monochrome. Cafe & Eatery',
            'alamat' => 'Jl. Semeru No.27, Kloncing, Karangrejo, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124',
            'telp' => '0822344892467',
            'latitude' => '-8.1770101',
            'longitude' => '113.6456726',
            'jam_buka' => '10:00',
            'jam_tutup' => '00:00',
        ]);

        $kafe12 = Kafe::create([
            'id' => Str::uuid(),
            'owner_id' => null,
            'nama' => 'Omah Kopi',
            'alamat' => 'Jl. Rasamala No.62, Baratan, Kec. Patrang, Kabupaten Jember, Jawa Timur 68112',
            'telp' => '085315863734',
            'latitude' => '-8.1346764',
            'longitude' => '113.6500488',
            'jam_buka' => '17:00',
            'jam_tutup' => '00:00',
        ]);

        $kafe1->Genre()->attach([
            $genres['Modern'],
            $genres['Rooftop'],
            $genres['Co-Working Space'],
        ]);

        $kafe1->fasilitas()->attach([
            $wifi->id,
            $ac->id,
            $stopkontak->id,
            $toilet->id,
            $cashless->id,
            $cash->id,
            $areakerja->id,
        ]);

        // $wifi = \App\Models\Fasilitas::where('nama', 'Wi-Fi')->first();
        // if ($wifi) {
        //     $kafe1->fasilitas()->attach($wifi->id);
        // }

        // $ac = \App\Models\Fasilitas::where('nama', 'AC')->first();
        // if ($ac) {
        //     $kafe1->fasilitas()->attach($ac->id);
        // }

        // $toilet = \App\Models\Fasilitas::where('nama', 'Toilet')->first();
        // if ($toilet) {
        //     $kafe1->fasilitas()->attach($toilet->id);
        // }

        // $areakerja = \App\Models\Fasilitas::where('nama', 'Area Kerja')->first();
        // if ($areakerja) {
        //     $kafe1->fasilitas()->attach($areakerja->id);
        // }

        // $stopkontak = \App\Models\Fasilitas::where('nama', 'Stop Kontak')->first();
        // if ($stopkontak) {
        //     $kafe1->fasilitas()->attach($stopkontak->id);
        // }

        // $cash = \App\Models\Fasilitas::where('nama', 'Cash')->first();
        // if ($cash) {
        //     $kafe1->fasilitas()->attach($cash->id);
        // }

        // $cashless = \App\Models\Fasilitas::where('nama', 'Cashless')->first();
        // if ($cashless) {
        //     $kafe1->fasilitas()->attach($cashless->id);
        // }

        $kafe2->Genre()->attach([
            $genres['Modern'],
            $genres['Industrial'],
            $genres['Outdoor'],
        ]);

        $kafe2->fasilitas()->attach([
            $wifi->id,
            $ac->id,
            $mejaoutdoor->id,
            $stopkontak->id,
            $toilet->id,
            $cashless->id,
            $cash->id,
        ]);

        // $ac = \App\Models\Fasilitas::where('nama', 'AC')->first();
        // if ($ac) {
        //     $kafe2->fasilitas()->attach($ac->id);
        // }

        $kafe3->Genre()->attach([
            $genres['Outdoor'],
        ]);

        $kafe3->fasilitas()->attach([
            $wifi->id,
            $mejaoutdoor->id,
            $stopkontak->id,
            $toilet->id,
            $cashless->id,
            $cash->id,
            $musholla->id,
            $livemusic->id,
        ]);

        $kafe4->Genre()->attach([
            $genres['Outdoor'],
            $genres['Industrial'],
        ]);

        $kafe4->fasilitas()->attach([
            $wifi->id,
            $mejaoutdoor->id,
            $stopkontak->id,
            $toilet->id,
            $cashless->id,
            $cash->id,
            $livemusic->id,
        ]);

        $kafe5->Genre()->attach([
            $genres['View-Oriented'],
            $genres['Tradisional'],
            $genres['Outdoor'],
        ]);

        $kafe5->fasilitas()->attach([
            $wifi->id,
            $musholla->id,
            $mejaoutdoor->id,
            $stopkontak->id,
            $toilet->id,
            $cashless->id,
            $cash->id,
            $parkirluas->id,
            $livemusic->id,
        ]);

        $kafe6->Genre()->attach([
            $genres['Nature'],
            $genres['Co-Working Space'],
        ]);

        $kafe6->fasilitas()->attach([
            $ac->id,
            $wifi->id,
            $musholla->id,
            $mejaoutdoor->id,
            $stopkontak->id,
            $toilet->id,
            $cashless->id,
            $cash->id,
            $parkirluas->id,
            $livemusic->id,
        ]);

        $kafe7->Genre()->attach([
            $genres['Modern'],
            $genres['Co-Working Space'],
        ]);

        $kafe7->fasilitas()->attach([
            $ac->id,
            $wifi->id,
            $mejaoutdoor->id,
            $stopkontak->id,
            $toilet->id,
            $cashless->id,
            $cash->id,
            $parkirluas->id,
        ]);

        $kafe8->Genre()->attach([
            $genres['View-Oriented'],
            $genres['Nature'],
        ]);

        $kafe8->fasilitas()->attach([
            $ac->id,
            $wifi->id,
            $musholla->id,
            $mejaoutdoor->id,
            $stopkontak->id,
            $toilet->id,
            $cashless->id,
            $cash->id,
            $parkirluas->id,
        ]);

        $kafe9->Genre()->attach([
            $genres['Co-Working Space'],
        ]);

        $kafe9->fasilitas()->attach([
            $wifi->id,
            $stopkontak->id,
            $toilet->id,
            $cashless->id,
            $cash->id,
        ]);

        $kafe10->Genre()->attach([
            $genres['Tradisional'],
        ]);

        $kafe10->fasilitas()->attach([
            $wifi->id,
            $stopkontak->id,
            $toilet->id,
            $cashless->id,
            $cash->id,
            $livemusic->id,
        ]);

        $kafe11->Genre()->attach([
            $genres['Industrial'],
            $genres['Outdoor'],
        ]);

        $kafe11->fasilitas()->attach([
            $wifi->id,
            $mejaoutdoor->id,
            $stopkontak->id,
            $toilet->id,
            $cashless->id,
            $cash->id,
            $livemusic->id,
        ]);

        $kafe12->Genre()->attach([
            $genres['Retro'],
            $genres['Outdoor'],
            $genres['Tradisional'],
            $genres['Coffee Specialty'],
        ]);

        $kafe12->fasilitas()->attach([
            $wifi->id,
            $mejaoutdoor->id,
            $stopkontak->id,
            $toilet->id,
            $cashless->id,
            $cash->id,
        ]);
    }
}
