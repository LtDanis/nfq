INSERT INTO Authors (name)
VALUES ('Tomas Tomukas');

INSERT INTO Authors (name)
VALUES ('Danielius Rasytojas');

INSERT INTO `Books`(`authorId`, `title`, `year`) VALUES ('8', 'Ruduo', '1989');
INSERT INTO `Books`(`authorId`, `title`, `year`) VALUES ('9', 'Ziema', '2018');

UPDATE `Books` SET authorId=2
WHERE title='Programming F# 3.0, 2nd Edition';

DELETE FROM Authors WHERE ((authorId=8) OR (authorId=9));

DELETE FROM Books WHERE authorId IS NULL;

ALTER TABLE Books
ADD genre varchar(16);

CREATE TABLE Written_books (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
bookId INT(6),
authorId INT(6)
);

UPDATE Books SET genre="Fantasy"
WHERE bookId>7;

UPDATE Books SET genre="Science"
WHERE genre IS NULL;

INSERT INTO Written_books (authorId, bookId)
VALUES (1,1),(2,3),(2,4),(3,2),(3,5),(4,9),(5,9),(6,9),(7,10);

SET NAMES utf8;

ALTER TABLE Books
ADD original_name varchar(32);

UPDATE Books SET original_name="F šarp programavimo pagrindai"
WHERE title='Programming F# 3.0, 2nd Edition';

