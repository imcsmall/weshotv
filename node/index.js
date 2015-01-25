var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var mysql = require('mysql');

app.get('/', function(req, res){
  res.sendfile('index.html');
});

io.on('connection', function(socket){
  socket.on('send ad', function(msg){
    io.emit('send ad', msg);
  });
});

io.on('connection', function(socket){
  socket.on('play ad', function(msg){
    io.emit('play ad', msg);
  });
});

io.on('connection', function(socket){
  socket.on('bcast', function(msg){
    io.emit('bcast', msg);
  });
});

io.on('connection', function(socket){
  socket.on('addlive', function(msg){
    io.emit('addlive', msg);
  });
});

var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'wesho',
  password : 'Liveandlocal@weshosql',
  database : 'stream_vars'
});

connection.connect(function(err) {
  if (err) {
    console.error('error connecting mysql (check service mysqld & creds) or call ian.');
    return;
  }

  console.log('mysql ok. connected as id ' + connection.threadId + '.');
});
var post  = {id: 1, title: 'Hello MySQL'};
var query = connection.query('INSERT INTO posts SET ?', post, function(err, result) {
  // Neat!
});

http.listen(3000, function(){
  console.log('node ok. listening on 3000.');
});