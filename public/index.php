<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebSocket Test</title>
</head>
<body>
<h1>WebSocket Test</h1>

<div id="data"></div>

<script>
    const dataDiv = document.getElementById('data');
    const socket = new WebSocket('ws://127.0.0.1:9501');

    socket.addEventListener('open', function (event) {
        console.log('Conectado ao servidor WebSocket');
    });

    socket.addEventListener('message', function (event) {
        const message = document.createElement('div');
        message.textContent = event.data;
        dataDiv.appendChild(message);
    });

    socket.addEventListener('error', function (event) {
        console.error('Erro no WebSocket:', event);
    });

    socket.addEventListener('close', function (event) {
        console.log('Conexão fechada:', event);
    });
</script>
</body>
</html>