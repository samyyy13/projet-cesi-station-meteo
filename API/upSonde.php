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


    $msg['message'] = '';
    $sonde_id = $data->id;

    $get_releve = "SELECT * FROM `sonde` WHERE id=:sonde_id";
    $get_stmt = $conn->prepare($get_releve);
    $get_stmt->bindValue(':sonde_id', $sonde_id, PDO::PARAM_INT);
    $get_stmt->execute();


    if ($get_stmt->rowCount() > 0) {

        $row = $get_stmt->fetch(PDO::FETCH_ASSOC);

        $sonde_lieu = isset($data->lieu) ? $data->lieu : $row['lieu'];
        $sonde_nom = isset($data->nom) ? $data->nom : $row['nom'];

        $update_query = "UPDATE `sonde` SET lieu = :lieu, nom = :nom, modified_at = :modified_at 
        WHERE id = :id";

        $update_stmt = $conn->prepare($update_query);

        $update_stmt->bindValue(':lieu', htmlspecialchars(strip_tags($sonde_lieu)), PDO::PARAM_INT);
        $update_stmt->bindValue(':nom', htmlspecialchars(strip_tags($sonde_nom)), PDO::PARAM_INT);
        $update_stmt->bindValue(':modified_at', date("d-m-Y H:i:s"));
        $update_stmt->bindValue(':id', $sonde_id, PDO::PARAM_INT);


        if ($update_stmt->execute()) {
            $msg['message'] = 'Data updated successfully';
        } else {
            $msg['message'] = 'data not updated';
        }
    } else {
        $msg['message'] = 'Invlid ID';
    }

    echo json_encode($msg);
} else {
    echo 'pas de id';
}