<?php

namespace Tests\Unit;

use App\Rules\ValidArticleStatus;
use Tests\TestCase;

class ValidArticleStatusRuleTest extends TestCase
{
    protected $rule;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rule = new ValidArticleStatus();
    }

    public function test_articlestatus_exists()
    {
        $this->assertTrue($this->rule->passes('status_id', 1));
    }

    public function test_articlestatus_not_exists()
    {
        $this->assertFalse($this->rule->passes('status_id', 1111));
    }
}
