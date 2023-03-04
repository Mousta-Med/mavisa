<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'app/models/database.php';
include_once 'app/models/Users.php';

$database = new Database();
$db = $database->getConnection();

$item = new user($db);

$data = json_decode(file_get_contents("php://input"));

$item->user_id = $data->user_id;

if ($item->deleteUser()) {
    echo json_encode("user deleted.");
} else {
    echo json_encode("Data could not be deleted");
}
