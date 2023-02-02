<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once 'app/models/database.php';
include_once 'app/models/employees.php';
$database = new Database();
$db = $database->getConnection();
$item = new Employee($db);
$item->user_id = isset($iod) ? $iod : die();

$item->getSingleUser();
if ($item->user_firstname != null) {
    // create array
    $user_arr = array(
        "user_id" => $item->user_id,
        "user_token" => $item->user_token,
        "user_firstname" => $item->user_firstname,
        "user_lastname" => $item->user_lastname,
        "user_birthdate" => $item->user_birthdate,
        "user_nationality" => $item->user_nationality,
        "family_situation" => $item->family_situation,
        "user_adresse" => $item->user_adresse,
        "visa_type" => $item->visa_type,
        "Date_of_departure" => $item->Date_of_departure,
        "arrival_date" => $item->arrival_date,
        "voyage_document_type" => $item->voyage_document_type,
        "voyage_document_number" => $item->voyage_document_number
    );

    http_response_code(200);
    echo json_encode($user_arr);
} else {
    http_response_code(404);
    echo json_encode("User not found.");
}
