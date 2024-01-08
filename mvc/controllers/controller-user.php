<?php
// controllers/controller-user.php
require_once 'controller.php';
require_once 'models/model-user.php';

class UserController extends Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = $this->model('model-user');
    }

    public function login($username, $password) {
        $user = $this->userModel->getUserByUsername($username);
        if ($user && $user['password'] === $password) {
            $_SESSION['user'] = $user['username'];
            $this->view('dashboard');
        } else {
            $this->view('login', ['error' => 'Invalid username or password']);
        }
    }

    public function logout() {
        unset($_SESSION['user']);
        session_destroy();
        $this->view('login');
    }
}
?>
