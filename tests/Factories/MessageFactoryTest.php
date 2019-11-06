<?php


namespace Tests\Factories;


use InvalidArgumentException;
use Slack\Entities\Message;
use Slack\Factories\MessageFactory;

class MessageFactoryTest extends \PHPUnit\Framework\TestCase
{
    private $message = "Field %s can not be empty. Please set the %s field";

    public function testMethodsExists()
    {
        $this->assertEquals( true, method_exists(MessageFactory::class, 'createFromArray'));
        $this->assertEquals( true, method_exists(MessageFactory::class, 'toArray'));
    }

    public function testReturnCreateFromArrayMethod()
    {
        $payload = FactoryHelper::getMessage();
        $message = MessageFactory::createFromArray($payload);
        $this->assertInstanceOf(Message::class, $message);
    }

    public function testReturnToArrayMethod()
    {
        $payload = FactoryHelper::getMessage();
        $message = MessageFactory::createFromArray($payload);
        $toArray = MessageFactory::toArray($message);
        $assertion = is_array($toArray) && !empty($toArray);
        $this->assertTrue($assertion);
    }

    public function testExceptingExceptionForActionClassTextField()
    {
        $field = "text";
        $payload = FactoryHelper::getMessage();
        unset($payload[$field]);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage(sprintf($this->message, $field, $field));
        MessageFactory::createFromArray($payload);
    }

    public function testNotRequiredConfirmationFields()
    {
        $payload = FactoryHelper::getMessage();
        $message = MessageFactory::createFromArray($payload);
        $toArray = MessageFactory::toArray($message);
        $assertion = is_array($toArray) && !empty($toArray);
        $this->assertTrue($assertion);
    }
}
