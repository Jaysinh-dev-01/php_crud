<?php
// Include the database connection and User class
require_once 'User.php';

// Create an object of the User class
$user = new User();

$response = [
    'status' => 'error',
    'message' => 'Invalid action!'
];

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'save':
            parse_str($_POST['data'], $formData);
            $id = isset($formData['id']) && !empty($formData['id']) ? $formData['id'] : null;
            $name = $formData['name'];
            $age = $formData['age'];
            $email = $formData['email'];
            $password = $formData['password'] ?? "";
            $city = $formData['city'];
            $address = $formData['address'];
            $gender = $formData['gender'];
            $skills = implode(',', $formData['skills']);
           
            $result = $user->saveUser($id, $name, $age, $email, $password, $city, $address, $gender, $skills);
            echo $result;
            break;

        case 'select':
            if (isset($_POST['id']) && !empty($_POST['id'])) {
                $id = $_POST['id'];
                $result = $user->getUser($id);
                echo $result;
            } else {
                $result = $user->getUser(); // Fetch all users
                echo $result;
            }
            break;

        case 'delete':
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $result = $user->deleteUser($id);
                echo $result;
            } else {
                $response = ['status' => 'error', 'message' => 'ID not provided'];
            }
            break;
        default:
            $response = [
                'status' => 'error',
                'message' => 'Invalid action!'
            ];
            break;
    }
}else{
    echo json_encode($response);
}

