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

    /**
     * @param $data
     */
    public function post($data)
    {
        return addCity($data);
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
