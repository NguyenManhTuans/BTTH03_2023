<?php
    include("Utils/EmailSender.php");
    include("Utils/EmailServerInterface.php");
    include("Utils/MyEmailServer.php");

    $emailServer = new MyEmailServer();
    $emailSender = new EmailSender($emailServer);
    $emailSender->send("obmhenry12345@gmail.com", "Test Email", "This is a test email.");