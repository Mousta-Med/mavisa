<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

include_once 'app/models/database.php';
include_once 'app/models/Users.php';
$database = new Database();
$db = $database->getConnection();
$items = new user($db);
$stmt = $items->getUsers();
$itemCount = $stmt->rowCount();

// echo json_encode($itemCount);
if ($itemCount > 0) {

    $usersArr = array();
    // $usersArr["data"] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $users = array(
            "user_id" => $user_id,
            "user_token" => $user_token,
            "user_firstname" => $user_firstname,
            "user_lastname" => $user_lastname,
            "user_birthdate" => $user_birthdate,
            "user_nationality" => $user_nationality,
            "family_situation" => $family_situation,
            "user_adresse" => $user_adresse,
            "visa_type" => $visa_type,
            "Date_of_departure" => $Date_of_departure,
            "arrival_date" => $arrival_date,
            "voyage_document_type" => $voyage_document_type,
            "voyage_document_number" => $voyage_document_number
        );
        // array_push($usersArr["data"], $users);
        array_push($usersArr, $users);
    }
    echo json_encode($usersArr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
