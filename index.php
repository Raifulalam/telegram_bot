<?php
$botToken = "7637023353:AAG1I_WTJ2fELd-xiiDi1GA2n8r1u1iKhDM";
$website = "https://api.telegram.org/bot" . $botToken;

$update = file_get_contents("php://input");
$update = json_decode($update, TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

if ($message == "/start") {
    $response = "Hello! 👋 Welcome to LifeCode Bot.\n\nType /help to see commands.";
} elseif ($message == "/help") {
    $response = "Available commands:\n/start - Welcome message\n/hello - Say hello";
} elseif ($message == "/hello") {
    $response = "Hi there! 😎 How can I help you today?";
} else {
    $response = "I didn't understand 🤖 Try /help";
}

file_get_contents($website . "/sendMessage?chat_id=" . $chatId . "&text=" . urlencode($response));
?>
