<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require 'database.php';
$db_connection = new Database();
$conn = $db_connection->dbConnection();

$data = json_decode(file_get_contents("php://input"));


if (isset($data->id)) {
    $msg['message'] = '';

    $releve_id = $data->id;

  $check_releve = "SELECT * FROM `releves` WHERE id=:releve_id";
  $check_releve_stmt = $conn->prepare($check_releve);
  $check_releve_stmt->bindValue(':releve_id', $releve_id, PDO::PARAM_INT);
  $check_releve_stmt->execute();

    if ($check_releve_stmt->rowCount() > 0) {

        $dcheck_releve = "DELETE FROM `releves` WHERE id=:releve_id";
        $dcheck_releve_stmt = $conn->prepare($dcheck_releve);
        $dcheck_releve_stmt->bindValue(':releve_id', $releve_id, PDO::PARAM_INT);

        if ($dcheck_releve_stmt->execute()) {
            $msg['message'] = 'Post Deleted Successfully';
        } else {
            $msg['message'] = 'Post Not Deleted';
        }
    } else {
        $msg['message'] = 'Invlid ID';
    }

    echo  json_encode($msg);
}