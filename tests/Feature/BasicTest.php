<?php

namespace Tests\Feature;

use App\Requests\UserRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $userInfo = (new UserRequest())
            ->parameters(['username' => 'devversity'])
            ->request();

        //$userInfo = null; // If we uncomment this it fails

        $this->assertIsObject($userInfo, 'Asserting if userInfo is an object');
    }
}
