<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Helpers
use Illuminate\Support\Str;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Type::truncate();
        });

        $allTypes = [
            'HTML',
            'CSS',
            'JavaScript',
            'Vue',
            'SQL',
            'PHP',
            'Laravel'
        ];

        foreach ($allTypes as $singleType) {

            $title = $singleType['title'];
            $slug = Str::slug($singleType['title']);

            $type = Type::create([
                'title' => $title,
                'slug'=> $slug
            ]);
        }
    }
}
