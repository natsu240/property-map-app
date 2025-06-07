<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Property;

class PropertyApiTest extends TestCase
{
    use RefreshDatabase; // テストごとにDB初期化

    /** @test */
    public function 物件一覧APIが動くこと()
    {
        // 事前にダミーデータを投入
        Property::factory()->count(2)->create();

        // APIを叩く
        $response = $this->getJson('/api/getProperties');

        // ステータス200で、件数が2つ返る
        $response->assertStatus(200)->assertJsonCount(2);
    }

    /** @test */
    public function 存在しない物件は404になること()
    {
        $response = $this->putJson('/api/property/99999', [
            'name' => '新しい名前',
        ]);
        $response->assertStatus(404);
    }

    /** @test */
    public function 物件情報を更新できること()
    {
        $property = Property::factory()->create([
            'name' => '元の名前',
        ]);

        $response = $this->putJson('/api/property/' . $property->id, [
            'name' => '新しい名前',
        ]);

        $response->assertStatus(200)->assertJsonFragment(['name' => '新しい名前']);
    }

    /** @test */
    public function 物件を登録できること()
    {
        $response = $this->postJson('/api/createProperties', [
            'name' => '東京都庁',
            'address' => '東京都新宿区西新宿2丁目8-1',
            'latitude' => 35.68948090992168,
            'longitude' => 139.6916856787223,
        ]);

        $response->assertStatus(201)->assertJsonFragment(['name' => '東京都庁']);
        $this->assertDatabaseHas('properties', ['name' => '東京都庁']);
    }
}
