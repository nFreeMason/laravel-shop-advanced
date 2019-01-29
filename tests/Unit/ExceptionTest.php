<?php

/**
 * 测试异常
 */

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExceptionTest extends TestCase
{
    /**
     * @expectedException, @expectedExceptionCode, @expectedExceptionMessage, @expectedExceptionMessageRegExp
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * 测试异常方式一
	 */
    public function testException()
	{
		$this->expectException(\Exception::class);
		throw new \Exception('test');
	}

	/**
	 * 测试异常方法二
	 * @throws \Exception
	 * @test
	 * @expectedException \Exception
	 */
	public function exceptionExpect()
	{
		throw new \Exception('test');
	}
}
