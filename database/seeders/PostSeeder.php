<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::create([
            'category_id' => 1, // Teknologi
            'title' => 'Laravel 11 Memperkenalkan Fitur Reverb untuk WebSocket yang Lebih Efisien',
            'slug' => Str::slug('Laravel 11 Memperkenalkan Fitur Reverb'),
            'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=1200&auto=format&fit=crop',
            'content' => 'Laravel kembali membuat gebrakan dengan merilis fitur Reverb yang memudahkan developer membangun aplikasi real-time dengan performa tinggi.'
        ]);

        Post::create([
            'category_id' => 2, // Olahraga
            'title' => 'Timnas Indonesia Raih Kemenangan Spektakuler di Laga Kualifikasi Utama',
            'slug' => Str::slug('Timnas Indonesia Raih Kemenangan Spektakuler'),
            'image' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=1200&auto=format&fit=crop', // Gambar bola di stadion yang sangat stabil
            'content' => 'Dalam pertandingan yang sangat menegangkan, Timnas Indonesia berhasil menumbangkan lawannya dengan skor tipis, membawa harapan besar.'
        ]);

        Post::create([
            'category_id' => 3, // Politik
            'title' => 'Pilkada Serentak: Dinamika Politik Mulai Memanas di Berbagai Daerah',
            'slug' => Str::slug('Pilkada Serentak Dinamika Politik Mulai Memanas'),
            'image' => 'https://images.unsplash.com/photo-1540910419892-4a36d2c3266c?q=80&w=1200&auto=format&fit=crop',
            'content' => 'Berbagai partai politik mulai menyusun strategi dan mengusung calon-calon terbaiknya untuk memenangkan kontestasi politik.'
        ]);

        Post::create([
            'category_id' => 4, // Edukasi
            'title' => 'Pemerintah Dorong Literasi Digital Lewat Program Kurikulum Merdeka',
            'slug' => Str::slug('Pemerintah Dorong Literasi Digital'),
            'image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1200&auto=format&fit=crop',
            'content' => 'Kementerian Pendidikan meluncurkan berbagai inisiatif untuk memastikan guru dan siswa memiliki kemampuan literasi digital yang memadai.'
        ]);
    }
}