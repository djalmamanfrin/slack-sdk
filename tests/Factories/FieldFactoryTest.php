<?php

namespace Tests\Factories;

use InvalidArgumentException;
use Slack\Entities\Field;
use Slack\Factories\FieldFactory;

class FieldFactoryTest extends \PHPUnit\Framework\TestCase
{
    private $message = "Field %s can not be empty. Please set the %s field";

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

    public function testExceptingExceptionToTitleFieldInCreateFromArrayMethod()
    {
        $field = "title";
        $payload = FactoryHelper::getFields();
        unset($payload[0][$field]);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage(sprintf($this->message, $field, $field));
        FieldFactory::createFromArray($payload[0]);
    }

    public function testExceptingExceptionToTittleFieldInToArrayMethod()
    {
        $field = "title";
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage(sprintf($this->message, $field, $field));

        $fields = [new Field()];
        FieldFactory::toArray($fields);
    }

    public function testExceptingExceptionToValueFieldInCreateFromArrayMethod()
    {
        $field = "value";
        $payload = FactoryHelper::getFields();
        unset($payload[0][$field]);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage(sprintf($this->message, $field, $field));
        FieldFactory::createFromArray($payload[0]);
    }

    public function testExceptingExceptionToValueFieldInToArrayMethod()
    {
        $valueField = "value";
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage(sprintf($this->message, $valueField, $valueField));

        $field = new Field();
        $field->setTitle("Danger");
        $fields = [$field];
        FieldFactory::toArray($fields);
    }

    public function testExceptingExceptionToShortFieldInCreateFromArrayMethod()
    {
        $field = "short";
        $payload = FactoryHelper::getFields();
        unset($payload[0][$field]);

        $message = "Field short can be bool. Please set the short field correctly";
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage($message);
        FieldFactory::createFromArray($payload[0]);
    }

    public function testExceptingExceptionToShortFieldInToArrayMethod()
    {
        $shortField = "short";
        $message = "Field short can be bool. Please set the short field correctly";
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage($message);

        $field = new Field();
        $field->setTitle("Danger");
        $field->setValue('Medium');
        $fields = [$field];
        FieldFactory::toArray($fields);
    }
}