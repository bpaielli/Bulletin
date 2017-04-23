// Gets zip codes based on user ip from https://ipinfo.io/json
getZip();

function getZip() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var locationInfo = JSON.parse(xhttp.responseText);
			var zipCode = locationInfo["postal"];
			var isZip = (/^\d{5}$/.test(zipCode));
			
			if (isZip)
				document.getElementById("location").innerHTML = "Location: " + zipCode;
			else
				document.getElementById("location").innerHTML = "Location: Enter Postal Code";
		}
		else{
			document.getElementById("location").innerHTML = "Location: Enter Postal Code";
		}
	}
	xhttp.open("GET", "https://ipinfo.io/json", true);
	xhttp.send();
}