<?php

namespace Drupal\my_crud_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Drupal\Core\Database\Database;

class CrudController extends ControllerBase {

  /**
   * Handles the creation of a new entry.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The request object.
   *
   * @return \Symfony\Component\HttpFoundation\Response
   *   The response object.
   */
  public function createEntry(Request $request) {
    
    $connection = Database::getConnection();
    $name = $request->get('name');
    $description = $request->get('description');
    // $name = $request->request->get('name');
    // $description = $request->request->get('description');
    $fields = [
      'name' => $name,
      'description' => $description,
      'created' => time(),
      
      'changed' => time(),
    ];
    $connection->insert('my_crud_table')->fields($fields)->execute();
    return new Response('Entry created.');
  }

  /**
   * Handles reading an entry by ID.
   *
   * @param int $id
   *   The ID of the entry.
   *
   * @return \Symfony\Component\HttpFoundation\Response
   *   The response object.
   */
  public function readEntry($id) {
    $connection = Database::getConnection();
    $query = $connection->select('my_crud_table', 'm')
      ->fields('m', ['id', 'name', 'description', 'created', 'changed'])
      ->condition('id', $id)
      ->execute()
      ->fetchAssoc();
    return new Response(json_encode($query));
  }
  public function readAll() {
    $connection = Database::getConnection();
    $query = $connection->select('my_crud_table', 'm')
      ->fields('m', ['id', 'name', 'description', 'created', 'changed'])
    //   ->condition('id', $id)
      ->execute()
      ->fetchAll();
    return new Response(json_encode($query));
  }

  /**
   * Handles updating an entry by ID.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The request object.
   * @param int $id
   *   The ID of the entry.
   *
   * @return \Symfony\Component\HttpFoundation\Response
   *   The response object.
   */
  public function updateEntry(Request $request, $id) {
    $connection = Database::getConnection();

    $name = $request->get('name');
    $description = $request->get('description');
    $fields = [
      'name' => $name,
      'description' => $description,
      'changed' => time(),
    ];
    $connection->update('my_crud_table')
      ->fields($fields)
      ->condition('id', $id)
      ->execute();
    return new Response('Entry updated.');
  }

  /**
   * Handles deleting an entry by ID.
   *
   * @param int $id
   *   The ID of the entry.
   *
   * @return \Symfony\Component\HttpFoundation\Response
   *   The response object.
   */
  public function deleteEntry($id) {
    $connection = Database::getConnection();
    $connection->delete('my_crud_table')
      ->condition('id', $id)
      ->execute();
    return new Response('Entry deleted.');
  }
}
