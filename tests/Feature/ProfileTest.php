<?php

namespace Tests\Feature;

use App\Profile;
use App\User;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    /**
     * 新規登録していないユーザはプロフィール登録はできない
     *
     * @test
     */
    public function unauthenticated_user_cannot_view_new_profile_page()
    {
        $this->get('profile')
            ->assertRedirect('login');
    }

    /**
     * 新規登録していないユーザはプロフィール登録はできない
     *
     * @test
     */
    public function already_has_user_profile_cannot_view_new_profile_page()
    {
        $user = factory(User::class)->create();
        factory(Profile::class)->create();

        $this->get('profile')
            ->assertRedirect('/');
    }
}
