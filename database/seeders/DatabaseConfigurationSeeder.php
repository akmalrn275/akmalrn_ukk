<?php

namespace Database\Seeders;

use App\Models\Backend\Configuration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Configuration::Create([
            'logo' => 'uploads/configuration/logo in situ.png',
            'title_logo' => 'uploads/configuration/title_logo in situ.png',
            'company_name' => 'In Situ Hotel Garut Syariah',
            'title' => 'In Situ Hotel Garut Syariah',
            'email_address' => 'legendsmystic60@gmail.com',
            'phone_number' => '628835572912',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.462795358654!2d107.9069442748093!3d-7.527014473523614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68b0c9d7d161c9%3A0x908f9b96d98ae8e7!2sSMK%20Wikrama%201%20Garut!5e0!3m2!1sid!2sid!4v1710136582795!5m2!1sid!2sid',
            'footer' => '© 2025 by In Situ',
            'meta_keywords' => 'In Situ Hotel Garut, Hotel Syariah Garut, Penginapan Islami di Garut, Hotel Murah di Garut, Hotel Nyaman di Garut, Hotel Keluarga di Garut, In Situ Hotel Syariah',
            'meta_descriptions' => 'In Situ Hotel Garut Syariah adalah pilihan terbaik untuk menginap di Garut. Menyediakan fasilitas nyaman, layanan ramah, serta konsep Islami yang tenang dan bersih. Dekat dengan berbagai tempat wisata terkenal di Garut.',
            'address' => 'In Situ Hotel Garut Syariah beralamat di Gedung SMK Wikrama 1 Garut, Jalan Otto Iskandardinata Kampung Tanjung RT 003/RW 013, Pasawahan, Kecamatan Tarogong Kaler, Kabupaten Garut, Jawa Barat 44151.',
            'instagram' => 'Ya',
            'youtube' => 'Ya',
        ]);
    }
}
