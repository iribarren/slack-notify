<?php

namespace SlackNotify;

class SlackNotifier {

    private $slackWebHookUrl;
    private $iconUrl;
    private $iconEmoji;
    private $userName;
    private $channel;
    private $text;
    private $attachments;

    function getSlackWebHookUrl() {
        return $this->slackWebHookUrl;
    }

    function getIconUrl() {
        return $this->iconUrl;
    }

    function getIconEmoji() {
        return $this->iconEmoji;
    }

    function getUserName() {
        return $this->userName;
    }

    function getChannel() {
        return $this->channel;
    }

    function getText() {
        return $this->text;
    }

    function getAttachments() {
        return $this->attachments;
    }

    function setSlackWebHookUrl($slackWebHookUrl) {
        $this->slackWebHookUrl = $slackWebHookUrl;
    }

    function setIconUrl($iconUrl) {
        $this->iconUrl = $iconUrl;
    }

    function setIconEmoji($iconEmoji) {
        $this->iconEmoji = $iconEmoji;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setChannel($channel) {
        $this->channel = $channel;
    }

    function setText($text) {
        $this->text = $text;
    }

    function setAttachments($attachements) {
        $this->attachments = $attachements;
    }

    function __construct($text = "",
                         $attachments = "",
                         $slackWebHookUrl = "",
                         $iconUrl = null,
                         $iconEmoji = "",
                         $userName = "",
                         $channel = "") {

        $this->slackWebHookUrl = $slackWebHookUrl;
        $this->iconUrl = $iconUrl;
        $this->iconEmoji = $iconEmoji;
        $this->userName = $userName;
        $this->channel = $channel;
        $this->text = $text;
        $this->attachments = $attachments;
    }

    function notify() {
        // Send it back through the webhook
        $data = array(
            "username" => $this->userName,
            "channel" =>  $this->channel,
            "text" => $this->text,
            "attachments" => array(
                $this->attachments,
                ),
            "mrkdwn" => true,
            "icon_emoji"=> $this->iconEmoji,
        );
        $json_string = json_encode($data);

        $slack_call = curl_init($this->slackWebHookUrl);
        curl_setopt($slack_call, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($slack_call, CURLOPT_POSTFIELDS, $json_string);
        curl_setopt($slack_call, CURLOPT_CRLF, true);
        curl_setopt($slack_call, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($slack_call, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "Content-Length: " . strlen($json_string))
        );
        $result = curl_exec($slack_call);
        curl_close($slack_call);
    }
}