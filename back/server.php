<?php
$host = 'localhost';
$username = 'root'; 
$password = ''; 
$dbname = 'quiz_responses'; 

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(200);
    exit;
}

header("Content-Type: application/json");

$correct = [
    'questOne' => '2',
    'questTwo' => '2',
    'questThree' => ''
];

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $data = json_decode(file_get_contents("php://input"), true);

    if (!$data || !isset($data['questOne']) || !isset($data['questTwo']) || !isset($data['questThree'])) {
        echo json_encode(["error" => "Dados inválidos"]);
        exit;
    }

    $answers = [
        "questOne" => $data['questOne'] ?? '',
        "questTwo" => $data['questTwo'] ?? '',
        "questThree" => $data['questThree'] ?? ''
    ];

    $correctAnswers = 0;
    $incorrectAnswers = 0;
    $noAnswers = 0;

    foreach ($answers as $key => $answer) {
        if ($key === 'questThree') {
            if ($answer === '') {
                $noAnswers++;
            } else {
                $correctAnswers++;
            }
        } else {
            if ($answer === '') {
                $noAnswers++;
            } elseif ($answer === $correct[$key]) {
                $correctAnswers++;
            } else {
                $incorrectAnswers++;
            }
        }
    }

    $total = count($correct);
    $percentageCorrect = round(($correctAnswers / $total) * 100, 1);
    $percentageErrors = round(($incorrectAnswers / $total) * 100, 1);
    $percentageNoAnswers = round(($noAnswers / $total) * 100, 1);

    $stmt = $conn->prepare("INSERT INTO responses (questOne, questTwo, questThree, correctAnswers, incorrectAnswers, noAnswers, percentageCorrect, percentageErrors, percentageNoAnswers) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiiiddd", $answers['questOne'], $answers['questTwo'], $answers['questThree'], $correctAnswers, $incorrectAnswers, $noAnswers, $percentageCorrect, $percentageErrors, $percentageNoAnswers);

    if ($stmt->execute()) {
        echo json_encode([
            "correctAnswers" => $correctAnswers,
            "noAnswers" => $noAnswers,
            "incorrectAnswers" => $incorrectAnswers,
            "percentage" => [
                "correct" => $percentageCorrect,
                "noAnswers" => $percentageNoAnswers,
                "errors" => $percentageErrors
            ]
        ]);
    } else {
        echo json_encode(["error" => "Erro ao salvar no banco de dados"]);
    }

    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $result = $conn->query("SELECT * FROM responses");

    $responses = [];
    while ($row = $result->fetch_assoc()) {
        $responses[] = $row;
    }

    echo json_encode(["responses" => $responses]);
}

$conn->close();
?>
