<?php

/**
 * Created by PhpStorm.
 * User: pc
 * Date: 16.11.15
 * Time: 17.49
 */
namespace nd2\Active_records;


class Book {

  private $bookId;

  private $title;

  private $year;

  private $authors;

  private $genre;

  public function __construct()
  {
  }

  public function constructor($row)
  {
    $this->title = $row['title'];
    $this->year = $row['year'];
    $this->genre = $row['genre'];
    $this->authors = $row['authors'];
    $this->bookId = $row['bookId'];
  }
  /**
   * @return mixed
   */
  public function getBookId() {
    return $this->bookId;
  }

  /**
   * @param mixed $bookId
   */
  public function setBookId($bookId) {
    $this->bookId = $bookId;
  }

  /**
   * @return mixed
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * @param mixed $title
   */
  public function setTitle($title) {
    $this->title = $title;
  }

  /**
   * @return mixed
   */
  public function getYear() {
    return $this->year;
  }

  /**
   * @param mixed $year
   */
  public function setYear($year) {
    $this->year = $year;
  }

  /**
   * @return mixed
   */
  public function getAuthors() {
    return $this->authors;
  }

  /**
   * @param mixed $authors
   */
  public function setAuthors($authors) {
    $this->authors = $authors;
  }

  /**
   * @return mixed
   */
  public function getGenre() {
    return $this->genre;
  }

  /**
   * @param mixed $genre
   */
  public function setGenre($genre) {
    $this->genre = $genre;
  }

  public function load($id) {
    $servername = "localhost";
    $username = "root";
    $password = "admin";

    $conn;
    try {
      $conn = new \PDO("mysql:host=$servername;dbname=nd", $username, $password);

      $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    } catch (\PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    $sql = "SELECT Books.*, GROUP_CONCAT(Authors.name) AS authors FROM Books
        LEFT JOIN  Written_books ON Books.bookId =  Written_books.bookId
        LEFT JOIN Authors ON  Authors.authorId= Written_books.authorId
        WHERE Books.bookId=$id";
    foreach ($conn->query($sql) as $row) {
      $this->bookId = $row['bookId'];
      $this->title = $row['title'];
      $this->year = $row['year'];
      $this->genre = $row['genre'];
      $this->authors =$row['authors'];
    }
  }
  public function loadAll()
  {
    $servername = "localhost";
    $username = "root";
    $password = "admin";

    $conn;
    try {
      $conn = new \PDO("mysql:host=$servername;dbname=nd", $username, $password);

      $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    } catch (\PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }

    $stmt = $conn->prepare('SELECT Books.*, GROUP_CONCAT(Authors.name) AS authors FROM Books
        LEFT JOIN  Written_books ON Books.bookId =  Written_books.bookId
        LEFT JOIN Authors ON  Authors.authorId= Written_books.authorId
        GROUP BY Books.title;');
    $stmt->execute();
    $objArray = $stmt->fetchAll();
    foreach ($objArray as $key => $obj){
      $objArray[$key] = new Book($obj);
    }
    return $objArray;
  }
}
