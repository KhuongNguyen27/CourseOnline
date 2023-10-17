<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Category;

class CategoryTest extends TestCase
{
    use WithFaker; // Tao du lieu gia
    // use RefeshDatabase; //
    /**
     * A basic feature test example.
     */
    public function test_route_category()
    {
        $this->get('/categories')->assertStatus(200);
        $this->get('/categories/create')->assertStatus(200);
        $this->get('/categories/1')->assertStatus(200);
        $this->get('/categories/1/edit')->assertStatus(200);
    }
    public function test_create_category_by_factory()
    {
        $category = Category::factory(Category::class)->create();
        $this->assertNotNull($category);
    }
    
    public function test_update_category_by_faker()
    {
        $category = Category::where('id','>',0)->orderBy('id', 'desc')->first();//lay ket qua cuoi cung
        $category->name = $this->faker->word;
        $category->image_url = $this->faker->imageUrl(640,480);
        $this->assertTrue($category->save());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }

    //kiem tra chuc nang xoa item
    public function test_delete_category()
    {
        $category = Category::where('id','>',0)->orderBy('id', 'desc')->first();//lay ket qua cuoi cung
        $this->assertTrue($category->delete());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }
}