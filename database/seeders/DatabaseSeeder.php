<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Hero::create([
            				
            'name_brand' => 'Kilau Indonesia',
            'sosmed_whatsapp' => '6282117089385',
            'sosmed_facebook' => '/',
            'sosmed_instagram' => '/',
            // '' => 'test@example.com',
        ]);
        \App\Models\Campign::create([
            'waktu_mulai_donasi' => '2025-09-10',
            'target_waktu' => '2030-09-10',
            'image' => 'null',
            'keluhan' => 'Biaya Operasi Jantung',
            'perusahaan' => 'Kilau Indonesia',
            'target_uang' => 9000000000,
        ]);
        \App\Models\Campign::create([
            'waktu_mulai_donasi' => '2025-09-10',
            'target_waktu' => '2030-09-10',
            'image' => 'null',
            'keluhan' => 'Biaya Operasi Ginjal',
            'perusahaan' => 'Kilau Indonesia',
            'target_uang' => 9000000000,
        ]);
        \App\Models\Campign::create([
            'waktu_mulai_donasi' => '2025-09-10',
            'target_waktu' => '2030-09-10',
            'image' => 'null',
            'keluhan' => 'Biaya Operasi Lambung',
            'perusahaan' => 'Kilau Indonesia',
            'target_uang' => 9000000000,
        ]);
        \App\Models\Campign::create([
            'waktu_mulai_donasi' => '2025-09-10',
            'target_waktu' => '2030-09-10',
            'image' => 'null',
            'keluhan' => 'Biaya Operasi Usus Buntu',
            'perusahaan' => 'Kilau Indonesia',
            'target_uang' => 9000000000,
        ]);
        \App\Models\ServicesBrand::create([
            'service' => 'Services',
            'description' => 'Pelayanan Kemanusian di semua hal kebaikan',
        ]);
        \App\Models\Services::create([	
            'link_services' => '/',
            'name_services' => 'Berbagi Makan Gratis',
            'description_services' => 'Program berbagi makanan gratis yang dilaksanakan setiap hari Jumat untuk masyarakat yang membutuhkan.',
        ]);

        \App\Models\Services::create([	
            'link_services' => '/',
            'name_services' => 'Berbagi Sehat Gratis',
            'description_services' => 'Layanan pemeriksaan kesehatan dan pengobatan gratis yang diadakan setiap bulan.',
        ]);

        \App\Models\Services::create([	
            'link_services' => '/',
            'name_services' => 'Berbagi Pendidikan',
            'description_services' => 'Program dukungan pendidikan gratis yang dilaksanakan setiap hari Jumat untuk anak-anak dan pelajar.',
        ]);
        \App\Models\Berita::create([	
            'image' => null,
            'description' => 'Program dukungan pendidikan gratis yang dilaksanakan setiap hari Jumat untuk anak-anak dan pelajar.',
        ]);
        \App\Models\Berita::create([	
            'image' => null,
            'description' => 'Program dukungan pendidikan gratis yang dilaksanakan setiap hari Jumat untuk anak-anak dan pelajar.',
        ]);
        \App\Models\Berita::create([	
            'image' => null,
            'description' => 'Program dukungan pendidikan gratis yang dilaksanakan setiap hari Jumat untuk anak-anak dan pelajar.',
        ]);
        \App\Models\Berita::create([	
            'image' => null,
            'description' => 'Program dukungan pendidikan gratis yang dilaksanakan setiap hari Jumat untuk anak-anak dan pelajar.',
        ]);
        \App\Models\Inspirasi::create([	
            	
            'image_inspirasi' => null,
            'description_inspirasi' => 'Program dukungan pendidikan gratis yang dilaksanakan setiap hari Jumat untuk anak-anak dan pelajar.',
        ]);
        \App\Models\Inspirasi::create([	
            'image_inspirasi' => null,
            'description_inspirasi' => 'Program dukungan pendidikan gratis yang dilaksanakan setiap hari Jumat untuk anak-anak dan pelajar.',
        ]);
        \App\Models\Inspirasi::create([	
            'image_inspirasi' => null,
            'description_inspirasi' => 'Program dukungan pendidikan gratis yang dilaksanakan setiap hari Jumat untuk anak-anak dan pelajar.',
        ]);
        \App\Models\Inspirasi::create([	
            'image_inspirasi' => null,
            'description_inspirasi' => 'Program dukungan pendidikan gratis yang dilaksanakan setiap hari Jumat untuk anak-anak dan pelajar.',
        ]);

    }
}
