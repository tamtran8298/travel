var io= require('socket.io')(9876);

io.on('connection', function(socket){
	console.log(`Mot ket noi moi co id: ${socket.id}`);
	socket.on("client-sent-data",function(data){
		// console.log(data);
		socket.broadcast.emit("server-sent-data",data);
	});
});
io.on('error',function(socket){
	console.log('error');
});