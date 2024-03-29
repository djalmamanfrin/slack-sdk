# Slack SDK for PHP

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/djalmamanfrin/slack-sdk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/djalmamanfrin/slack-sdk/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/djalmamanfrin/slack-sdk/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/djalmamanfrin/slack-sdk/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/djalmamanfrin/slack-sdk/badges/build.png?b=master)](https://scrutinizer-ci.com/g/djalmamanfrin/slack-sdk/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/djalmamanfrin/slack-sdk/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![license](https://img.shields.io/github/license/mashape/apistatus.svg?style=flat-square)](https://github.com/djalmamanfrin/slack-sdk/blob/master/LICENSE)

A simple PHP package for sending messages to [Slack](https://slack.com) with [incoming webhooks](https://my.slack.com/services/new/incoming-webhook), focussed on ease-of-use and elegant syntax.

## Requirements
* PHP 7.2 or above

## Installation
You can install the package using the [Composer](https://getcomposer.org/) package manager. You can install it by running this command in your project root:
```sh
composer require manfrin/slack
```

## First of all
* You need [create or config an incoming webhook](https://slack.com/intl/pt-br/help/articles/115005265063-incoming-webhooks-for-slack#configurar-webhooks-de-entrada) on your slack account.
* See how the tests was create. It's very friendly and easy to understand how to use the Slack SDK

## How to use?
* Rename the file .env.example to .env
* Set your weebhook in .env file.
* Exec the first test called **testSendOnlyATextMessage** to know if your webhook was config correctly

### Talk is cheap, show me code
```php
// Instantiate the client
$url = getenv('SLACK_END_POINT');
$this->slack = new Slack($url);

// Create you payload, See payload examples in the file FactoryHelper.php
$payload = SlackHerlper::getMessageWithAttachmentAndActionConfirm();
$message = MessageFactory::createFromArray($payload);
$result = $this->slack->send($message);
```
### Messages Structures
The messages structures can be understood in the folder src/Entities. The structure was converted in entities. So, we have:
* Message
* Attachment
* Field
* Action
* Action Confirm

Look the [fields of each message structure](https://api.slack.com/docs/interactive-message-field-guide) for more details.