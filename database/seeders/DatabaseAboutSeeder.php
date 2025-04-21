<?php

namespace Database\Seeders;

use App\Models\Backend\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::Create([
            'image' => 'uploads/about/about.jpg',
            'description' => 'In Situ Hotel Garut Syariah adalah pilihan akomodasi terbaik di Garut yang menawarkan kenyamanan, ketenangan, dan suasana islami yang khas. Dengan konsep syariah, hotel ini menghadirkan pengalaman menginap yang sesuai dengan nilai-nilai keislaman, memberikan layanan berkualitas bagi keluarga, wisatawan, dan pelancong bisnis yang mencari suasana yang bersih, nyaman, dan penuh keberkahan.
                                Terletak di lokasi strategis di Garut, hotel ini mudah diakses dari berbagai destinasi wisata terkenal seperti Pemandian Air Panas Cipanas, Kampung Sampireun, dan Kawah Kamojang. Setiap kamar di In Situ Hotel Garut Syariah didesain dengan nuansa modern dan elegan, serta dilengkapi dengan fasilitas lengkap seperti Wi-Fi gratis, televisi, AC, kamar mandi pribadi, dan layanan kamar 24 jam.
                                Sebagai hotel syariah, kami menerapkan prinsip-prinsip halal, termasuk menyediakan makanan halal, kebijakan non-alcohol, serta fasilitas ibadah seperti mushola dan arah kiblat di setiap kamar. Kami berkomitmen untuk memberikan pelayanan terbaik dengan standar tinggi, sehingga tamu dapat menikmati pengalaman menginap yang tenang dan penuh kenyamanan.
                                Nikmati pengalaman menginap yang lebih berkesan di In Situ Hotel Garut Syariah – tempat ideal bagi Anda yang mencari ketenangan dengan sentuhan islami di kota Garut.',
        ]);
    }
}
