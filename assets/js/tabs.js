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