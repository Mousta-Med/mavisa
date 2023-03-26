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

$result = $item->book($data->selectedDate);
$res = $item->login($data->user_token);
$id = $res['user_id'];
if ($res) {
    $item->user_id = isset($id) ? $id : die();
    // $item->getSingleUser();
    // $user_arr = array(
    //     "user_firstname" => $item->user_firstname,
    //     "user_lastname" => $item->user_lastname,
    //     "user_birthdate" => $item->user_birthdate,
    //     "user_nationality" => $item->user_nationality,
    //     "family_situation" => $item->family_situation,
    //     "user_adresse" => $item->user_adresse,
    //     "visa_type" => $item->visa_type,
    //     "Date_of_departure" => $item->Date_of_departure,
    //     "arrival_date" => $item->arrival_date,
    //     "voyage_document_type" => $item->voyage_document_type,
    //     "voyage_document_number" => $item->voyage_document_number
    http_response_code(200);
    // echo json_encode($user_arr);
    echo json_encode("oryaaaaa");
} else {
    http_response_code(404);
    echo json_encode("just bullshit");
}
