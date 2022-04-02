<script>
	/*
		Mouse right click is disabled on this page as well as the Ctrl + Shift + I, Ctrl+ Shift + J, Ctrl + S, Ctrl + U, and F12 key. 
		*/
	window.onload = function () {
		document.addEventListener("contextmenu", function (e) {
			e.preventDefault();
		}, false);
		document.addEventListener("keydown", function (e) {
			//document.onkeydown = function(e) {
			// "I" key
			if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
				threat = 'CTRL + SHIFT + I';
				disabledEvent(e);
			}
			// "C" key
			if (e.ctrlKey && e.shiftKey && e.keyCode == 67) {
				threat = 'CTRL + SHIFT + C';
				disabledEvent(e);
			}
			// "J" key
			if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
				threat = 'CTRL + SHIFT + J';
				disabledEvent(e);
			}
			// "S" key + macOS
			if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
				threat = 'CTRL + S';
				disabledEvent(e);
			}
			// "U" key
			if (e.ctrlKey && e.keyCode == 85) {
				threat = 'CTRL + U';
				disabledEvent(e);
			}
			// "F12" key
			if (event.keyCode == 123) {
				threat = 'F12';
				disabledEvent(e);
			}
			// "CTRL + ALT + U"
			if ((navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey) && e.altKey && e.keyCode == 85) {
				threat = 'CTRL + ALT + U';
				disabledEvent(e);
			}
			// "CTRL + ALT + I"
			if ((navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey) && e.altKey && e.keyCode == 73) {
				threat = 'CTRL + ALT + I';
				disabledEvent(e);
			}
		}, false);

		function disabledEvent(e) {
			if (e.stopPropagation) {
				e.stopPropagation();
			} else if (window.event) {
				window.event.cancelBubble = true;
			}
			e.preventDefault();
			return false;
		}
	};
</script>

<noscript>
	<h3> You must have JavaScript enabled in order to use this order form. Please
		enable JavaScript and then reload this page in order to continue. </h3>
	<meta HTTP-EQUIV="refresh" content=0;url="http://pce.petra.ac.id/bc/assets/protection/js_disabled.php">
</noscript>