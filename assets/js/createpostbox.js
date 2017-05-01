// W3Schools

var cpbox = document.getElementById('createpostbox');

var createButton = document.getElementById("newpostbutton");

var close = document.getElementsByClassName("close")[0];

createButton.onclick = function() {
	cpbox.style.display = "flex";
}

close.onclick = function() {
	cpbox.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == cpbox) {
    	cpbox.style.display = "none";
    }
}