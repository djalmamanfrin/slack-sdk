<?php

namespace Tests\Factories;

use InvalidArgumentException;
use Slack\Entities\ActionConfirm;
use Slack\Factories\ActionConfirmFactory;

class ActionConfirmFactoryTest extends \PHPUnit\Framework\TestCase
{
    public function testMethodsExists()
    {
        $this->assertEquals( true, method_exists(ActionConfirmFactory::class, 'createFromArray'));
        $this->assertEquals( true, method_exists(ActionConfirmFactory::class, 'toArray'));
    }

    public function testReturnCreateFromArrayMethod()
    {
        $payload = FactoryHelper::getActionConfirm();
        $actionConfirm = ActionConfirmFactory::createFromArray($payload);
        $this->assertInstanceOf(ActionConfirm::class, $actionConfirm);
    }

    public function testReturnToArrayMethod()
    {
        $payload = FactoryHelper::getActionConfirm();
        $actionConfirm = ActionConfirmFactory::createFromArray($payload);
        $toArray = ActionConfirmFactory::toArray($actionConfirm);
        $assertion = is_array($toArray) && !empty($toArray);
       $this->assertTrue($assertion);
    }

    public function testExceptionRequiredConfirmationFields()
    {
        $payload = FactoryHelper::getActionConfirm();
        unset($payload['text']);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage("Field text can not be empty. Please set the text field");
        ActionConfirmFactory::createFromArray($payload);
    }

    public function testNotRequiredConfirmationFields()
    {
        $payload = FactoryHelper::getActionConfirm();
        $actionConfirm = new ActionConfirm();
        $actionConfirm->setText($payload['text']);

        $toArray = ActionConfirmFactory::toArray($actionConfirm);
        $assertion = is_array($toArray) && !empty($toArray);
        $this->assertTrue($assertion);
    }
}