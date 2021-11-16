<?php 

namespace App\Service;


class BaseHelper
{
    public const STATUS_SUCCESS = "success";
    public const STATUS_INFO = "info";
    public const STATUS_WARNING = "warning";
    public const STATUS_ERROR = "error";
    public const STATUS_COMPLETE = "complete";
    public const MESSAGE_ONLYAJAX = "You can access this only using AJAX";
    public const NOTIFICATION_BO_SUCCESS = "bo-notifications-success";
    public const NOTIFICATION_BO_ERROR = "bo-notifications-error";
    public const NOTIFICATION_CA_SUCCESS = "ca-notifications-success";
    public const NOTIFICATION_CA_ERROR = "ca-notifications-error";
}