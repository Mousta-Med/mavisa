<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'app/models/database.php';
include_once 'app/models/Users.php';
$database = new Database();
$db = $database->getConnection();
$item = new user($db);
$data = json_decode(file_get_contents("php://input"));

$res = $item->login($data->user_token);
$id = $res['user_id'];
$date = date("Y-m-d", strtotime($data->selectedDate));
if (isset($data->time)) {
    $time = $data->time;
}
if ($data->stat == "check") {
    $result = $item->book($date);
    $times = $result->fetchAll(PDO::FETCH_COLUMN);

    if (isset($result)) {
        http_response_code(200);
        echo json_encode($times);
    } else {
        http_response_code(404);
        echo json_encode("There is no time");
    }
} else {
    $query = $item->userreservation($id);

    if ($query) {
        $stmt = $item->booking($date, $time, $id);
        http_response_code(200);
        echo json_encode("You have been reserved successfully");
    } else {
        http_response_code(404);
        echo json_encode("You already have a reservation");
    }
}
