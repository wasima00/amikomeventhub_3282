<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
public function run(): void
{
    // 1. Akun Admin Utama
    \App\Models\User::firstOrCreate(
        ['email' => 'admin@amikom.ac.id'],
        [
            'name' => 'Admin Amikom',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]
    );

    // 2. Insert Kategori Event
    $catSeminar = \App\Models\Category::firstOrCreate([
        'name' => 'Seminar IT',
        'slug' => 'seminar-it',
    ]);

    $catEntertainment = \App\Models\Category::firstOrCreate([
        'name' => 'Entertainment',
        'slug' => 'entertainment',
    ]);

    $catWorkshop = \App\Models\Category::firstOrCreate([
        'name' => 'Workshop & Competition',
        'slug' => 'workshop-competition',
    ]);

    $musik = \App\Models\Category::firstOrCreate([
        'name' => 'Musik',
        'slug' => 'musik',
    ]);

    // 3. Insert Sampel Events
    // Event 1 (Entertainment)
    \App\Models\Event::updateOrCreate(
        ['slug' => 'jazz-night-2025'],
        [
            'title' => 'Jazz Night 2025',
            'category_id' => $musik->id,
            'description' => 'Nikmati malam yang indah dengan alunan musik jazz yang merdu.',
            'date' => '2026-05-10 19:00:00',
            'location' => 'Amikom Baru',
            'price' => 150000,
            'stock' => 100,
            'poster_path' => 'assets/concert.png',
        ]
    );

    // Event 2 (Seminar IT)
    \App\Models\Event::updateOrCreate(
        ['slug' => 'hackaton-unleash-your-inner-developer'],
        [
            'title' => 'Hackaton - Unleash Your Inner Developer',
            'category_id' => $catSeminar->id,
            'description' => 'Ayo asah skill coding kamu dan ciptakan solusi inovatif untuk tantangan masa depan!',
            'date' => '2026-05-05 10:00:00',
            'location' => 'Inkubator Amikom',
            'price' => 0,
            'stock' => 100,
            'poster_path' => 'assets/hackathon.png',
        ]
    );

    // Event 3 (Seminar IT)
    \App\Models\Event::updateOrCreate(
        ['slug' => 'ai-future-tech-summit-2026'],
        [
            'title' => 'AI & FUTURE TECH SUMMIT 2026',
            'category_id' => $catSeminar->id,
            'description' => 'Jelajahi tren terkini dalam kecerdasan buatan dan teknologi masa depan bersama para ahli di bidangnya.',
            'date' => '2026-05-01 13:00:00',
            'location' => 'Cinema Unit 6',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'assets/workshop.png',
        ]
    );

    // Event 4 (Workshop)
    \App\Models\Event::firstOrCreate(
        ['title' => 'UI/UX Masterclass', 'slug' => 'ui-ux-masterclass'],
        [
            'category_id' => $catWorkshop->id,
            'description' => 'Pelajari prinsip desain UI/UX modern dan cara membuat prototype.',
            'date' => '2026-06-15 09:00:00',
            'location' => 'Lab Komputer 2',
            'price' => 35000,
            'stock' => 50,
            'poster_path' => 'posters/event-4.png',
        ]
    );

    // Event 5 (Competition)
    \App\Models\Event::firstOrCreate(
        ['title' => 'E-Sport U-Champ', 'slug' => 'e-sport-u-champ'],
        [
            'category_id' => $catWorkshop->id,
            'description' => 'Turnamen Mobile Legends antar mahasiswa',
            'date' => '2026-07-20 10:00:00',
            'location' => 'Basement Unit 5',
            'price' => 25000,
            'stock' => 32,
            'poster_path' => 'posters/event-5.png',
        ]
    );

    // Event 6 (Workshop)
    \App\Models\Event::firstOrCreate(
        ['title' => 'Web Development Bootcamp', 'slug' => 'web-development-bootcamp'],
        [
            'category_id' => $catWorkshop->id,
            'description' => 'Belajar Full-stack development dari nol menggunakan Laravel dan Livewire.',
            'date' => '2026-08-01 08:00:00',
            'location' => 'Ruang Teater',
            'price' => 75000,
            'stock' => 80,
            'poster_path' => 'posters/event-6.png',
        ]
    );
}
}