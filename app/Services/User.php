<?php


namespace App\Services;


class User
{
    protected $log;

    public function __construct(Logger $log)
    {
        $this->log = $log;
    }

    public function login()
    {
        echo 'login success ...';
        $this->log->write();
    }
}
