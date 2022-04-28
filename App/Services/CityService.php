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

    /**
     * @param $data
     */
    public function put($data)
    {
        $id   = $data['city_id'] ?? 0;
        $name = $data['name'] ?? '';

        return changeCityName($id, $name);
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        return deleteCity($id);
    }
}
