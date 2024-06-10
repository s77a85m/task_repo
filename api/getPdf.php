<?php

require_once '../vendor/autoload.php';
require_once '../vendor/convertapi/convertapi-php/lib/ConvertApi/autoload.php';
use ConvertApi\ConvertApi;
$url = "http://127.0.0.1/test_khatRoshan/getcontent/curl_file.php";
//
$curl = curl_init();

$productId = $_GET["productId"];

$data = array(
    'productId' => $productId,
);
curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => $data,
]);

$resultt = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

// save file html
$tempFile = tempnam(sys_get_temp_dir(), 'html_').'.html';
file_put_contents($tempFile, $resultt);

ConvertApi::setApiSecret('SLvRGJvDlS00zchl');
$result = ConvertApi::convert('pdf', [
    'File' => $tempFile,
], 'html'
);
// دریافت فایل PDF تبدیل شده
$pdfFile = $result->getFile()->fileInfo['Url'];

// تنظیم هدرهای HTTP برای دانلود خودکار فایل PDF


header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="converted_file.pdf"');

readfile($pdfFile); // یا استفاده از getUrl() برای URL فایل

// حذف فایل موقت
unlink($tempFile);



