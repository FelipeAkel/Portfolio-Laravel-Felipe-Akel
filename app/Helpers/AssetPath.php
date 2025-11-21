<?php

if (! function_exists('asset_path')) {
    function asset_path($path)
    {
        return asset(env('APP_ASSET_PATH') . $path);
    }
}