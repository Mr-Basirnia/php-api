<?php

use App\Services\CityService;
use App\Utility\Response;

require_once "../../../autoloader.php";

$city = new CityService();

switch ($_SERVER['REQUEST_METHOD']) {

    case 'GET':

        $response = $city->get($_GET);

        if (empty($response)) {

            Response::error(
                ['message' => 'City not found'],
                Response::$statusTexts[Response::HTTP_NOT_FOUND],
                Response::HTTP_NOT_FOUND
            );

            break;
        }

        Response::success($response, '', Response::HTTP_OK);

        break;

    default:
        # code...
        break;
}
