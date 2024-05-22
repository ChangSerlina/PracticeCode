<?php
// 獲取當前文件的完整路徑
$file_path = __FILE__;

// 使用 pathinfo 函數獲取文件的相關信息
$file_info = pathinfo($file_path);

// 獲取不包含副檔名的檔名
$file = $file_info['filename'];

// 要渲染的模板
$templateFile = './template/'.$file.'.tpl';

// 定義變數
$name = 'John';
$age = 30;
$variables = [
    'name' => $name,
    'age' => $age,
    'templateFile' => $templateFile,
];

$output = renderTemplate($templateFile, $variables);

// 輸出结果
echo $output;

function renderTemplate($templateFile, $variables) {
    // 讀取模板文件内容
    $templateContent = file_get_contents($templateFile);
    
    // 替换占位符
    foreach ($variables as $key => $value) {
        $templateContent = str_replace('{{' . $key . '}}', $value, $templateContent);
    }
    
    return $templateContent;
}
?>