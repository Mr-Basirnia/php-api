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

    /**
     * @param $data
     */
    public function put($data);

    /**
     * @param int $id
     */
    public function delete(int $id);
}
