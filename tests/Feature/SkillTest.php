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
        DB::table('skills')->insert([
            'name' => 'Java',
            'image' => 'Java.png'
        ]);

        $user = factory(User::class)->create();
        factory(Profile::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);

        $this->assertTrue(Auth::check());

        $this->from(route('home'))
            ->post(route('skill.store'), [
                'skill_id' => 1
            ])
            ->assertRedirect(route('home'));
        $this->assertDatabaseHas('skill_user', [
            'skill_id' => 1,
            'user_id' => $user->id,
        ]);
    }
}
