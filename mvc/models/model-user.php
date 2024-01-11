<?php
// models/model-user.php
require_once 'model-animal.php';

class UserModel extends Model {
    private $users = [
        ['username' => 'admin', 'password' => 'admin']
        // Add more users as needed
    ];

    public function getUserByUsername($username) {
        foreach ($this->users as $user) {
            if ($user['username'] === $username) {
                return $user;
            }
        }
        return null;
    }
}
?>
