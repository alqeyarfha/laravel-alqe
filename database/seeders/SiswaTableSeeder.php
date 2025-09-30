<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// import packge
use DB;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $siswa = [
            ['name'=>'Andi', 'email'=>'andi@mail.com', 'class'=>'10A', 'birthdate'=>'2007-01-01', 'created_at'=>now(), 'updated_at'=>now()],
            ['name'=>'Budi', 'email'=>'budi@mail.com', 'class'=>'11B', 'birthdate'=>'2006-02-02', 'created_at'=>now(), 'updated_at'=>now()],
            ['name'=>'Cici', 'email'=>'cici@mail.com', 'class'=>'12C', 'birthdate'=>'2005-03-03', 'created_at'=>now(), 'updated_at'=>now()],
            ['name'=>'Dodi', 'email'=>'dodi@mail.com', 'class'=>'10B', 'birthdate'=>'2007-04-04', 'created_at'=>now(), 'updated_at'=>now()],
            ['name'=>'Eka', 'email'=>'eka@mail.com', 'class'=>'11A', 'birthdate'=>'2006-05-05', 'created_at'=>now(), 'updated_at'=>now()],
        ];
        DB::table('siswa')->insert($siswa);
    }
}
