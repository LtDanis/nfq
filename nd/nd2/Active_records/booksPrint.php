<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 16.11.21
 * Time: 17.32
 */

namespace nd2\Active_records;

use nd2\Active_records\Book;

require './Books.php';

  $books = new Book();
  $books->loadAll();

  if (!empty($books)) {
  ?>
    <div>
      <table>
        <th>Id</th>
        <th>Title</th>
        <th>Year</th>
        <th>Genre</th>
        <th>Authors</th>
        <?php
        /** @var Book $book */
        foreach ($books as $book) {;
          $id = $book->getBookId();
          echo $id;
          $title = $book->getTitle();
          $year = $book->getYear();
          $genre = $book->getGenre();
          $authors = $book->getAuthors();
          ?>
          <tr>
            <td><?php echo "<a href='book.html.php/?id=".$id."'>$id</a>"; ?></td>
            <td><?php echo "<a href='book.html.php/?id=".$id."'>$title</a>"; ?></td>
            <td><?php echo "<a href='book.html.php/?id=".$id."'>$year</a>"; ?></td>
            <td><?php echo "<a href='book.html.php/?id=".$id."'>$genre</a>"; ?></td>
            <td><?php echo "<a href='book.html.php/?id=".$id."'>$authors</a>"; ?>
            </td>
          </tr>
          <?php 
        } ?>
      </table>
      <?php   
      } else { ?>
        <h2>No books found</h2>
      <?php 
      } ?>
    </div>