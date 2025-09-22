<?php

interface Logger {
    public function log($msg);
}

interface Notifier {
    public function notify($msg);
}

class UserActivity implements Logger, Notifier {
    public function log($msg) {
        echo "Log: $msg<br>";
    }

    public function notify($msg) {
        echo "Notify: $msg<br>";
    }
}

$activity = new UserActivity();
$activity->log("User logged in");
$activity->notify("Email sent to user");


?>