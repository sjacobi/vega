<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable or disable routes and console commands for the package
    |--------------------------------------------------------------------------
    */

    'enable' => env('VEGA_ENABLE', false),

    /*
    |--------------------------------------------------------------------------
    | Hours to delete messages
    |--------------------------------------------------------------------------
    */

    'interval_for_deleting_messages' => env('VEGA_INTERVAL_FOR_DELETING_MESSAGES', 1),

];

