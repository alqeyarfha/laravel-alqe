<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// import packge
use DB;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('posts')->delete();
     $post = [
        ['title'=> 'Belajar Laravel', 'content'=>'lorem Ipsum'],
        ['title'=> 'Tips Belajar laravel', 'content'=>'Lorem ipsum'],
        ['title'=>'Jadwal Latihan Workout Bulanan', 'content'=>'lorem Ipsum']
     ];

     DB::table('posts')->insert($post);
    }
}
