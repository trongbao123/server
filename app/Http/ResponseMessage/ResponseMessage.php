<?php

namespace App\Http\ResponseMessage;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ResponseMessage
{
    public const OK = "OK";
    public const CREATED = "created";
    public const ACCEPTED = "accepted";
    public const NON_AUTHORITATIVE_INFORMATION = "Non-Authoritative Information";
    public const NO_CONTENT = "No Content";
    public const RESET_CONTENT = "Reset Content";
    public const PARTIAL_CONTENT = "Partial Content";
    public const BAD_REQUEST = "Bad Request";
    public const UNAUTHORIZED = "UnAuthorized";
    public const FORBIDDEN = "Forbidden";
    public const NOT_FOUND = "Not Found";
    public const INTERNAL_SERVER_ERROR = "Internal Server Error";
    public const SERVICE_UNAVAILABLE = "Service Unavailable";
}
