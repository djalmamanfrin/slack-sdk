<?php


namespace Tests\Enums;


use InvalidArgumentException;
use Slack\Enums\IconTypeEnum;

class IconTypeEnumTest  extends \PHPUnit\Framework\TestCase
{
    public function testMethodsExists()
    {
        $this->assertEquals( true, method_exists(IconTypeEnum::class, 'all'));
        $this->assertEquals( true, method_exists(IconTypeEnum::class, 'validate'));
    }

    public function testTheReturnOfMethodAllIsArray()
    {
        $icons = IconTypeEnum::all();
        $this->assertIsArray($icons);
    }

    public function testHasKeyInAllMethod()
    {
        $icons = IconTypeEnum::all();
        $this->assertArrayHasKey('ICON_URL', $icons);
        $this->assertArrayHasKey('ICON_EMOJI', $icons);
    }

    public function testInvalidArgument()
    {
        $type = 'abcde';
        $message = "The icon type field is not found in IconTypeEnum class. So, the icon type informed (%s) is not allowed";
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage(sprintf($message, $type));
        IconTypeEnum::validate('abcde');
    }

    public function testCaseSensitiveArgument()
    {
        try {
            IconTypeEnum::validate('icon_url');
            IconTypeEnum::validate('ICON_URL');
            $isValid = true;
        } catch (InvalidArgumentException $e) {
            $this->fail($e->getMessage());
            $isValid = false;
        }
        $this->assertTrue($isValid);
    }
}
