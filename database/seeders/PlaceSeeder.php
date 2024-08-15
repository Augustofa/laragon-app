<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Place;
use App\Models\User;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $author = User::firstOrCreate(['email' => 'usera@example.com']);
        Place::create([
            'author_id' => $author->id,
            'latitude' => -20.2318,
            'longitude' => -46.4458,
            'name' => 'Giant Anteaters of Serra da Canastra',
            'location' => 'São Roque de Minas, Brazil',
            'image_path' => 'ant-eaters.jpg',
            'description' => 'This breathtaking national park is one of the best places to see the weird and wonderful giant anteater in the wild.',
        ]);
    }
}
