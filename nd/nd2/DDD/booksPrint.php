<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 16.11.21
 * Time: 18.16
 */

namespace nd2\DDD;

require 'Books.php';
require './BooksRepository.php';

  $books = new BooksRepository();
  $books->findAllBooks();
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
      foreach ($books as $book) {
        $id = $book->getBookId();
        $title = $book->getTitle();
        $year = $book->getYear();
        $genre = $book->getGenre();
        $authors = $book->getAuthors();
        ?>
        <tr>
          <?php echo "<a href='book.html.php/?id=".$id.">";?>
          <td><?php echo $id; ?></td>
          <td><?php echo $title; ?></td>
          <td><?php echo $year; ?></td>
          <td><?php echo $genre; ?></td>
          <td><?php echo $authors; ?>
            
            <?php echo "</a>"; ?>
          </td>
        </tr>
        <?php
      } ?>
    </table>
    <?php   } else
    { ?>
      <h2>No books found</h2>
    <?php
    } ?>
  </div>