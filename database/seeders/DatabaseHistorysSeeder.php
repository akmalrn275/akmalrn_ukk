<?php

namespace Database\Seeders;

use App\Models\Backend\History;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseHistorysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        History::Create([
            'title' => 'Kelahiran Perusahaan',
            'description' => '<p>Jauh di sana, di balik pegunungan kata, jauh dari negeri Vokalia dan Konsonantia, hiduplah teks-teks buta. Terpisah mereka hidup di Bookmarksgrove tepat di pesisir Semantik, samudra bahasa yang besar.</p>',
            'created_at' => Carbon::create(2021, 1, 1, 0, 0, 0),
            'updated_at' => now(),
        ]);

        History::Create([
            'title' => 'Ledakan Penuh Perusahaan',
            'description' => '<p>Jauh di sana, di balik pegunungan kata, jauh dari negeri Vokalia dan Konsonantia, hiduplah teks-teks buta. Terpisah mereka hidup di Bookmarksgrove tepat di pesisir Semantik, samudra bahasa yang besar.</p>',
            'created_at' => Carbon::create(2023, 1, 1, 0, 0, 0),
            'updated_at' => now(),
        ]);

        History::Create([
            'title' => 'Lebih Banyak Cabang di Seluruh Dunia',
            'description' => '<p>Jauh di sana, di balik pegunungan kata, jauh dari negeri Vokalia dan Konsonantia, hiduplah teks-teks buta. Terpisah mereka hidup di Bookmarksgrove tepat di pesisir Semantik, samudra bahasa yang besar.</p><p>Sebuah sungai kecil bernama Duden mengalir di dekat tempat tinggal mereka dan menyediakan berbagai hal yang diperlukan. Itu adalah negeri yang indah, di mana kalimat-kalimat yang dipanggang akan langsung masuk ke mulut Anda.</p>',
            'created_at' => Carbon::create(2025, 1, 1, 0, 0, 0),
            'updated_at' => now(),
        ]);
    }
}
