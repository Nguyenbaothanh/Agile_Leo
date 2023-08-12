<?php
require_once 'Edit_UserModel.php';

class EditUserController {
    private $model;

    public function __construct($conn) {
        $this->model = new UserModel($conn);
    }

    public function editUser($user_id) {
        $user = $this->model->getUserById($user_id);

        if ($user) {
            require 'edit_user_view.php';
        } else {
            echo "Không tìm thấy người dùng.";
        }
    }
}

$conn = new mysqli("localhost", "root", "", "agile");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $user_id = $_GET["id"];

    $controller = new EditUserController($conn);
    $controller->editUser($user_id);
} else {
    echo "Invalid request.";
}

$conn->close();
?>
