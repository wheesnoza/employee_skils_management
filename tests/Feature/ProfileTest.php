<?php

namespace Tests\Feature;

use App\Profile;
use App\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    /**
     * 新規登録していないユーザは
     * プロフィール編集ページを見ることができない
     *
     * @test
     */
    public function unauthenticated_user_cannot_view_edit_profile_page()
    {
        $this->get('profile/edit')
            ->assertRedirect('login');
    }

    /**
     * 新規登録していてかつ
     * ログインしているユーザは
     * プロフィール編集ページを見ることができる
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

    /**
     * 姓は必須
     *
     * @test
     */
    public function first_name_is_required_when_updating_profile()
    {
        $user = factory(User::class)->create();
        factory(Profile::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);

        $this->assertTrue(Auth::check());

        $this->from(route('profile.edit'))
            ->put(route('profile.update'), [
                'last_name' => 'Last name',
                'address' => 'address',
                'birth_year' => 1998,
                'birth_month' => 3,
                'birth_day' => 31,
            ])
            ->assertRedirect(route('profile.edit'))
            ->assertSessionHasErrors(['first_name']);
        $this->assertDatabaseMissing('profiles', ['last_name' => 'Last name']);
    }

    /**
     * 名は必須
     *
     * @test
     */
    public function last_name_is_required_when_updating_profile()
    {
        $user = factory(User::class)->create();
        factory(Profile::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);

        $this->assertTrue(Auth::check());

        $this->from(route('profile.edit'))
            ->put(route('profile.update'), [
                'first_name' => 'First name',
                'address' => 'address',
                'birth_year' => 1998,
                'birth_month' => 3,
                'birth_day' => 31,
            ])
            ->assertRedirect(route('profile.edit'))
            ->assertSessionHasErrors(['last_name']);
        $this->assertDatabaseMissing('profiles', ['first_name' => 'First name']);
    }

    /**
     * 住所は必須
     *
     * @test
     */
    public function address_is_required_when_updating_profile()
    {
        $user = factory(User::class)->create();
        factory(Profile::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);

        $this->assertTrue(Auth::check());

        $this->from(route('profile.edit'))
            ->put(route('profile.update'), [
                'first_name' => 'First name',
                'last_name' => 'Last name',
                'birth_year' => 1998,
                'birth_month' => 3,
                'birth_day' => 31,
            ])
            ->assertRedirect(route('profile.edit'))
            ->assertSessionHasErrors(['address']);
        $this->assertDatabaseMissing('profiles', ['first_name' => 'First name']);
    }

    /**
     * 生年月日は必須
     *
     * @test
     */
    public function birth_is_required_when_updating_profile()
    {
        $user = factory(User::class)->create();
        factory(Profile::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);

        $this->assertTrue(Auth::check());

        $this->from(route('profile.edit'))
            ->put(route('profile.update'), [
                'first_name' => 'First name',
                'last_name' => 'Last name',
            ])
            ->assertRedirect(route('profile.edit'))
            ->assertSessionHasErrors(['birth_year', 'birth_month', 'birth_day']);
        $this->assertDatabaseMissing('profiles', ['first_name' => 'First name']);
    }

    /**
     * プロフィールの編集は可能
     *
     * @test
     */
    public function user_can_update_profile()
    {
        $user = factory(User::class)->create();
        factory(Profile::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);

        $this->assertTrue(Auth::check());

        $this->from(route('profile.edit'))
            ->put(route('profile.update'), [
                'first_name' => 'First name',
                'last_name' => 'Last name',
                'address' => 'address',
                'birth_year' => 1998,
                'birth_month' => 3,
                'birth_day' => 31,
            ])
            ->assertRedirect(route('home'));

        $this->assertDatabaseHas('profiles', ['first_name' => 'First name']);
    }

}
