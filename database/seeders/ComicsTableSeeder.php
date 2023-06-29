<?php

namespace Database\Seeders;

use App\Models\Comic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = config("comics");

        foreach ($comics as $comic) {
            Comic::create([
                'title' => $comic['title'],
                'description' => $comic['description'],
                'series' => $comic['series'],
                'thumb' => $comic['thumb'],
                'price' => $comic['price'],
                'type' => $comic['type'],
                'sale_date' => $comic['sale_date'],
                'artists' => serialize($comic['artists']),
                'writers' => serialize($comic['writers']),
            ]);
        }
    }
}
