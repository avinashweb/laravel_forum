<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = new Category([
            'user_id'       => 1,
        	'category_name'	=>	'PHP',
        	'category_slug'	=>	'php'
        ]);
        $cat->save();
        $cat = new Category([
            'user_id'       => 1,
        	'category_name'	=>	'JAVA',
        	'category_slug'	=>	'java'
        ]);
        $cat->save();
        $cat = new Category([
            'user_id'       => 1,
        	'category_name'	=>	'Python',
        	'category_slug'	=>	'python'
        ]);
        $cat->save();
        $cat = new Category([
            'user_id'       => 1,
        	'category_name'	=>	'Rubby & Rails',
        	'category_slug'	=>	'rubby-rails'
        ]);
        $cat->save();
        $cat = new Category([
            'user_id'       => 1,
        	'category_name'	=>	'JavaScript & JQuery',
        	'category_slug'	=>	'javascript-jquery'
        ]);
        $cat->save();
    }
}
