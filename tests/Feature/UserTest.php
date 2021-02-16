<?php

namespace Tests\Feature;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {

   $faker= Factory::create();

   for ($i=0;$i<100;$i++){

       User::create([
           'name' => $faker->name,
           'email' => $faker->email,
           'password' => $faker->password,

       ]);
   }


        $response = $this->get('/');
//        $this->actingAs(factory(User::class));
        dd(User::find(1));


        $response->assertStatus(200);
    }
}
