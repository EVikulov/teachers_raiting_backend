<?php

namespace App\Tests;

use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class DisciplinesTest extends TestCase
{
    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = User::find(1);
    }

    public function testCreate()
    {
        $data = $this->getJsonFixture('create_disciplines.json');

        $response = $this->actingAs($this->user)->json('post', '/disciplines', $data);

        $response->assertStatus(Response::HTTP_OK);

        $expect = array_except($data, ['id', 'updated_at', 'created_at', 'teacher_id', 'group_id']);
        $actual = array_except($response->json(), ['id', 'updated_at', 'created_at', 'teacher_id', 'group_id']);

        $this->assertEquals($expect, $actual);
    }

    public function testCreateNoAuth()
    {
        $data = $this->getJsonFixture('create_disciplines.json');

        $response = $this->json('post', '/disciplines', $data);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testUpdate()
    {
        $data = $this->getJsonFixture('update_disciplines.json');

        $response = $this->actingAs($this->user)->json('put', '/disciplines/1', $data);

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    public function testUpdateNotExists()
    {
        $data = $this->getJsonFixture('update_disciplines.json');

        $response = $this->actingAs($this->user)->json('put', '/disciplines/0', $data);

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    public function testUpdateNoAuth()
    {
        $data = $this->getJsonFixture('update_disciplines.json');

        $response = $this->json('put', '/disciplines/1', $data);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testDelete()
    {
        $response = $this->actingAs($this->user)->json('delete', '/disciplines/1');

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    public function testDeleteNotExists()
    {
        $response = $this->actingAs($this->user)->json('delete', '/disciplines/0');

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    public function testDeleteNoAuth()
    {
        $response = $this->json('delete', '/disciplines/1');

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testGet()
    {
        $response = $this->actingAs($this->user)->json('get', '/disciplines/1');

        $response->assertStatus(Response::HTTP_OK);

        $this->assertEqualsFixture('get_disciplines.json', $response->json());
    }

    public function testGetNotExists()
    {
        $response = $this->actingAs($this->user)->json('get', '/disciplines/0');

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    public function getSearchFilters()
    {
        return [
            [
                'filter' => ['all' => 1],
                'result' => 'search_all.json'
            ],
            [
                'filter' => ['page' => 1],
                'result' => 'search_by_page.json'
            ],
            [
                'filter' => ['per_page' => 1],
                'result' => 'search_per_page.json'
            ],
        ];
    }

    /**
     * @dataProvider getSearchFilters
     *
     * @param array $filter
     * @param string $fixture
     */
    public function testSearch($filter, $fixture)
    {
        $response = $this->json('get', '/disciplines', $filter);

        $response->assertStatus(Response::HTTP_OK);

        $this->assertEqualsFixture($fixture, $response->json());
    }
}
