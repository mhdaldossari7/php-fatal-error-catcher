<?php

namespace FatalErrCatcher;

class ErrorCatcher
{
    private $slackWebhookURL;
    public function __construct(string $slackWebhookURL = '')
    {        
        if (!empty($slackWebhookURL))
        {
            $this->slackWebhookURL = $slackWebhookURL;
        }
        register_shutdown_function([$this, 'errCatcher']);
    }

    public function errCatcher()
    {
        $error = error_get_last();
        // Fatal error, E_ERROR === 1
        if ($error['type'] === E_ERROR) {
            $errMsg = "```PHP Fatal Error : " . $error['message']  . "\nin " . $error['file'] . " on line " . $error['line'] . "```";
            if (!empty($this->slackWebhookURL))
            {
                $this->sendToSlack($errMsg);
            } else {
                print($errMsg);
            }
        }
    }

    private function sendToSlack($msg)
    {
        if (!$msg)
        {
            return;
        }
        if (empty($this->slackWebhookURL))
        {
            return;
        }
        $message = array('payload' => json_encode(array('text' => $msg)));
        $c = curl_init($this->slackWebhookURL);
        if ($c) {
            curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($c, CURLOPT_POST, true);
            curl_setopt($c, CURLOPT_POSTFIELDS, $message);
            curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
            curl_exec($c);
            curl_close($c);
        }
    }
}