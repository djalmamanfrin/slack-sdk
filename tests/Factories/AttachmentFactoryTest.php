<?php


namespace Tests\Factories;


use InvalidArgumentException;
use Slack\Entities\Attachment;
use Slack\Factories\AttachmentFactory;

class AttachmentFactoryTest extends \PHPUnit\Framework\TestCase
{
    private $message = "Field %s can not be empty. Please fill the %s field";

    public function testMethodsExists()
    {
        $this->assertEquals( true, method_exists(AttachmentFactory::class, 'createFromArray'));
        $this->assertEquals( true, method_exists(AttachmentFactory::class, 'toArray'));
    }

    public function testReturnCreateFromArrayMethod()
    {
        $payload = FactoryHelper::getAttachments();
        $attachment = AttachmentFactory::createFromArray($payload[0]);
        $this->assertInstanceOf(Attachment::class, $attachment);
    }

    public function testReturnToArrayMethod()
    {
        $attachments = [];
        $payloads = FactoryHelper::getAttachments();
        foreach ($payloads as $payload) {
            $attachment = AttachmentFactory::createFromArray($payload);
            array_push($attachments, $attachment);
        }
        $toArray = AttachmentFactory::toArray($attachments);
        $assertion = is_array($toArray) && !empty($toArray);
        $this->assertTrue($assertion);
    }

    public function testExceptingExceptionForActionClassTextField()
    {
        $field = "text";
        $payload = FactoryHelper::getAttachments();
        unset($payload[0][$field]);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage(sprintf($this->message, $field, $field));
        AttachmentFactory::createFromArray($payload[0]);
    }

    public function testNotRequiredConfirmationFields()
    {
        $payload = FactoryHelper::getAttachments();
        $attachment = AttachmentFactory::createFromArray($payload[0]);
        $toArray = AttachmentFactory::toArray([$attachment]);
        $assertion = is_array($toArray) && !empty($toArray);
        $this->assertTrue($assertion);
    }
}
