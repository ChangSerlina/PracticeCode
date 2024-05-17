/*
* 練習api 丟request
* Ref: https://reurl.cc/jWW8X1
*/

// 前提：需確認已安裝 Node.js
// 新增並進入 api 資料夾
// 安裝 request 模組，執行：$ npm install request

const request = require('request');
request('https://reqres.in/api/users', function (error, response, body) {
    // console.error('error:', error); // Print the error if one occurred
    // console.log('statusCode:', response && response.statusCode); // Print the response status code if a response was received
    // console.log('body:', body); // Print the HTML for the Google homepage. http://www.google.com
    console.log('原始格式，JSON 格式的字串 — — — — — ');
    console.log(body);
    console.log('轉成 JS 物件 — — — — — — — — — — ');
    console.log(JSON.parse(body));
});

// 用 Node.js 執行：$ node .\client.js