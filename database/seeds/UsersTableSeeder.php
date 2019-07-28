<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create()->each(function($user){
            $recipe = factory(App\Recipe::class)->make();
            $user->recipes()->save($recipe);
            $reviews = factory(App\Review::class, mt_rand(2, 6))->create([
                'user_id'   => $user->id,
                'recipe_id' => $recipe->id
            ]);
        });
    }
}
