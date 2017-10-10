# slack-notify

A very simple class for sending slack notificacions

## Instalation 

`composer require iribarren/slack-notify`

## Usage

Create a new SlackNotifier object
Set the slack webhook URL
Set your message and format
Send it!

~~~php
$notifier = new SlackNotifier();
$notifier->setSlackWebHookUrl("YOUR_SLACK_WEBHOOK_URL");
$notifier->setText("I think you all should take a rest");
$notifier->setUserName("Boss");
$notifier->setChannel("#dev-team");
$notifier->notify()
~~~
