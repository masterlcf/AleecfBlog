<?php


namespace App\Services;


class FileLog implements Logger
{
    public function write()
    {
        echo 'filelog write...';
    }
}
