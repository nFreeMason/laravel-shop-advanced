<?php
/**
 * 测试 PHP 错误
 */
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExpectedErrorTest extends TestCase
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

//    /**
//     * 通过提前添加期望，来使测试正常进行，而不会报出 PHP 错误
//	 * @expectedException \PHPUnit\Framework\Error\Error
//	 */
//	public function testFailingInclude()
//	{
////		include 'not_existing_file.php';
//	}
}
