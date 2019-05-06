<?php

namespace App\Tests;

use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class CriterionTest extends TestCase
{
    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = User::find(1);
    }

    public function testCreate()
    {
        $data = $this->getJsonFixture('create_criterion.json');

        $response = $this->actingAs($this->user)->json('post', '/criteria', $data);

        $response->assertStatus(Response::HTTP_OK);

        $expect = array_except($data, ['id', 'updated_at', 'created_at']);
        $actual = array_except($response->json(), ['id', 'updated_at', 'created_at']);

        $this->assertEquals($expect, $actual);
    }

    public function testCreateNoAuth()
    {
        $data = $this->getJsonFixture('create_criterion.json');

        $response = $this->json('post', '/criteria', $data);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testUpdate()
    {
        $data = $this->getJsonFixture('update_criterion.json');

        $response = $this->actingAs($this->user)->json('put', '/criteria/1', $data);

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    public function testUpdateNotExists()
    {
        $data = $this->getJsonFixture('update_criterion.json');

        $response = $this->actingAs($this->user)->json('put', '/criteria/0', $data);

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    public function testUpdateNoAuth()
    {
        $data = $this->getJsonFixture('update_criterion.json');

        $response = $this->json('put', '/criteria/1', $data);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testDelete()
    {
        $response = $this->actingAs($this->user)->json('delete', '/criteria/1');

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    public function testDeleteNotExists()
    {
        $response = $this->actingAs($this->user)->json('delete', '/criteria/0');

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    public function testDeleteNoAuth()
    {
        $response = $this->json('delete', '/criteria/1');

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testGet()
    {
        $response = $this->actingAs($this->user)->json('get', '/criteria/1');

        $response->assertStatus(Response::HTTP_OK);

        // TODO: Need to remove after first successful start
        $this->exportJson('get_criterion.json', $response->json());

        $this->assertEqualsFixture('get_criterion.json', $response->json());
    }

    public function testGetNotExists()
    {
        $response = $this->actingAs($this->user)->json('get', '/criteria/0');

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
        $response = $this->json('get', '/criteria', $filter);

        // TODO: Need to remove after first successful start
        $this->exportJson($fixture, $response->json());

        $response->assertStatus(Response::HTTP_OK);

        $this->assertEqualsFixture($fixture, $response->json());
    }
}
