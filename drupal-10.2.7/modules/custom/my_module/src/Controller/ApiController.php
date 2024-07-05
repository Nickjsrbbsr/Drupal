<?php

namespace Drupal\my_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * Class ApiController.
 *
 * Provides a REST API for My Module.
 */
class ApiController extends ControllerBase {

  /**
   * Handles the GET request for the API.
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   *   The JSON response.
   */
  public function get() {
    // Example data to return in the API response.
    $data = [
      'status' => 'success',
      'message' => 'Hello, this is My Module API!',
      'data' => [
        'key1' => 'value1',
        'key2' => 'value2',
      ],
    ];

    // Return the response as JSON.
    return new JsonResponse($data);
  }

}
