<?php

namespace Drupal\fake_store\Controller;

use Drupal\Core\Controller\ControllerBase;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends ControllerBase {

  public function getProduct(Request $request) {
    // Create a Guzzle HTTP client.
    $client = new Client();
    $id = $request->get('id');
    
    // Make a GET request to the external API.
    try {
      $response = $client->get('https://fakestoreapi.com/products/' . $id);
      $data = json_decode($response->getBody()->getContents(), TRUE);

      // Handle exceptions and return an error message.
      if ($response->getStatusCode() !== 200) {
        return new Response('Failed to fetch product data. Error: ' . $response->getBody()->getContents(), 500);
      }
      if(empty($data)) {
        return new Response('Product not found', 404);
      }
      // 
      // Render the data in a simple way.
      return [
        '#theme' => 'fake_store_product',
        
        '#id' => $data['id'],
        '#title' => $data['title'],
        '#price' => $data['price'],
        '#description' => $data['description'],
        '#category' =>  $data['category'],
        '#image' => $data['image'],
        
      ];
    } catch (\Exception $e) {
      // Handle exceptions and return an error message.
      return new Response('Failed to fetch product data. Error: ' . $e->getMessage(), 500);
    }
  }
}
