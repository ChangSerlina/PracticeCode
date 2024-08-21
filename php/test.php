<?php
use tpl\Tpl;
include_once('tpl.class.php');
$tpl = new Tpl(__DIR__ . '/template');
// 獲取當前文件的完整路徑
$file_path = __FILE__;

// 使用 pathinfo 函數獲取文件的相關信息
$file_info = pathinfo($file_path);

// 獲取不包含副檔名的檔名
$filename = $file_info['filename'];

// 要渲染的模板
$templateFile = $filename.'.tpl';

// 定義要渲染到.tpl的變數
$name = 'John';
$age = 30;
$variables = [
    'name'          => $name,
    'age'           => $age,
    'templateFile'  => $templateFile
];

$output = $tpl->render($templateFile, $variables);

// 輸出结果
echo $output;

?>