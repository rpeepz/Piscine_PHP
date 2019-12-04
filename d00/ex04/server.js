var http = require('http');
var fs = require('fs');

const PORT=8000;
http.createServer(function(req, res) {
  if (req.url === '/') {
    fs.readFile('menu.html', function (err, data) {
      if (err) throw err;
      res.writeHeader(200, {"Content-Type": "text/html"});
      res.write(data);
      res.end();
    });
  }
  else if (req.url === '/menu.css') {
    fs.readFile('menu.css', function(err, data) {
      if (err) throw err;
      res.writeHead(200, {'Content-Type': 'text/css'});
      res.write(data);
      res.end();
    });
  }
}).listen(PORT);