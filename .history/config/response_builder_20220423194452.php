<?php

use App\ApiCodeResponse\ApiCode;



return [
    /*
    |-----------------------------------------------------------------------------------------------------------
    | Code range settings
    |-----------------------------------------------------------------------------------------------------------
    */
    'min_code'          => 100,
    'max_code'          => 1024,

    /*
    |-----------------------------------------------------------------------------------------------------------
    | Error code to message mapping
    |-----------------------------------------------------------------------------------------------------------
    |
    */
    'map'               => [
        ApiCode::SOMETHING_WENT_WRONG => 'api.something_went_wrong',
        ApiCode::INVALID_CREDENTIALS => 'api.invalid_credentials',
        ApiCode::INVALID_BOOK_NAME_SUPPLIED => 'api.book_credentials',
    ],
];