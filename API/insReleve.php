<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require 'database.php';
$db_connection = new Database();
$conn = $db_connection->dbConnection();

$data = json_decode(file_get_contents("php://input"));

$msg['message'] = '';

if (isset($data->temperature) && isset($data->humidite) && isset($data->id_sonde)) {
    if (!empty($data->temperature) && !empty($data->humidite) && !empty($data->id_sonde)) {

        $insert_query = "INSERT INTO `releves`(temperature,humidite,id_sonde, created_at) VALUES(:temperature,:humidite,:id_sonde,:created_at)";

        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bindValue(':temperature', htmlspecialchars(strip_tags($data->temperature)), PDO::PARAM_INT);
        $insert_stmt->bindValue(':humidite', htmlspecialchars(strip_tags($data->humidite)), PDO::PARAM_INT);
        $insert_stmt->bindValue(':id_sonde', htmlspecialchars(strip_tags($data->id_sonde)), PDO::PARAM_INT);
        $insert_stmt->bindValue(':created_at', date("d-m-Y H:i:s"));

        if ($insert_stmt->execute()) {
            $msg['message'] = 'Data Inserted Successfully';
        } else {
            $msg['message'] = 'Data not Inserted';
        }
    } else {
        $msg['message'] = 'Oops! empty field detected. Please fill all the fields';
    }
} else {
    $msg['message'] = 'Please fill all the fields | temperature, humidite, id_sonde';
}
echo json_encode($msg);