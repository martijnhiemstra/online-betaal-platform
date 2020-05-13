<?php

namespace OnlineBetaalPlatform\Manager;

use JsonMapper;
use OnlineBetaalPlatform\Model\Notification;

/**
 * Contains methodes to process notifications in the OBP system. 
 */
class NotificationsManager
{

    /** @var JsonMapper */
    private $mapper;

    /**
     */
    public function __construct()
    {
        $this->mapper = new JsonMapper();
    }

    public function processNotification($jsonMessage): Notification
    {
        $data = json_decode($jsonMessage);
        return $this->mapper->map($data, new Notification());
    }
}
