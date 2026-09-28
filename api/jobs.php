<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Dummy Database Connection
// $pdo = new PDO("mysql:host=localhost;dbname=smart_recruitment", "root", "");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Fetch jobs
        // $stmt = $pdo->query("SELECT * FROM jobs");
        // $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(["status" => "success", "message" => "Fetched jobs", "data" => []]);
        break;
    case 'POST':
        // Create job
        $data = json_decode(file_get_contents("php://input"));
        // $stmt = $pdo->prepare("INSERT INTO jobs (title, role, skills, description) VALUES (?, ?, ?, ?)");
        // $stmt->execute([$data->title, $data->role, $data->skills, $data->description]);
        echo json_encode(["status" => "success", "message" => "Job created (pending approval)"]);
        break;
    case 'PUT':
        // Update job status (approve/delete)
        echo json_encode(["status" => "success", "message" => "Job status updated"]);
        break;
    default:
        http_response_code(405);
        echo json_encode(["status" => "error", "message" => "Method not allowed"]);
        break;
}
?>
