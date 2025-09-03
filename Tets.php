<?php
// نوع پاسخ JSON
header('Content-Type: application/json');

// بررسی ارسال داده‌ها
if(isset($_POST['ip'], $_POST['port'], $_POST['username'], $_POST['password'])) {
    $ip = $_POST['ip'];
    $port = $_POST['port'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // --- اینجا می‌تونی داده‌ها رو ذخیره کنی ---
    // مثال: ذخیره در فایل متنی (هر خط یک رکورد)
    $dataLine = $ip . "," . $port . "," . $username . "," . $password . "\n";
    file_put_contents("data.txt", $dataLine, FILE_APPEND | LOCK_EX);

    // پاسخ موفقیت به C#
    $response = array(
        "status" => "success",
        "message" => "Data saved successfully!",
        "ip" => $ip,
        "port" => $port,
        "username" => $username
    );
} else {
    // اگر پارامترها ناقص باشند
    $response = array(
        "status" => "error",
        "message" => "Missing parameters"
    );
}

// برگرداندن پاسخ JSON
echo json_encode($response);
?>
