<?php

namespace Tests\Enums;

use InvalidArgumentException;
use Slack\Enums\ButtonStyleEnum;

class ButtonStyleEnumTest  extends \PHPUnit\Framework\TestCase
{
    public function testMethodsExists()
    {
        $this->assertEquals( true, method_exists(ButtonStyleEnum::class, 'all'));
        $this->assertEquals( true, method_exists(ButtonStyleEnum::class, 'validate'));
    }

    public function testTheReturnOfMethodAllIsArray()
    {
        $styles = ButtonStyleEnum::all();
        $this->assertIsArray($styles);
    }

    public function testHasKeyInAllMethod()
    {
        $styles = ButtonStyleEnum::all();
        $this->assertArrayHasKey('DEFAULT', $styles);
        $this->assertArrayHasKey('PRIMARY', $styles);
        $this->assertArrayHasKey('DANGER', $styles);
    }

    public function testInvalidArgument()
    {
        $type = 'abcde';
        $message = "The style field is not found in IconTypeEnum class. So, the style informed (%s) is not allowed";
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage(sprintf($message, $type));
        ButtonStyleEnum::validate('abcde');
    }

    public function testCaseSensitiveArgument()
    {
        try {
            ButtonStyleEnum::validate('danger');
            ButtonStyleEnum::validate('DANGER');
            $isValid = true;
        } catch (InvalidArgumentException $e) {
            $this->fail($e->getMessage());
            $isValid = false;
        }
        $this->assertTrue($isValid);
    }
}
