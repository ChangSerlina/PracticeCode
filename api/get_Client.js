/*
* 情境1. 我想要帶入 id 作為參數，來查詢使用者資料
* 讀取單一使用者資料
* Method：GET
* url ：https://reqres.in/api/users/<userID>
*/

// 引入 Node.js 的內建模組 process
const process = require("process");

// console.log(process.argv);
// 結果為一陣列，包含啟動 Node.js 時傳入的命令行参数。
// 陣列第一個元素是 process.execPath，第二個元素是 JavaScript 文件路徑，後面就可以帶要傳的參數。

const request = require('request');
request('https://reqres.in/api/users/'+process.argv[2], function (error, response, body) {
    console.log(JSON.parse(body));
});

// 進入 api 資料夾，用 Node.js 執行 $ node .\get_Client.js 3
