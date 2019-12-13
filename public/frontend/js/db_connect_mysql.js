var mysql = require('mysql');
 
console.log('Get connection ...');
 
var conn = mysql.createConnection({
  database: 'laptop',
  host: "localhost",
  user: "root",
  password: ""
});
 
// conn.connect(function(err) {
//   if (err) throw err;
//   console.log("Connected!");
// });
conn.connect(function(err) {
    if (err) throw err;
    conn.query("SELECT * FROM tbl_admin", function (err, result, fields) {
      if (err) throw err;
      console.log(result);
    });
  });
module.exports = conn;