/*
* 練習api 丟request
* Ref: https://reurl.cc/jWW8X1
*/

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