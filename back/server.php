<?php
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    echo json_encode([
        "input" => 10,
        "resultado" => 10
    ]);
}
