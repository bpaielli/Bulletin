
invalidLoginErr();

function invalidLoginErr() {
	
	var div = document.getElementById("loginErrMessage"); //div to change
	var xhttp = new XMLHttpRequest();
	
	xhttp.open("GET", "../scripts/controller.php", true);
	xhttp.send();
	
	xhttp.onreadystatechange = function() {
		 if (xhttp.readyState==4 && xhttp.status==200) {
				
			 div.innerHTML = "<strong>The email address or password you entered is not valid</strong>";
			 div.style.color = "#f01313";
			 div.style.paddingLeft = "2em";
			 div.style.paddingRight = "2em";
			 div.style.textAlign = "center";
			
			}

		 }
		 }

}
