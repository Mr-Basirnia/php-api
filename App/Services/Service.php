<?php

namespace App\Services;

interface Service
{
    public function get($data);

    public function post();

    public function put();

    public function delete();
}
