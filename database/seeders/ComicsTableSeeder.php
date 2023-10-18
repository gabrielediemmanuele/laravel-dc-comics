<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Comic;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comic = new Comic();

        $comic->title = "";
        $comic->description = "";
        $comic->thumb = "";
        $comic->price = "";
        $comic->series = "";
        $comic->sale_date = "";
        $comic->type = "";
        $comic->artists = "";

        $comic->save();
    }
}