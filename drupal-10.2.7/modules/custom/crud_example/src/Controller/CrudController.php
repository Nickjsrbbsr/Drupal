<?php

namespace Drupal\crud_example\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\user\Entity\User;
use Drupal\Core\Database\Database;
use Drupal\user\UserStorageInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\user\UserAuthInterface;

class CrudController extends ControllerBase {

  /**
   * The user storage.
   *
   * @var \Drupal\user\UserStorageInterface
   */
  protected $userStorage;

  /**
   * The user authentication service.
   *
   * @var \Drupal\user\UserAuthInterface
   */
  protected $userAuth;

  /**
   * Constructs a new CrudController object.
   *
   * @param \Drupal\user\UserStorageInterface $user_storage
   *   The user storage.
   * @param \Drupal\user\UserAuthInterface $user_auth
   *   The user authentication service.
   */
  public function __construct(UserStorageInterface $user_storage, UserAuthInterface $user_auth) {
    $this->userStorage = $user_storage;
    $this->userAuth = $user_auth;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager')->getStorage('user'),
      $container->get('user.auth')
    );
  }

  public function add(Request $request) {
    $data = $request->request->all();
    $connection = Database::getConnection();
    $connection->insert('crud_example')
      ->fields([
        'name' => $data['name'],
        'email' => $data['email'],
        'age' => $data['age'],
      ])
      ->execute();
    return new JsonResponse(['message' => 'Data added successfully']);
  }

  public function view() {
    $connection = Database::getConnection();
    $query = $connection->select('crud_example', 'ce')
      ->fields('ce', ['id', 'name', 'email', 'age']);
    $results = $query->execute()->fetchAll();
    return new JsonResponse($results);
  }

  public function update($id, Request $request) {
    $data = $request->request->all();
    $connection = Database::getConnection();
    $connection->update('crud_example')
      ->fields([
        'name' => $data['name'],
        'email' => $data['email'],
        'age' => $data['age'],
      ])
      ->condition('id', $id)
      ->execute();
    return new JsonResponse(['message' => 'Data updated successfully']);
  }

  public function delete($id) {
    $connection = Database::getConnection();
    $connection->delete('crud_example')
      ->condition('id', $id)
      ->execute();
    return new JsonResponse(['message' => 'Data deleted successfully']);
  }

  public function fetch(Request $request) {
    $data = $request->request->all();
    $username = $data['username'];
    $password = $data['password'];

    $users = $this->userStorage->loadByProperties(['name' => $username]);
    $user = reset($users);

    if ($user && $this->userAuth->authenticate($username, $password, $request->getClientIp())) {
      $connection = Database::getConnection();
      $query = $connection->select('crud_example', 'ce')
        ->fields('ce', ['id', 'name', 'email', 'age']);
      $results = $query->execute()->fetchAll();
      return new JsonResponse($results);
    }
    else {
      return new JsonResponse(['message' => 'Invalid credentials'], 403);
    }
  }

}
