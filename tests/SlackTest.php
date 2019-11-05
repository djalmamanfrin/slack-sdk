<?php

namespace Tests;

use Slack\Factories\MessageFactory;
use Slack\Slack;

class SlackTest extends \PHPUnit\Framework\TestCase
{
    /** @var Slack $slack */
    private $slack;

    public function setUp(): void
    {
        parent::setUp();
        $url = 'https://hooks.slack.com/services/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';
        $this->slack = new Slack($url);
    }

    public function testInstantiation()
    {
        $this->assertInstanceOf(Slack::class, $this->slack);
    }

    public function testSendOnlyATextMessage()
    {
        $payload = SlackHerlper::getOnlyATextMessage();
        $message = MessageFactory::createFromArray($payload);
        $result = $this->slack->send($message);
        self::assertTrue($result);
    }

    public function testSendMessageWithSimpleAttachment()
    {
        $payload = SlackHerlper::getMessageWithSimpleAttachment();
        $message = MessageFactory::createFromArray($payload);
        $result = $this->slack->send($message);
        self::assertTrue($result);
    }

    public function testSendMessageWithFullAttachment()
    {
        $payload = SlackHerlper::getMessageWithFullAttachment();
        $message = MessageFactory::createFromArray($payload);
        $result = $this->slack->send($message);
        self::assertTrue($result);
    }

    public function testSendMessageWithTwoSimpleAttachment()
    {
        $payload = SlackHerlper::getMessageWithTwoSimpleAttachment();
        $message = MessageFactory::createFromArray($payload);
        $result = $this->slack->send($message);
        self::assertTrue($result);
    }

    public function testSendMessageWithAttachmentAndAction()
    {
        $payload = SlackHerlper::getMessageWithAttachmentAndAction();
        $message = MessageFactory::createFromArray($payload);
        $result = $this->slack->send($message);
        self::assertTrue($result);
    }

    public function testMessageWithAttachmentAndActionConfirm()
    {
        $payload = SlackHerlper::getMessageWithAttachmentAndActionConfirm();
        $message = MessageFactory::createFromArray($payload);
        $result = $this->slack->send($message);
        self::assertTrue($result);
    }

    public function testMessageWithAttachmentAttachmentAndTwoActions()
    {
        $payload = SlackHerlper::getMessageWithAttachmentAndTwoActions();
        $message = MessageFactory::createFromArray($payload);
        $result = $this->slack->send($message);
        self::assertTrue($result);
    }

    public function testMessageWithAttachmentAttachmentAndField()
    {
        $payload = SlackHerlper::getMessageWithAttachmentAndField();
        $message = MessageFactory::createFromArray($payload);
        $result = $this->slack->send($message);
        self::assertTrue($result);
    }

    public function testMessageWithAttachmentAttachmentAndTwoFields()
    {
        $payload = SlackHerlper::getMessageWithAttachmentAndTwoFields();
        $message = MessageFactory::createFromArray($payload);
        $result = $this->slack->send($message);
        self::assertTrue($result);
    }
}