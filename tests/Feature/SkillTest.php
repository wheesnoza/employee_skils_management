<?php

namespace Tests\Feature;

use App\Profile;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class SkillTest extends TestCase
{
    /** テストの際にDBをリセット */
    use RefreshDatabase;

    /**
     * スキルを正常に登録できる
     *
     * @test
     */
    public function user_can_add_skill_to_profile()
    {
        /** スキル */
        DB::table('skills')->insert([
            'name' => 'Java',
            'image' => 'Java.png'
        ]);

        /** ユーザ */
        $user = factory(User::class)->create();
        factory(Profile::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);
        $this->assertTrue(Auth::check());

        $this->from(route('home'))
            ->post(route('skill.store'), [
                'skill' => 1
            ])
            ->assertRedirect(route('home'));
        $this->assertDatabaseHas('skill_user', [
            'skill_id' => 1,
            'user_id' => $user->id,
        ]);
    }

    /**
     * スキルを正常に削除できる
     *
     * @test
     */
    public function user_can_delete_skill()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
        /** スキル */
        DB::table('skills')->insert([
            'name' => 'Java',
            'image' => 'Java.png'
        ]);

        /** ユーザ */
        $user = factory(User::class)->create();
        factory(Profile::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);
        $this->assertTrue(Auth::check());

        /** ユーザスキル */
        $skill = DB::table('skill_user')->insert([
            'skill_id' => 1,
            'user_id' => $user->id,
        ]);

        $this->delete(route('skill.destroy', $skill))
            ->assertRedirect(route('home'));
        $this->assertDatabaseMissing('skill_user', [
            'skill_id' => 1,
            'user_id' => $user->id,
        ]);
    }
}
