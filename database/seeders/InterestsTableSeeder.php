<?php

namespace Database\Seeders;
use App\Models\Interest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $interests = [
            'League of Legends',
            'Valorant',
            'Genshin Impact',
            'Mobile Legends',
            'Call of Duty',
        ];
        foreach ($interests as $name) {
            Interest::create(['name' => $name]);
        }
    }
}
