<?php

namespace Tests\Feature;

use App\Profile;
use App\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    /**
     * 新規登録していないユーザはプロフィール登録はできない
     *
     * @test
     */
    public function unauthenticated_user_cannot_view_edit_profile_page()
    {
        $this->get('profile/edit')
            ->assertRedirect('login');
    }

    /**
     * 新規登録していないユーザはプロフィール登録はできない
     *
     * @test
     */
    public function authenticated_user_can_view_edit_profile_page()
    {
        $user = factory(User::class)->create();
        factory(Profile::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);

        $this->assertTrue(Auth::check());

        $this->get('profile/edit')
            ->assertStatus(200)
            ->assertSee('プロフィール');
    }
}
