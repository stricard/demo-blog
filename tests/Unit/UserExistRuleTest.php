<?php

namespace Tests\Unit;

use App\Rules\UserExists;
use Tests\TestCase;

class UserExistRuleTest extends TestCase
{
    protected $rule;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rule = new UserExists();
    }

    public function test_user_exists()
    {
        $this->assertTrue($this->rule->passes('user_id', 1));
    }

    public function test_user_not_exists()
    {
        $this->assertFalse($this->rule->passes('user_id', 1111));
    }
}
