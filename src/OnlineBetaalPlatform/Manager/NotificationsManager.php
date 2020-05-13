<?php

namespace OnlineBetaalPlatform\Manager;

use JsonMapper;
use Notification;

/**
 * Contains methodes to process notifications in the OBP system. 
 */
class NotificationsManager
{

    public function processNotification($jsonMessage): Notification
    {
        $data = json_decode($jsonMessage);
        $mapper = new JsonMapper();
        return $mapper->map($data, new Notification());
    }
}
