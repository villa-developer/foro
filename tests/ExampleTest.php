<?php

class ExampleTest extends FeatureTestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */

    function test_basic_example()
    {
        $user = factory(\App\User::class)->create([
            'name' => 'Juan Carlos',
            'email' => 'carlos@gmail.com',
        ]);

        $this->actingAs($user, 'api')
        ->visit('api/user')
        ->see('Juan Carlos')
        ->see('carlos@gmail.com');
    }
}
