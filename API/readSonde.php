<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");

require 'database.php';
$db_connection = new Database();
$conn = $db_connection->dbConnection();

if (isset($_GET['id'])) {
    $sonde_id = filter_var($_GET['id'], FILTER_VALIDATE_INT, [
        'options' => [
            'default' => 'all_posts',
            'min_range' => 1
        ]
    ]);
} else {
    $sonde_id = 'all_posts';
}

$sql = is_numeric($sonde_id) ? "SELECT * FROM `sonde` WHERE id='$sonde_id'" : "SELECT * FROM `sonde`";

$stmt = $conn->prepare($sql);

$stmt->execute();

if ($stmt->rowCount() > 0) {
    $releves_array = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $releves_data = [
            'id' => $row['id'],
            'lieu' => html_entity_decode($row['lieu']),
            'created_at' => $row['created_at'],
            'nom' => $row['nom']

        ];
        array_push($releves_array, $releves_data);
    }
    echo json_encode($releves_array);
} else {
    echo json_encode(['message' => 'No post found']);
}