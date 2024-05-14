<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faqs = [
            [
                'ask' => 'Apa itu WhatsApp Blast ?',
                'question' => '<ul>
                                <li>Pesan yang dikirimkan secara massal ke banyak nomor sekaligus, dimana melalui fitur ini sistem hanya perlu membuat satu pesan lalu secara otomatis dapat dikirim ke banyak nomor secara cepat dan mudah.</li>
                                <li>Selain Whatsapp Blast kami juga menyediakan layanan OTP (One time Password), yaitu pengiriman informasi dalam bentuk password atau pin, dan Notification, yaitu pengiriman informasi berisi pemberitahuan.</li>
                               </ul>',
                'is_active' => 1,
                'sequence' => 1,
                'created_by' => 1, // Adjust this value as needed
                'updated_by' => 1, // Adjust this value as needed
            ],
            [
                'ask' => 'Mengapa Anda harus menggunakan WhatsApp ?',
                'question' => '<ul>
                                <li>Hampir seluruh masyarakat Indonesia menggunakan WhatsApp sebagai aplikasi perpesanan utama mereka, bahkan data menunjukkan bahwa pengguna aplikasi WhatsApp mencapai 92% (data Januari 2023) dari populasi pengguna internet di Indonesia. Dengan banyaknya pengguna WhatsApp di Indonesia, WhatsApp Blast bisa sangat membantu dan sangat efektif dalam menyalurkan informasi kepada pelanggan anda.</li>
                               </ul>',
                'is_active' => 1,
                'sequence' => 2,
                'created_by' => 1, // Adjust this value as needed
                'updated_by' => 1, // Adjust this value as needed
            ],
            [
                'ask' => 'Apa keuntungan menggunakan WhatsApp Blast ?',
                'question' => '<ul>
                                <li>Anda dapat mengirim banyak pesan sekaligus secara terjadwal untuk kebutuhan apa pun dengan sangat mudah dan cepat.</li>
                                <li>Mempublikasikan produk anda dengan jangkauan yang luas.</li>
                               </ul>',
                'is_active' => 1,
                'sequence' => 3,
                'created_by' => 1, // Adjust this value as needed
                'updated_by' => 1, // Adjust this value as needed
            ],
            [
                'ask' => 'Bagaimana cara menggunakan WhatsApp Blast ?',
                'question' => '<ul>
                                <li>Layanan Whatsapp Blast yang kami tawarkan adalah Manage Service yang mana kami memberikan pelayanan terbaik tanpa anda perlu repot untuk melihat serta Monitoring Dashboard dan Upload Contact dengan bantuan Customer Service kami yang selalu Update dalam mengirimkan Report Blasting.</li>
                               </ul>',
                'is_active' => 1,
                'sequence' => 4,
                'created_by' => 1, // Adjust this value as needed
                'updated_by' => 1, // Adjust this value as needed
            ],
            [
                'ask' => 'Apa saja yang dibutuhkan untuk menggunakan layanan WhatsApp Blast ?',
                'question' => '<ul>
                                <li>Hanya dengan menyiapkan isi konten (dapat berupa gambar + teks, video + teks atau hanya teks) dan memiliki kumpulan kontak nomor tujuan, kamu siap untuk memulai pengalaman WhatsApp Blast yang cepat dan praktis!</li>
                               </ul>',
                'is_active' => 1,
                'sequence' => 5,
                'created_by' => 1, // Adjust this value as needed
                'updated_by' => 1, // Adjust this value as needed
            ],
            [
                'ask' => 'Kapan saya bisa mendaftar untuk layanan ini ?',
                'question' => '<ul>
                                <li>Layanan kami siap melayani setiap saat dan di mana pun kamu inginkan. Kebebasan mendaftar kapan saja memberikan kamu kendali penuh atas pesan-pesan yang akan kamu kirimkan.</li>
                               </ul>',
                'is_active' => 1,
                'sequence' => 6,
                'created_by' => 1, // Adjust this value as needed
                'updated_by' => 1, // Adjust this value as needed
            ],
            [
                'ask' => 'Berapa lama proses pelaksanaan WhatsApp Blast ?',
                'question' => '<ul>
                                <li>Waktu pelaksanaan broadcast bervariasi. Untuk rincian lebih lanjut, silakan hubungi admin kami untuk mendapatkan estimasi waktu yang pas dan sesuai dengan kebutuhan kamu.</li>
                               </ul>',
                'is_active' => 1,
                'sequence' => 7,
                'created_by' => 1, // Adjust this value as needed
                'updated_by' => 1, // Adjust this value as needed
            ],
            [
                'ask' => 'Bagaimana cara mendaftar layanan WhatsApp Blast ?',
                'question' => '<ul>
                                <li>Mendaftar sangat mudah! Silakan hubungi admin kami untuk panduan langkah demi langkah yang jelas. Setelah itu, kamu hanya perlu mengisi formulir, melakukan pembayaran, dan proses blasting akan segera dimulai.</li>
                               </ul>',
                'is_active' => 1,
                'sequence' => 8,
                'created_by' => 1, // Adjust this value as needed
                'updated_by' => 1, // Adjust this value as needed
            ]
        ];

        foreach ($faqs as $faq) {
            DB::table('faqs')->insert($faq);
        }
    }
}
