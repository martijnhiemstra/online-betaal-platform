<?php

namespace OnlineBetaalPlatform\Manager;

use Exception;
use JsonMapper;
use OnlineBetaalPlatform\Exception\NotificationException;
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

    public function processNotification($jsonMessage)
    {
        try {
            $data = json_decode($jsonMessage);
            return $this->mapper->map($data, new Notification());
        } catch (Exception $exception) {
            throw new NotificationException('Unable to process notification: ' . $exception->getMessage(), $exception->getCode(), $exception);
        }
    }
}
