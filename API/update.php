<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: PUT");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require 'database.php';
$db_connection = new Database();
$conn = $db_connection->dbConnection();

$data = json_decode(file_get_contents("php://input"));

if (isset($data->id)) {

    $msg['message'] = '';
    $releve_id = $data->id;

    $get_releve = "SELECT * FROM `releves` WHERE id=:releve_id";
    $get_stmt = $conn->prepare($get_releve);
    $get_stmt->bindValue(':releve_id', $releve_id, PDO::PARAM_INT);
    $get_stmt->execute();


    if ($get_stmt->rowCount() > 0) {

        $row = $get_stmt->fetch(PDO::FETCH_ASSOC);

        $releve_temperature = isset($data->temperature) ? $data->temperature : $row['temperature'];
        $releve_humidite = isset($data->humidite) ? $data->humidite : $row['humidite'];

        $update_query = "UPDATE `releves` SET temperature = :temperature, humidite = :humidite, modified_at = :modified_at 
        WHERE id = :id";

        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bindValue(':temperature', htmlspecialchars(strip_tags($releve_temperature)), PDO::PARAM_INT);
        $update_stmt->bindValue(':humidite', htmlspecialchars(strip_tags($releve_humidite)), PDO::PARAM_INT);
        $update_stmt->bindValue(':modified_at', date("d-m-Y H:i:s"));
        $update_stmt->bindValue(':id', $releve_id, PDO::PARAM_INT);


        if ($update_stmt->execute()) {
            $msg['message'] = 'Data updated successfully';
        } else {
            $msg['message'] = 'data not updated';
        }
    } else {
        $msg['message'] = 'Invlid ID';
    }

    echo  json_encode($msg);
}else {
    echo 'pas de id';
}