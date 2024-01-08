<?php
// models/model-book.php
require_once 'model-animal.php';

class BookModel extends Model {
    private $books = [];

    public function addBook($bookName) {
        array_push($this->books, $bookName);
    }

    public function getBooks() {
        return $this->books;
    }
}
?>

