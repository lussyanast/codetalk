<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'slug' => 'competitive-programming',
                'name' => 'Competitive Programming',
            ],
            [
                'slug' => 'php',
                'name' => 'PHP',
            ],
            [
                'slug' => 'python',
                'name' => 'Python',
            ],
            [
                'slug' => 'laravel',
                'name' => 'Laravel',
            ],
            [
                'slug' => 'html',
                'name' => 'HTML',
            ],
            [
                'slug' => 'css',
                'name' => 'CSS',
            ],
            [
                'slug' => 'java',
                'name' => 'Java',
            ],
            [
                'slug' => 'javascript',
                'name' => 'Javascript',
            ],
            [
                'slug' => 'mysql',
                'name' => 'MySQL',
            ],
            [
                'slug' => 'database',
                'name' => 'Database',
            ],
            [
                'slug' => 'testing',
                'name' => 'Testing',
            ],
            [
                'slug' => 'reference',
                'name' => 'Reference',
            ],
            [
                'slug' => 'cpp',
                'name' => 'C++',
            ],
            [
                'slug' => 'sql',
                'name' => 'SQL',
            ],
            [
                'slug' => 'kotlin',
                'name' => 'Kotlin',
            ],
            [
                'slug' => 'windows',
                'name' => 'Windows',
            ],
            [
                'slug' => 'linux',
                'name' => 'Linux',
            ],
            [
                'slug' => 'macos',
                'name' => 'MacOS',
            ],
        ]);
    }
}
