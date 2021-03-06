<?php

namespace Tests\Components\Jobs;

use App\Jobs\BanUser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BanUserTest extends JobTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_can_ban_a_user()
    {
        $user = $this->createUser(['banned_at' => null]);

        $bannedUser = $this->dispatch(new BanUser($user));

        $this->assertTrue($bannedUser->isBanned());
    }
}
