<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Level;


class LevelTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     */
    public function test_route_level()
    {
        $this->get('/levels')->assertStatus(200);
        $this->get('/levels/create')->assertStatus(200);
        $this->get('/levels')->assertStatus(200);
        $this->get('levels')->assertStatus(200);
    }



    public function test_update_level_by_faker()
    {
        $level = Level::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $level->name = $this->faker->word;
        $level->level = $this->faker->randomNumber(2); // Sử dụng giá trị số nguyên ngẫu nhiên

        $this->assertTrue($level->save());
    }
    public function test_create_level()
    {
        $level = new Level();
        $level->name = $this->faker->word;
        $level->level = $this->faker->randomNumber(2); // Cung cấp giá trị cho cột 'level'

        $this->assertTrue($level->save());
    }
    //kiem tra chuc nang xoa item
    public function test_delete_level()
    {
        $level = Level::where('id', '>', 0)->orderBy('id', 'desc')->first(); //lay ket qua cuoi cung
        $this->assertTrue($level->delete()); //kiem tra ket qua tra ve co tra ve TRUE hay ko
    }
   
}
