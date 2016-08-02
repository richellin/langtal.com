<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Enable or disable site-wide caching
    |--------------------------------------------------------------------------
    |
    | If set to false, site-wide cache and etag/304 feature will be disabled.
    | For production, for performance this should be set to true.
    |
    */
    'cache' => ! env('APP_DEBUG', false),
    /*
    |--------------------------------------------------------------------------
    | Project identification
    |--------------------------------------------------------------------------
    |
    */
    'name'        => 'langtal',
    'description' => 'langtal.com',
    'app_domain'  => env('APP_DOMAIN', 'langtal.com'),
    'api_domain'  => env('API_DOMAIN', 'api.langtal.com'),
    /*
    |--------------------------------------------------------------------------
    | People & contacts
    |--------------------------------------------------------------------------
    |
    */
    'contacts'    => [
        'author' => [
            'name'         => 'sangjun',
            'email'        => 'richellin7@gmail.com',
            'url'          => '',
            'organization' => 'langtal',
        ],
        'admin'  => [
            // ...
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | SEO keys
    |--------------------------------------------------------------------------
    |
    | @see https://www.google.com/webmasters/tools/home
    |      Note. Is not required when Google Analytics is activated.
    | @see http://webmastertool.naver.com/board/main.naver
    |
    */
    'seo'         => [
        //'google_site_key' => 'c',
        //'naver_site_key'  => 'd',
    ],
    /*
    |--------------------------------------------------------------------------
    | Available/allowed fields for query string
    |--------------------------------------------------------------------------
    |
    */
    'params'      => [
        'page'   => 'page',
        'filter' => 'filter',
        'limit'  => 'limit',
        'sort'   => 'sort',
        'order'  => 'order',
        'search' => 'q',
        'select' => 'fields',
    ],
    /*
    |--------------------------------------------------------------------------
    | Available/allowed value for 'filter' query string
    |--------------------------------------------------------------------------
    |
    | 'model_in_lower_case' => ['filter_key' => 'description'],
    | filter_key will be transformed to camelCase when calling the scope query.
    |     e.g. no_comment -> noComment
    |
    */
    'filters' => [
        'article' => [
            'no_comment' => 'No Comment',
            'not_solved' => 'Not Solved'
        ]
    ],
];