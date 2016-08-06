<?php
if (!function_exists('getArea')) {
    /**
     * get Area
     *
     * @param string $text
     *
     * @return array
     */
    function getArea()
    {
        return [];
    }
}

if (! function_exists('is_api_request')) {
    /**
     * Determine if the current request is for HTTP api.
     *
     * @return bool
     */
    function is_api_request()
    {
        return starts_with(request()->getHttpHost(), config('project.api_domain'));
    }
}

if (! function_exists('cache_key')) {
    /**
     * Generate key for caching.
     *
     * Note. Even though the request endpoints are the same,
     *       the response body should be different because of the query string.
     *
     * @param $base
     * @return string
     */
    function cache_key($base)
    {
        $key = ($uri = request()->fullUrl())
            ? $base . '.' . urlencode($uri)
            : $base;
        return md5($key);
    }
}

if (! function_exists('attachment_path')) {
    /**
     * @param string $path
     *
     * @return string
     */
    function attachment_path($path = '')
    {
        return public_path($path ? 'attachments'.DIRECTORY_SEPARATOR.$path : 'attachments');
    }
}