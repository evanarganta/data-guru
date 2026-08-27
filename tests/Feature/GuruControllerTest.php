<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GuruControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_redirects_to_the_teacher_directory(): void
    {
        $this->get('/')
            ->assertRedirectToRoute('guru.index');
    }
}
