var serialport = require('serialport');
var SerialPort = serialport.SerialPort;
const fs = require('fs');

var http = require('http');

fs.readFile('index.html', function (err, html) {
    if (err) {
        throw err; 
    }       
    http.createServer(function(request, response) { 
        response.writeHeader(200, {"Content-Type": "text/html"});  // <-- HERE!
        response.write(html);  // <-- HERE!
        response.end();  
    }).listen(1337, '127.0.0.1');
});

// get port name from the command line:
portName = process.argv[2]; 

//init websockets
var WebSocketServer = require('ws').Server;
//start websocket server
var SERVER_PORT = 8082;               // port number for the webSocket server
var wss = new WebSocketServer({port: SERVER_PORT}); // the webSocket server
var connections = new Array;          // list of connections to the server

var port = new SerialPort('/dev/cu.usbmodem1411', { baudRate:9600, autoOpen: false,
// look for return and newline at the end of each data packet:
   parser: serialport.parsers.readline("\n")  });

function showPortOpen() {
   console.log('port open. Data rate: ' + port.options.baudRate);
}
function sendSerialData(data) {
   console.log(data);
}
function showPortClose() {
   console.log('port closed.');
} 
function showError(error) {
   console.log('Serial port error: ' + error);
}

//websocket event listeners
wss.on('connection', handleConnection);
 
function handleConnection(client) {
 console.log("New Connection"); // you have a new client
 connections.push(client); // add this client to the connections array
 
 client.on('message', sendToSerial); // when a client sends a message,
 
 client.on('close', function() { // when a client closes its connection
 console.log("connection closed"); // print it out
 var position = connections.indexOf(client); // get the client's position in the array
 connections.splice(position, 1); // and delete it from the array
 });
}

//send data to arduino
function sendToSerial(data) {
 console.log("sending to serial: " + data);
 port.write(data);
}

// This function broadcasts messages to all webSocket clients
function broadcast(data) {
 for (myConnection in connections) {   // iterate over the array of connections
  connections[myConnection].send(data); // send the data to each connection
 }
}

//port functions
port.open(function (err) {
  if (err) {
    return console.log('Error opening port: ', err.message);
  }
  // write errors will be emitted on the port since there is no callback to write
  port.write('Port is Open!');
});

var userPass = [];

// the open event will always be emitted
port.on('data', function (data) {
	//Create Data Array
	var newData = [];
  	newData += data;
  	return newData;
});






