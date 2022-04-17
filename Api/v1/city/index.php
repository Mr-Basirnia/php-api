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

    case 'POST':

        $rowBody = json_decode(file_get_contents('php://input'), true);

        $response = $city->post($rowBody);

        if (!isValidCity($rowBody)) { #check if the city data is valid

            Response::error(
                ['message' => 'Invalid city'],
                Response::$statusTexts[Response::HTTP_BAD_REQUEST],
                Response::HTTP_BAD_REQUEST
            );

            break;
        }

        Response::success($response, '', Response::HTTP_CREATED);

        break;

    default:
        # code...
        break;
}
