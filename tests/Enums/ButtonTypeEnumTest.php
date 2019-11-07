<?php


namespace Tests\Enums;


use InvalidArgumentException;
use Slack\Enums\ButtonTypeEnum;

class ButtonTypeEnumTest  extends \PHPUnit\Framework\TestCase
{
    public function testMethodsExists()
    {
        $this->assertEquals( true, method_exists(ButtonTypeEnum::class, 'all'));
        $this->assertEquals( true, method_exists(ButtonTypeEnum::class, 'validate'));
    }

    public function testTheReturnOfMethodAllIsArray()
    {
        $types = ButtonTypeEnum::all();
        $this->assertIsArray($types);
    }

    public function testHasKeyInAllMethod()
    {
        $types = ButtonTypeEnum::all();
        $this->assertArrayHasKey('BUTTON', $types);
        $this->assertArrayHasKey('SELECT', $types);
    }

    public function testInvalidArgument()
    {
        $type = 'abcde';
        $message = "The type field is not found in IconTypeEnum class. So, the type informed (%s) is not allowed";
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage(sprintf($message, $type));
        ButtonTypeEnum::validate('abcde');
    }

    public function testCaseSensitiveArgument()
    {
        try {
            ButtonTypeEnum::validate('button');
            ButtonTypeEnum::validate('BUTTON');
            $isValid = true;
        } catch (InvalidArgumentException $e) {
            $this->fail($e->getMessage());
            $isValid = false;
        }
        $this->assertTrue($isValid);
    }
}
