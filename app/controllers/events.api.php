<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

include_once 'app/models/database.php';
include_once 'app/models/Users.php';
$database = new Database();
$db = $database->getConnection();
$items = new user($db);
$stmt = $items->getEvents();
$itemCount = $stmt->rowCount();

if ($itemCount > 0) {

    $events = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $event = array(
            'date' => $row['reservation_date'],
        );
        array_push($events, $event);
    }

    echo json_encode($events);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
