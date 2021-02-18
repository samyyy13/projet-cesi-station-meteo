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
    $releve_id = filter_var($_GET['id'], FILTER_VALIDATE_INT, [
        'options' => [
            'default' => 'all_posts',
            'min_range' => 1
        ]
    ]);
} else {
    $releve_id = 'all_posts';
}

$sql = is_numeric($releve_id) ? "SELECT * FROM `releves` WHERE id='$releve_id'" : "SELECT * FROM `releves`";

$stmt = $conn->prepare($sql);

$stmt->execute();

if ($stmt->rowCount() > 0) {
    $releves_array = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $releves_data = [
            'id' => $row['id'],
            'id_sonde' => $row['id_sonde'],
            'temperature' => html_entity_decode($row['temperature']),
            'created_at' => $row['created_at'],
            'humidite' => $row['humidite']

        ];
        array_push($releves_array, $releves_data);
    }
    echo json_encode($releves_array);
} else {
    echo json_encode(['message' => 'No post found']);
}