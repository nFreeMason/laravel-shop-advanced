<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
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

    /**
     * @test
	 */
    public function testSomething()
	{
		$this->assertTrue(true,'this should already work.');
	}

	public function testProducerFirst()
	{
		$this->assertTrue(true);
		return 'first';
	}

	public function testProducerSecond()
	{
		$this->assertTrue(true);
		return 'second';
	}

	/**
	 * @depends testProducerFirst
	 * @depends testProducerSecond
	 */
	public function testConsumer($a,$b)
	{
		$this->assertSame('first',$a);
		$this->assertSame('second',$b);
	}
}
