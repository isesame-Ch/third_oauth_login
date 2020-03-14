<?php
/**
 * Created by PhpStorm.
 * User: 79834
 * Date: 2020/3/11
 * Time: 0:15
 */
namespace Isesame\ThirdOauthLogin\Tests;

use Isesame\ThirdOauthLogin\Exceptions\InvalidArgumentException;
use Isesame\ThirdOauthLogin\ThirdOauth;
use PHPUnit\Framework\TestCase;

class ThirdOauthTest extends TestCase
{
    /**
     * @throws InvalidArgumentException
     */
    public function testInvalidType() {
        // 断言会抛出此异常类
        $this->expectException(InvalidArgumentException::class);

        $oauthService = new ThirdOauth('mock-key');
        // 断言异常消息为 'Invalid type value(base/all): foo'
        $this->expectExceptionMessage(sprintf('Invalid type value(%s):',implode('/',$oauthService->thirdApplicationType)) . 'mock-key');

        $this->fail('Failed to assert third oauth throw exception with invalid argument.');
    }

    /**
     * @throws InvalidArgumentException
     */
    public function testInvalidOptions()
    {
        // 断言会抛出此异常类
        $this->expectException(InvalidArgumentException::class);

        $oauthService = new ThirdOauth('mock-key');

        // 断言异常消息为 'Invalid type value(base/all): foo'
        $this->expectExceptionMessage('Invalid options : please set oauthUrl, appId, appKey');

        $mockOptions = [];
        $oauthService->setOptions($mockOptions);

        $this->fail('Failed to assert third oauth throw exception with invalid argument.');
    }
}