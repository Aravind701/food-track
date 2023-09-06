<?php

namespace Database\Seeders;

use App\Models\MealType;
use Illuminate\Database\Seeder;

class MealTypeSeeder extends Seeder
{
    /**
     * @var array[]
     */
    protected $roles = [
        [
            'name' => 'breakfast',
        ],
        [
            'name' => 'lunch',
        ],
        [
            'name' => 'dinner',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roles as $role) {
            MealType::firstOrCreate(
                [
                    'name' => $role['name'],
                ]
            );
        }
    }
}
