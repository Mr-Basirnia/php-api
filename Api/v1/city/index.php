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

    case 'PUT':

        $rowBody = json_decode(file_get_contents('php://input'), true);

        $response = $city->put($rowBody);

        if ($response === 0) {

            Response::error(
                ['message' => 'City not found'],
                Response::$statusTexts[Response::HTTP_NOT_FOUND],
                Response::HTTP_NOT_FOUND
            );

            break;
        }

        Response::success($response, '', Response::HTTP_OK);

        break;

    case 'DELETE':

        $response = $city->delete($_GET['city_id'] ?? 0);

        if ($response === 0) {

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

        Response::error(
            ['message' => 'Method not allowed'],
            Response::$statusTexts[Response::HTTP_METHOD_NOT_ALLOWED],
            Response::HTTP_METHOD_NOT_ALLOWED
        );

        break;
}
