<?php

namespace App\Tests;

use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class QuestionnaireTest extends TestCase
{
    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = User::find(1);
    }

    public function testCreate()
    {
        $data = $this->getJsonFixture('create_questionnaire.json');

        $response = $this->actingAs($this->user)->json('post', '/questionnaires', $data);

        $response->assertStatus(Response::HTTP_OK);

        $expect = array_except($data, ['id', 'updated_at', 'created_at']);
        $actual = array_except($response->json(), ['id', 'updated_at', 'created_at']);

        $this->assertEquals($expect, $actual);
    }

    public function testCreateNoAuth()
    {
        $data = $this->getJsonFixture('create_questionnaire.json');

        $response = $this->json('post', '/questionnaires', $data);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testUpdate()
    {
        $data = $this->getJsonFixture('update_questionnaire.json');

        $response = $this->actingAs($this->user)->json('put', '/questionnaires/1', $data);

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    public function testUpdateNotExists()
    {
        $data = $this->getJsonFixture('update_questionnaire.json');

        $response = $this->actingAs($this->user)->json('put', '/questionnaires/0', $data);

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    public function testUpdateNoAuth()
    {
        $data = $this->getJsonFixture('update_questionnaire.json');

        $response = $this->json('put', '/questionnaires/1', $data);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testDelete()
    {
        $response = $this->actingAs($this->user)->json('delete', '/questionnaires/1');

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    public function testDeleteNotExists()
    {
        $response = $this->actingAs($this->user)->json('delete', '/questionnaires/0');

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    public function testDeleteNoAuth()
    {
        $response = $this->json('delete', '/questionnaires/1');

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testGet()
    {
        $response = $this->actingAs($this->user)->json('get', '/questionnaires/1');

        $response->assertStatus(Response::HTTP_OK);

        // TODO: Need to remove after first successful start
        $this->exportJson('get_questionnaire.json', $response->json());

        $this->assertEqualsFixture('get_questionnaire.json', $response->json());
    }

    public function testGetNotExists()
    {
        $response = $this->actingAs($this->user)->json('get', '/questionnaires/0');

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
        $response = $this->json('get', '/questionnaires', $filter);

        // TODO: Need to remove after first successful start
        $this->exportJson($fixture, $response->json());

        $response->assertStatus(Response::HTTP_OK);

        $this->assertEqualsFixture($fixture, $response->json());
    }
}
