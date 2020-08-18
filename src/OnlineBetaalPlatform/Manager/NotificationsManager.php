<?php

namespace OnlineBetaalPlatform\Manager;

use Exception;
use JsonMapper;
use OnlineBetaalPlatform\Exception\NotificationException;

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

    public function processNotification($jsonMessage)
    {
        try {
            return json_decode($jsonMessage, true);
            // return $this->mapper->map($data, new Notification());
        } catch (Exception $exception) {
            throw new NotificationException('Unable to process notification: ' . $exception->getMessage(), $exception->getCode(), $exception);
        }
    }
}
