<?php

/**
 * Created by PhpStorm.
 * User: pc
 * Date: 16.11.15
 * Time: 18.50
 */
namespace nd2\DDD;

class BooksRepository {
  private $connection;

  public function __construct()
  {
    $this->connection = new \PDO("mysql:host=localhost;dbname=nd", 'root', 'admin');

    if(!$this->connection){
      die('Could not conenct to database');
    }
  }

  /**
   * @return \PDO
   */
  public function getConnection()
  {
    return $this->connection;
  }

  /**
   * @param \PDO $connection
   * @return DbConnection
   */
  public function setConnection($connection)
  {
    $this->connection = $connection;
    return $this;
  }

  public function findById($id)
  {

    $stmt = $this->connection->prepare("SELECT Books.* FROM Books
        WHERE bookId = $id;");
    $stmt->bindParam('id', $id);
    $stmt->execute();
    return new Book($stmt->fetch());
  }

  public function findAllBooks()
  {
    $stmt = $this->conn->prepare('SELECT Books.*, GROUP_CONCAT(Authors.name) AS authors FROM Books
        LEFT JOIN Written_books ON Books.bookId = Written_books.bookId
        LEFT JOIN Authors ON  Authors.authorId=Written_books.authorId
        GROUP BY Books.title;');
    $stmt->execute();

    return $stmt->fetchAll();
  }
}
