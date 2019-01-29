<?php
/**
 * 测试输出
 */
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OutputTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

	public function testExpectFooActualFoo()
	{
		$this->expectOutputString('foo');
		print 'foo';
	}

	public function testExpectBarActualBaz()
	{
		$this->expectOutputString('bar');
		print 'bar';
	}
}
