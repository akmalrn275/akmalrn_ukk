<?php

namespace Database\Seeders;

use App\Models\Backend\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseBlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::Create([
            'image' => 'uploads/blogs/blog1.jpg',
            'category_id' => '1',
            'title' => 'In Situ Hotel Syariah Garut: Penginapan Nyaman dengan Nuansa Islami',
            'Overview' => 'Garut dikenal sebagai salah satu destinasi wisata unggulan di Jawa Barat dengan pesona alam yang menawan.',
            'description' => '<h2>Menikmati Liburan di In Situ Hotel Syariah Garut</h2><p>Garut dikenal sebagai salah satu destinasi wisata unggulan di Jawa Barat dengan pesona alam yang menawan. Bagi Anda yang mencari akomodasi nyaman dan bernuansa Islami, In Situ Hotel Syariah Garut bisa menjadi pilihan yang tepat. Hotel ini menawarkan suasana yang tenang dengan pelayanan yang mengedepankan prinsip syariah.</p><br><h2>Lokasi Strategis dan Akses Mudah</h2><p>In Situ Hotel Syariah terletak di lokasi yang strategis, dekat dengan berbagai destinasi wisata populer di Garut seperti Kawah Darajat, Situ Bagendit, dan Pemandian Air Panas Cipanas. Dengan akses yang mudah, pengunjung dapat menjelajahi keindahan Garut tanpa harus menempuh perjalanan jauh.</p>',
            'meta_keywords' => 'In Situ Hotel Syariah Garut, hotel syariah Garut, penginapan Islami Garut, hotel murah di Garut, hotel nyaman di Garut, wisata halal Garut, akomodasi syariah Garut, hotel Islami Jawa Barat, tempat menginap di Garut, hotel dengan mushola Garut, wisata religi Garut, makanan halal Garut, hotel terbaik di Garut, hotel strategis Garut, liburan ke Garut, hotel keluarga Garut, penginapan murah Garut, hotel ramah muslim Garut, hotel syariah terbaik, tempat wisata Garut',
            'meta_descriptions' => 'In Situ Hotel Syariah Garut, hotel syariah Garut, penginapan Islami Garut, hotel murah di Garut, hotel nyaman di Garut, wisata halal Garut, akomodasi syariah Garut, hotel Islami Jawa Barat, tempat menginap di Garut, hotel dengan mushola Garut, wisata religi Garut, makanan halal Garut, hotel terbaik di Garut, hotel strategis Garut, liburan ke Garut, hotel keluarga Garut, penginapan murah Garut, hotel ramah muslim Garut, hotel syariah terbaik, tempat wisata Garut',
        ]);

        Blog::Create([
            'image' => 'uploads/blogs/blog2.jpg',
            'category_id' => '2',
            'title' => 'In Situ Hotel Syariah Garut: Penginapan Nyaman dengan Nuansa Pegunungan',
            'Overview' => 'Garut dikenal sebagai salah satu destinasi wisata unggulan di Jawa Barat dengan pesona alam yang menawan.',
            'description' => '<h2>Menikmati Liburan di In Situ Hotel Syariah Garut</h2><p>Garut dikenal sebagai salah satu destinasi wisata unggulan di Jawa Barat dengan pesona alam yang menawan. Bagi Anda yang mencari akomodasi nyaman dan bernuansa Islami, In Situ Hotel Syariah Garut bisa menjadi pilihan yang tepat. Hotel ini menawarkan suasana yang tenang dengan pelayanan yang mengedepankan prinsip syariah.</p><br><h2>Lokasi Strategis dan Akses Mudah</h2><p>In Situ Hotel Syariah terletak di lokasi yang strategis, dekat dengan berbagai destinasi wisata populer di Garut seperti Kawah Darajat, Situ Bagendit, dan Pemandian Air Panas Cipanas. Dengan akses yang mudah, pengunjung dapat menjelajahi keindahan Garut tanpa harus menempuh perjalanan jauh.</p>',
            'meta_keywords' => 'In Situ Hotel Syariah Garut, hotel syariah Garut, penginapan Islami Garut, hotel murah di Garut, hotel nyaman di Garut, wisata halal Garut, akomodasi syariah Garut, hotel Islami Jawa Barat, tempat menginap di Garut, hotel dengan mushola Garut, wisata religi Garut, makanan halal Garut, hotel terbaik di Garut, hotel strategis Garut, liburan ke Garut, hotel keluarga Garut, penginapan murah Garut, hotel ramah muslim Garut, hotel syariah terbaik, tempat wisata Garut',
            'meta_descriptions' => 'In Situ Hotel Syariah Garut, hotel syariah Garut, penginapan Islami Garut, hotel murah di Garut, hotel nyaman di Garut, wisata halal Garut, akomodasi syariah Garut, hotel Islami Jawa Barat, tempat menginap di Garut, hotel dengan mushola Garut, wisata religi Garut, makanan halal Garut, hotel terbaik di Garut, hotel strategis Garut, liburan ke Garut, hotel keluarga Garut, penginapan murah Garut, hotel ramah muslim Garut, hotel syariah terbaik, tempat wisata Garut',
        ]);
    }
}
