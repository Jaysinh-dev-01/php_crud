<?php
class User
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', 'root@123', 'crud');
        if ($this->conn->connect_error) {
            die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $this->conn->connect_error]));
        }
    }

    public function saveUser($id, $name, $age, $email, $password = "", $city, $address, $gender, $skills)
    {
        if ($id) {
            $query = "UPDATE `users` SET 
                      `name`='$name', `age`=$age, `email`='$email',`city`='$city', `address`='$address', `gender`='$gender', `skills`='$skills' 
                      WHERE `id`=$id";
            $action = "updated";
        } else {

            $query = "INSERT INTO `users` (`name`, `age`, `email`, `password`, `city`, `address`, `gender`, `skills`) 
                      VALUES ('$name', $age, '$email', '$password', '$city', '$address', '$gender', '$skills')";
            $action = "inserted";
        }

        if ($this->conn->query($query)) {
            return json_encode(['status' => 'success', 'message' => "User successfully $action"]);
        } else {
            return json_encode(['status' => 'error', 'message' => 'Query failed: ' . $this->conn->error]);
        }
    }

    public function getUser($id = null)
    {
        $query = "SELECT `id`, `name`, `age`, `email`, `city`, `address`, `gender`, `skills` FROM `users`";
        if ($id) {
            // Retrieve single record
            $query .= " WHERE `id` = $id";
            $result = $this->conn->query($query);
            $data = $result->fetch_assoc();
            $data['skills'] = explode(",", $data['skills']);
        } else {
            // Retrieve all records
            $result = $this->conn->query($query);
            $data = [];
            while ($row = $result->fetch_assoc()) {
                array_push($data, $row);
            }
        }

        if ($data) {
            return json_encode(['status' => 'success', 'data' => $data]);
        } else {
            return json_encode(['status' => 'error', 'message' => 'No user(s) found']);
        }
    }

    // Function for deletion with JSON response
    public function deleteUser($id)
    {
        $query = "DELETE FROM `users` WHERE `id` = $id";

        if ($this->conn->query($query)) {
            return json_encode(['status' => 'success', 'message' => 'User deleted successfully']);
        } else {
            return json_encode(['status' => 'error', 'message' => 'Failed to delete user: ' . $this->conn->error]);
        }
    }
}
