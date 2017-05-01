document.getElementById("home").click();

function openPage(tabName) {
    var i, boardcontent, sectionl;
    boardcontent = document.getElementsByClassName("boardcontent");
    for (i = 0; i < boardcontent.length; i++) { 
    	boardcontent[i].style.display = "none";
    }
    sectionl = document.getElementsByClassName("sectionl");
    for (i = 0; i < sectionl.length; i++) {
    	sectionl[i].className = sectionl[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    event.currentTarget.className += " active";
}

function offeringSeekingSelection(pick) {
    var i, postType, pickerbutton;
    postType = document.getElementsByClassName("createposttemplate");
    for (i = 0; i < postType.length; i++) { 
    	postType[i].style.display = "none";
    }
    pickerbutton = document.getElementsByClassName("pickerbutton");
    for (i = 0; i < pickerbutton.length; i++) {
    	pickerbutton[i].className = pickerbutton[i].className.replace(" active", "");
    }
    document.getElementById(pick).style.display = "block";
    document.getElementById("createpostoptions").style.display = "block";
    event.currentTarget.className += " active";
}

function sleep(milliseconds) {
	var start = new Date().getTime();
	for (var i = 0; i < 1e7; i++) {
		if ((new Date().getTime() - start) > milliseconds) {
			break;
		}
	}
}