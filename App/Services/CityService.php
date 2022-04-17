<?php

namespace App\Services;

class CityService implements Service
{
    /**
     * @param $data
     */
    public function get($data)
    {
        return getCities($data);
    }

    public function post()
    {
        return 'post';
    }

    public function put()
    {
        return 'put';
    }

    public function delete()
    {
        return 'delete';
    }
}
