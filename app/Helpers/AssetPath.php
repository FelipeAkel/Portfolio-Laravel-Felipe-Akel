<?php

if (! function_exists('asset')) {
    function asset($path) {
        return asset(env('APP_ASSET_PATH') . $path);
    }
}