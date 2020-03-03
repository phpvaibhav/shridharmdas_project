<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ResponseMessages{


    public static function getStatusCodeMessage($status)
    {
        $CI =& get_instance();
        $codes = Array(
            100 => $CI->lang->line("Invalid_API_key"),
            101 => $CI->lang->line("Invalid_token"),
            102 => $CI->lang->line("Invalid_Email_or_Password"),
            103 => $CI->lang->line("User_authentication_successfully_done"),
            104 => $CI->lang->line("User_not_found"),
            105 => $CI->lang->line("User_registration_successfully_done"),
            106 => $CI->lang->line("User_authentication_successfully_done"),
            107 => $CI->lang->line("Something_went_wrong"),
            108 => "You are currently not authorised to login",
            109 => $CI->lang->line("Invalid_request"),
            110 => $CI->lang->line("User_registration_successfully_done"),
            111 => $CI->lang->line("User_registration_successfully_done"),
            112 => 'Please select image',
            113 => 'Please select video',
            114 => "No results found right now",
            115 => "You're temporarily blocked from posting",
            116 => "User already registered",
            117 => "Email already exist",
            118 => $CI->lang->line("User_registration_successfully_done"),
            119 => "Contact verified successfully", 
            120 => "A new password has been sent on your registered email",
            121 =>  $CI->lang->line("Logged_in_successfully"),
            122 =>  $CI->lang->line("Added_successfully"),
            123 =>  $CI->lang->line("Updated_successfully"),
            124 =>  $CI->lang->line("Deleted_successfully"),
            125 =>  $CI->lang->line("Logged_out_successfully"),
            126 => "You are not authorised for this action",
            126 => $CI->lang->line("Invalid_Email_or_Password"),
            127 => "Record found",
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported'
        );
        return (isset($codes[$status])) ? $codes[$status] : '';
    }//End function
}//End function

?>