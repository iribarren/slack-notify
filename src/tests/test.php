<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$slackWebHookUrl = "";
$channel = "";
$text = "";
$iconEmoji = "";
$userName = "";

$notifier = new SlackNotify\SlackNotifier();
$notifier->setSlackWebHookUrl($slackWebHookUrl);
$notifier->setChannel($channel);
$notifier->setText($text);
$notifier->setIconEmoji($iconEmoji);
$notifier->setUserName($userName);
$notifier->notify();