<?php

namespace Tests\Factories;

use InvalidArgumentException;
use Slack\Entities\Field;
use Slack\Factories\FieldFactory;

class FieldFactoryTest extends \PHPUnit\Framework\TestCase
{
    private $message = "Field %s can not be empty. Please fill the %s field to create a Field Instance";

    public function testMethodsExists()
    {
        $this->assertEquals( true, method_exists(FieldFactory::class, 'createFromArray'));
        $this->assertEquals( true, method_exists(FieldFactory::class, 'toArray'));
    }

    public function testReturnCreateFromArrayMethod()
    {
        $payload = FactoryHelper::getFields();
        $field = FieldFactory::createFromArray($payload[0]);
        $this->assertInstanceOf(Field::class, $field);
    }

    public function testReturnToArrayMethod()
    {
        $fields = [];
        $payloads = FactoryHelper::getFields();
        foreach ($payloads as $payload) {
            $field = FieldFactory::createFromArray($payload);
            array_push($fields, $field);
        }
        $toArray = FieldFactory::toArray($fields);
        $assertion = is_array($toArray) && !empty($toArray);
        $this->assertTrue($assertion);
    }

    public function testExceptingExceptionForFieldClassTitleField()
    {
        $field = "title";
        $payload = FactoryHelper::getFields();
        unset($payload[0][$field]);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage(sprintf($this->message, $field, $field));
        FieldFactory::createFromArray($payload[0]);
    }

    public function testExceptingExceptionForFieldClassValueField()
    {
        $field = "value";
        $payload = FactoryHelper::getFields();
        unset($payload[0][$field]);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage(sprintf($this->message, $field, $field));
        FieldFactory::createFromArray($payload[0]);
    }

    public function testExceptingExceptionForFieldClassShortField()
    {
        $field = "short";
        $payload = FactoryHelper::getFields();
        unset($payload[0][$field]);

        $message = "Field short can be boll. Please set the short field correctly";
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage($message);
        FieldFactory::createFromArray($payload[0]);
    }
}