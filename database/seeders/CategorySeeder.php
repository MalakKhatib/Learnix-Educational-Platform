<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [

            [
                'name' => 'البرمجة',
                'icon' => 'fa-code',
            ],

            [
                'name' => 'الرياضيات',
                'icon' => 'fa-calculator',
            ],

            [
                'name' => 'الشبكات',
                'icon' => 'fa-network-wired',
            ],

            [
                'name' => 'قواعد البيانات',
                'icon' => 'fa-database',
            ],

            [
                'name' => 'الذكاء الاصطناعي',
                'icon' => 'fa-robot',
            ],

            [
                'name' => 'تصميم',
                'icon' => 'fa-palette',
            ],
             [
                'name' => 'خوارزميات',
                'icon' => 'fa-diagram-project',
            ],

        ];


       foreach ($categories as $category) {

    Category::firstOrCreate(
        ['name' => $category['name']],
        ['icon' => $category['icon']]
    );

}
    }
}
