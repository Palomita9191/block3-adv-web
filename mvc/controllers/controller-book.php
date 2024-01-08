<?php
// controllers/controller-book.php
require_once 'controller.php';
require_once 'models/model-book.php';

class BookController extends Controller {
    private $bookModel;

    public function __construct() {
        $this->bookModel = $this->model('model-book');
    }

    public function addBook($name) {
        $this->bookModel->addBook($name);
    }

    public function showBooks() {
        $books = $this->bookModel->getBooks();
        $this->view('dashboard', ['books' => $books]);
    }
}
?>
