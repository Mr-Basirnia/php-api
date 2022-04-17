<?php

namespace App\Services;

interface Service
{
    /**
     * @param $data
     */
    public function get($data);

    /**
     * @param $data
     */
    public function post($data);

    public function put();

    public function delete();
}
