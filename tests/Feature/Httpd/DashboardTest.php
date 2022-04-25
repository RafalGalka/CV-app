<?php

namespace Tests\Feature\Httpd;

use App\Model\User;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    public function testRedirectNotLoggedUserToLoginPage()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    public function testDashboardShowing()
    {
        $user = factory(User::class)->create();

        $response = $this
            ->actingAs($user)
            ->get('/');

        $response->assertStatus(200);
    }

    public function testDashboardShowingWithExtraData()
    {
        $user = factory(User::class)->create();

        $response = $this
            ->actingAs($user)
            ->withCookies(['best-game' => 'Duke Nukem 3D'])
            ->withSession(['publisher' => '3D Realms'])
            ->get('/');

        $response->assertStatus(200);
    }
}
