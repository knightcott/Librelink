<?php

/*
|  Config file for Knightcott\Librelink
*/

return [

    /*
    |--------------------------------------------------------------------------
    | URL of LibreNMS server
    |--------------------------------------------------------------------------
    |
    | This value is the url of your LibreNMS server.  It should include protocol 
    | and server name but excluding any path.
    |
    */

    'server' => env('LIBRENMS_SERVER', 'https://librenms.org'),

    /*
    |--------------------------------------------------------------------------
    | API Token
    |--------------------------------------------------------------------------
    |
    | This value is your API token as generated from your admin menu of LibreNMS.
    |
    */

    'token' => env('LIBRENMS_API_TOKEN', '')

];