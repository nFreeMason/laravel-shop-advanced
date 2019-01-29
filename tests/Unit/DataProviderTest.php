<?php
/**
 * 数据提供器 @dataProvider
 */
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DataProviderTest extends TestCase
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
     * @dataProvider additionProvider
	 */
    public function testAdd($a,$b,$expected)
	{
		$this->assertSame($expected,$a + $b);
	}

	public function additionProvider()
	{
		return [
			'adding zeros' => [0, 0, 0], // 0 + 0 = 0 pass
			'zero plus one' => [0, 1, 1], // 0 + 1 = 1 pass
			'one plus zero' => [1, 0, 1], // 1 + 0 = 1 pass
			'one plus one' => [1, 1, 2], // 1 + 1 = 2 pass
		];
	}

	/**
	 * @dataProvider addData
	 */
	public function testData($a)
	{
		$this->assertSame(100,$a);
	}

	public function addData()
	{
		return [
			[100],
		];
	}
}
