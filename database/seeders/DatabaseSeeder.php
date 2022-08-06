<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Answer;
use App\Models\Choice;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kevin',
            'role' => 'admin',
            'email' => 'kevinid07@gmail.com',
            'jabatan' => 'HRD',
            'status' => 'recruitment',
            'password' => bcrypt('12341234')
        ]);

        User::create([
            'name' => 'Kevin user',
            'role' => 'user',
            'email' => 'user@test.test',
            'jabatan' => 'HRD',
            'status' => 'recruitment',
            'password' => bcrypt('12341234')
        ]);

        User::factory(10)->create();

        Exam::create([
            'tahap' => 1,
            'gambar' => '1657603759.png',
            'title' => 'Tahap 1',
            'deskripsi' => 'lorem ipsum blabla'
        ]);

        Exam::create([
            'tahap' => 2,
            'gambar' => '1657603759.png',
            'title' => 'Tahap 2',
            'deskripsi' => 'lorem ipsum blabla'
        ]);
        
        // Answer::create([
        //     'quiz_id' => 1,
        //     'choice_id' => 2,
        //     'user_id' => 1
        // ]);

        // Answer::create([
        //     'quiz_id' => 2,
        //     'choice_id' => 10,
        //     'user_id' => 1
        // ]);

        // Answer::create([
        //     'quiz_id' => 3,
        //     'choice_id' => 12,
        //     'user_id' => 1
        // ]);

        // Answer::create([
        //     'quiz_id' => 4,
        //     'choice_id' => 20,
        //     'user_id' => 1
        // ]);

        // Answer::create([
        //     'quiz_id' => 1,
        //     'choice_id' => 4,
        //     'user_id' => 2
        // ]);

        // Answer::create([
        //     'quiz_id' => 2,
        //     'choice_id' => 6,
        //     'user_id' => 2
        // ]);

        // Answer::create([
        //     'quiz_id' => 3,
        //     'choice_id' => 14,
        //     'user_id' => 2
        // ]);
        
        // Answer::create([
        //     'quiz_id' => 4,
        //     'choice_id' => 18,
        //     'user_id' => 2
        // ]);

        Quiz::create([
            'title' => 'Nama Lengkap',
            'quiz_model' => 'lisan',
            'exam_id' => 1
        ]);

        Quiz::create([
            'title' => 'Alamat',
            'quiz_model' => 'lisan',
            'exam_id' => 1
        ]);

        Quiz::create([
            'title' => 'Domisili',
            'quiz_model' => 'lisan',
            'exam_id' => 1
        ]);

        Quiz::create([
            'title' => 'Pekerjaan',
            'quiz_model' => 'lisan',
            'exam_id' => 1
        ]);
        

        Quiz::create([
            'title' => 'contoh soal tahap 2 satu ya',
            'gambar' => '1657604930.jpg',
            'quiz_model' => 'pilihan_ganda',
            'exam_id' => 2
        ]);

        Quiz::create([
            'title' => 'contoh soal tahap 2 dua ya',
            'gambar' => '1657604930.jpg',
            'quiz_model' => 'pilihan_ganda',
            'exam_id' => 2
        ]);
    }

}
