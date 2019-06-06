<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

    /** テストの際にDBをリセット */
    use RefreshDatabase;

    /**
     * ログインページを正常に表示できている
     *
     * @test
     */
    public function can_view_login()
    {
        $this->get('login')
            ->assertStatus(200)
            ->assertSee('Login');
    }

    /**
     * 新規登録ページを正常に表示できている
     *
     * @test
     */
    public function can_view_register()
    {
        $this->get('register')
            ->assertStatus(200)
            ->assertSee('Register');
    }

    /**
     * ユーザは正常にログインできる
     *
     * @test
     */
    public function can_login()
    {
        factory(User::class)->create([
            'email' => 'test@test.com',
            'password' => bcrypt('test12345678'),
        ]);

        $this->post(route('login'), [
            'email' => 'test@test.com',
            'password' => 'test12345678'
        ])->assertRedirect('home');

        $this->assertTrue(Auth::check());
    }

    /**
     * ユーザは正常に登録できる
     *
     * @test
     */
    public function can_register()
    {
        $this->post(route('register'), [
            'email' => 'test@test.test',
            'password' => 'test12345678',
            'password_confirmation' => 'test12345678',
        ])->assertRedirect('home');

        $this->assertTrue(Auth::check());

        $this->assertDatabaseHas('users', [
            'email' => 'test@test.test',
        ]);
    }

    /**
     * ユーザは正常にログアウトできる
     *
     * @test
     */
    public function can_logout()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->assertTrue(Auth::check());

        $this->post(route('logout'))
            ->assertRedirect('/');

        $this->assertFalse(Auth::check());
    }

    /**
     * 新規登録
     * メールは必須
     *
     * @test
     */
    public function email_is_required_when_register()
    {
        $this->from(route('register'))
        ->post(route('register'), [
            'password' => 'test12345678',
            'password_confirmation' => 'test12345678',
        ])->assertRedirect(route('register'));

        $this->assertFalse(Auth::check());

        $this->assertEquals(0, User::count());
    }

    /**
     * 新規登録
     * パスワードは必須
     *
     * @test
     */
    public function password_is_required_when_register()
    {
        $this->from(route('register'))
            ->post(route('register'), [
                'email' => 'test@test.test',
            ])->assertRedirect(route('register'));

        $this->assertFalse(Auth::check());

        $this->assertEquals(0, User::count());
    }

}
