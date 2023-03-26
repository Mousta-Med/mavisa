<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'app/models/database.php';
include_once 'app/models/Users.php';

$database = new Database();
$db = $database->getConnection();

$item = new user($db);

$data = json_decode(file_get_contents("php://input"));

// $item->user_id = $data->user_id;

// user values
$item->user_token = $data->user_token;
$item->user_firstname = $data->user_firstname;
$item->user_lastname = $data->user_lastname;
$item->user_birthdate = $data->user_birthdate;
$item->user_nationality = $data->user_nationality;
$item->family_situation = $data->family_situation;
$item->user_adresse = $data->user_adresse;
$item->visa_type = $data->visa_type;
$item->Date_of_departure = $data->Date_of_departure;
$item->arrival_date = $data->arrival_date;
$item->voyage_document_type = $data->voyage_document_type;
$item->voyage_document_number = $data->voyage_document_number;

if ($item->updateUser()) {
    echo json_encode("user data updated.");
} else {
    echo json_encode("Data could not be updated");
}
