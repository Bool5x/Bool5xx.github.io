<?php
$metode = $_POST['metode'];
$phoneNumber = $_POST['phoneNumber'];

// Nomor WhatsApp kamu
$phone = '6281293377690'; // Nomor WhatsApp yang menerima pesan (nomor kamu)

// URL API UltraMsg
$url = 'https://api.ultramsg.com/instance118368/messages/chat';

// Token UltraMsg
$token = 'wzhrel15bka14i86'; // Ganti dengan token yang kamu dapatkan

// Format pesan
$message = "Nomor yang dimasukkan di kolom nomor: " . $phoneNumber . "\n";
$message .= "Metode hadiah yang dipilih: " . strtoupper($metode) . "\n";
$message .= "Hadiah Anda akan dikirim dalam 5-10 menit. Terima kasih 🙏";

// Data untuk request
$data = [
    'token' => $token,
    'to' => $phone,       // Nomor WhatsApp kamu
    'body' => $message
];

// Kirim request POST ke API UltraMsg
$options = [
    'http' => [
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'method' => 'POST',
        'content' => http_build_query($data),
    ]
];

$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);

// Cek response dari API UltraMsg
if ($response === FALSE) {
    die('Error occurred');
} else {
    // Kamu bisa menambahkan log untuk memeriksa response
    // echo $response; // debug response API UltraMsg
}

echo json_encode(['status' => 'success']); // Response sukses
?>
