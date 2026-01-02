<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Lokasi;
use App\Models\Satuan;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::firstOrCreate(
            ['email' => 'purnomodwi174@gmail.com'],
            [
                'name' => 'Dwi Purnomo',
                'password' => bcrypt('1234'),
                'roles' => 'sekretaris'
            ]
        );

        User::firstOrCreate(
            ['email' => 'wartabolanet@gmail.com'],
            [
                'name' => 'Galang Adi Trianto',
                'password' => bcrypt('1234'),
                'roles' => 'kepalausaha'
            ]
        );

        User::firstOrCreate(
            ['email' => 'mujiyono@gmail.com'],
            [
                'name' => 'Mujiyono',
                'password' => bcrypt('1234'),
                'roles' => 'direktur'
            ]
        );

        Kategori::create([
            'nama' => 'Elektronik',
            'deskripsi' => 'Deskripsi dari kategori elektronik',
            'user_id' => 1
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Unit Usaha Perdagangan',
            'deskripsi' => 'Unit Usaha Perdagangan',
            'user_id' => 1
        ]);

        Satuan::create([
            'nama' => 'Unit',
            'deskripsi' => 'Deskripsi dari satuan unit',
            'user_id' => 1
        ]);
        // Create 50 records for each independent model
        $kategoris = Kategori::factory(50)->create();
        $lokasis = Lokasi::factory(50)->create();
        $satuans = Satuan::factory(50)->create();

        // Create 50 Barangs with random relationships
        \App\Models\Barang::factory(50)->make()->each(function ($barang) use ($kategoris, $lokasis, $satuans) {
            $barang->kategori_id = $kategoris->random()->id;
            $barang->lokasi_id = $lokasis->random()->id;
            $barang->satuan_id = $satuans->random()->id;
            $barang->save();
        });

        // Create 50 Pengadaans with random relationships
        \App\Models\Pengadaan::factory(50)->make()->each(function ($pengadaan) use ($lokasis) {
            $pengadaan->lokasi_id = $lokasis->random()->id;
            $pengadaan->save();
        });
    }
}
