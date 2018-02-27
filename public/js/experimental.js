window.onload = function() {
  //document.getElementsByClassName("tab-link").addEventListener("click", changeActiveTab);
  var dummy = document.querySelector(".tab-link").addEventListener("click", changeActiveTab);
  console.log(dummy);
  };


function changeActiveTab(){
	var i, tabcontent, tablinks;
	
    tabcontent = document.getElementsByClassName("tab-content");
	tablinks = document.getElementsByClassName("tab-link");
	
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
	
    
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
		
    }
	
	this.className += " active";
	
	if(this.)
	document.getElementsByClass("tab-content").style.display = "block";
    
	
	
}