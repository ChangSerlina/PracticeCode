/*
* 情境2. 我想要新增使用者資料
* 新增單筆或多筆使用者資料
* Method：POST
* url ：https://reqres.in/api/users/
*/

// request supports application/x-www-form-urlencoded and multipart/form-data form uploads.
const request = require('request');

// 新增單筆使用者資料 application/x-www-form-urlencoded
// 這邊只是測試用，並不會真的新增資料。

/**
 * sample:
 * request.post('http://service.com/upload', {form:{key:'value'}})
 * or
 * request.post('http://service.com/upload').form({key:'value'})
 * or
 * request.post({url:'http://service.com/upload', form: {key:'value'}}, function(err,httpResponse,body){ /... / })
 */

// 以第三種來測試新增單筆資料
request.post({url:'https://reqres.in/api/users/',
        form: {
            id:'10',
            email:'test@test',
            first_name:'test1',
            last_name:'test2',
            avatar: 'https://reqres.in/img/faces/5-image.jpg'
        }
    },
        function(err,httpResponse,body){
            console.log(JSON.parse(body));
    }
)

// 新增多筆使用者資料 multipart/form-data
// 這邊只是測試用，並不會真的新增資料。

/**
 * simple:
 * const formData = {
    // Pass a simple key-value pair
    my_field: 'my_value',
    // Pass data via Buffers
    my_buffer: Buffer.from([1, 2, 3]),
    // Pass data via Streams
    my_file: fs.createReadStream(__dirname + '/unicycle.jpg'),
    // Pass multiple values /w an Array
    attachments: [
      fs.createReadStream(__dirname + '/attachment1.jpg'),
      fs.createReadStream(__dirname + '/attachment2.jpg')
    ],
    // Pass optional meta-data with an 'options' object with style: {value: DATA, options: OPTIONS}
    // Use case: for some types of streams, you'll need to provide "file"-related information manually.
    // See the `form-data` README for more information about options: https://github.com/form-data/form-data
    custom_file: {
      value:  fs.createReadStream('/dev/urandom'),
      options: {
        filename: 'topsecret.jpg',
        contentType: 'image/jpeg'
      }
    }
  };
  request.post({url:'http://service.com/upload', formData: formData}, function optionalCallback(err, httpResponse, body) {
    if (err) {
      return console.error('upload failed:', err);
    }
    console.log('Upload successful!  Server responded with:', body);
  });
 * 
 */ 
