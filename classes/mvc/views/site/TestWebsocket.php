<?php


namespace mvc_router\mvc\views\pizzygo;


use mvc_router\mvc\View;

class TestWebsocket extends View {
	public function render(): string {
		return "<!DOCTYPE html>
<html lang='{$this->translate->get_default_language()}'>
<head>
	<meta charset='UTF-8'>
	<title>Websocket test</title>
</head>
<body>
	<script>
		// Then some JavaScript in the browser:
		let conn = new WebSocket('ws://localhost:2108/chat');
		conn.onmessage = e => document.write(e.data + '<br>');
		conn.onopen = () => {
			conn.send('Hello Me!');
			conn.send('coucou');
		};
	</script>
</body>
</html>";
	}
}