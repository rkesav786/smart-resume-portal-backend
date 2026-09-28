<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

// Dummy parsing logic
// In a real application, you would use NLP libraries or APIs to parse the uploaded file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['resume']) && isset($_POST['job_id'])) {
        $file = $_FILES['resume'];
        $jobId = $_POST['job_id'];

        // Simulate parsing delay and logic
        $mockScore = rand(40, 100);
        $mockSkills = "Parsed, Skills, Here";

        // Save to DB...

        echo json_encode([
            "status" => "success", 
            "message" => "Resume uploaded and parsed successfully",
            "data" => [
                "matchScore" => $mockScore,
                "skillsMatched" => $mockSkills
            ]
        ]);
    } else {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "Invalid input"]);
    }
} else {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Method not allowed"]);
}
?>
