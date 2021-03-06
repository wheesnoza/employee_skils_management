<?php

namespace Tests\Feature;

use App\Career;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CareerTest extends TestCase
{
    /** DBリセット */
    use RefreshDatabase;

    /**
     * 経歴追加ページが正常に表示できる
     *
     * @test
     */
    public function user_can_view_new_career_page()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->assertTrue(Auth::check());

        $this->get(route('career.new'))
            ->assertStatus(200);
    }

    /**
     * 経歴追加が正常にできる
     *
     * @test
     */
    public function user_can_add_new_career()
    {
        $user = factory(User::class)->create();
        factory(Profile::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);
        $this->assertTrue(Auth::check());

        $this->post(route('career.store'), [
            'experience' => '東海大学',
            'start_year' => 2016,
            'start_month' => 4,
            'end_year' => 2020,
            'end_month' => 3,
            'details' => '楽しかった',
        ])->assertRedirect(route('home'));

        $this->equalTo(1, Career::count());
    }

    /**
     * 経歴編集ページが正常に表示できる
     *
     * @test
     */
    public function user_can_view_edit_career_page()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->assertTrue(Auth::check());
        $career = factory(Career::class)->create([
            'user_id' => $user->id,
        ]);
        $this->get(route('career.edit', $career))
            ->assertStatus(200);
    }

    /**
     * 経歴編集が正常にできる
     *
     * @test
     */
    public function user_can_update_career()
    {
        $user = factory(User::class)->create();
        factory(Profile::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);
        $this->assertTrue(Auth::check());

        $career = factory(Career::class)->create([
            'experience' => '東京大学',
            'user_id' => $user->id,
        ]);

        $this->put(route('career.update', $career), [
            'experience' => '東海大学',
            'start_year' => 2016,
            'start_month' => 4,
            'end_year' => 2020,
            'end_month' => 3,
            'details' => '楽しかった',
        ])->assertRedirect(route('home'));

        $this->assertDatabaseHas('careers', ['experience' => '東海大学']);
    }

    /**
     * 詳細内容なしでも経歴追加が正常にできる
     *
     * @test
     */
    public function details_id_optional_when_add_new_career()
    {
        $user = factory(User::class)->create();
        factory(Profile::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);
        $this->assertTrue(Auth::check());

        $this->post(route('career.store'), [
            'experience' => '東海大学',
            'start_year' => 2016,
            'start_month' => 4,
            'end_year' => 2020,
            'end_month' => 3,
        ])->assertRedirect(route('home'));

        $this->equalTo(1, Career::count());
    }

    /**
     * experienceは必須
     *
     * @test
     */
    public function experience_is_required_when_add_new_career()
    {
        $user = factory(User::class)->create();
        factory(Profile::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);
        $this->assertTrue(Auth::check());

        $this->from(route('career.new'))
        ->post(route('career.store'), [
            'start_year' => 2016,
            'start_month' => 4,
            'end_year' => 2020,
            'end_month' => 3,
        ])->assertRedirect(route('career.new'))
        ->assertSessionHasErrors(['experience']);

        $this->equalTo(0, Career::count());
    }

    /**
     * start_yearは必須
     *
     * @test
     */
    public function start_year_is_required_when_add_new_career()
    {
        $user = factory(User::class)->create();
        factory(Profile::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);
        $this->assertTrue(Auth::check());

        $this->from(route('career.new'))
            ->post(route('career.store'), [
                'experience' => '東海大学',
                'start_month' => 4,
                'end_year' => 2020,
                'end_month' => 3,
            ])->assertRedirect(route('career.new'))
            ->assertSessionHasErrors(['start_year']);

        $this->equalTo(0, Career::count());
    }

    /**
     * end_yearは必須
     *
     * @test
     */
    public function end_year_is_required_when_add_new_career()
    {
        $user = factory(User::class)->create();
        factory(Profile::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);
        $this->assertTrue(Auth::check());

        $this->from(route('career.new'))
            ->post(route('career.store'), [
                'experience' => '東海大学',
                'start_month' => 4,
                'start_year' => 2016,
                'end_month' => 3,
            ])->assertRedirect(route('career.new'))
            ->assertSessionHasErrors(['end_year']);

        $this->equalTo(0, Career::count());
    }

    /**
     * ユーザは経歴を削除することができる
     *
     * @test
     */
    public function user_can_delete_career()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
        /** ユーザー */
        $user = factory(User::class)->create();
        factory(Profile::class)->create([
            'user_id' => $user->id
        ]);
        /** キャリア */
        $career = factory(Career::class)->create();

        $this->actingAs($user);
        $this->assertTrue(Auth::check());

        $this->from(route('home'))
            ->delete(route('career.destroy', $career))
            ->assertRedirect(route('home'));

        $this->equalTo(0, Career::count());
    }
}
