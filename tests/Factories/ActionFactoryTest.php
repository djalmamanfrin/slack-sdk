<?php


namespace Tests\Factories;


use InvalidArgumentException;
use Slack\Entities\Action;
use Slack\Factories\ActionFactory;

class ActionFactoryTest extends \PHPUnit\Framework\TestCase
{
    private $message = "Field %s can not be empty. Please fill the %s field to create a Field Instance";

    public function testMethodsExists()
    {
        $this->assertEquals( true, method_exists(ActionFactory::class, 'createFromArray'));
        $this->assertEquals( true, method_exists(ActionFactory::class, 'toArray'));
    }

    public function testReturnCreateFromArrayMethod()
    {
        $payload = FactoryHelper::getActions();
        $action = ActionFactory::createFromArray($payload[0]);
        $this->assertInstanceOf(Action::class, $action);
    }

    public function testReturnToArrayMethod()
    {
        $actions = [];
        $payloads = FactoryHelper::getActions();
        foreach ($payloads as $payload) {
            $action = ActionFactory::createFromArray($payload);
            array_push($actions, $action);
        }
        $toArray = ActionFactory::toArray($actions);
        $assertion = is_array($toArray) && !empty($toArray);
        $this->assertTrue($assertion);
    }

    public function testExceptingExceptionForActionClassTextField()
    {
        $field = "text";
        $payload = FactoryHelper::getActions();
        unset($payload[0][$field]);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage(sprintf($this->message, $field, $field));
        ActionFactory::createFromArray($payload[0]);
    }

    public function testExceptingExceptionForActionClassNameField()
    {
        $field = "name";
        $payload = FactoryHelper::getActions();
        unset($payload[0][$field]);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage(sprintf($this->message, $field, $field));
        ActionFactory::createFromArray($payload[0]);
    }

    public function testNotRequiredConfirmationFields()
    {
        $payload = FactoryHelper::getActions();
        $action = new Action();
        $action->setText($payload[0]['text']);
        $action->setName($payload[0]['name']);
        $action->setType($payload[0]['type']);

        $toArray = ActionFactory::toArray([$action]);
        $assertion = is_array($toArray) && !empty($toArray);
        $this->assertTrue($assertion);
    }
}