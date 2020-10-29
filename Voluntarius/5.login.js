function makeRed(inputDiv){
	inputDiv.style.backgroundColor = "red";
	inputDiv.parentNode.style.color = "red";
}

function makeClean (inputDiv) {
	inputDiv.style.backgroundColor = "white";
	inputDiv.parentNode.style.backgroundColor = "white";
	inputDiv.parentNode.style.color = "black";
}

function isBlank(inputDiv){
	if (inputDiv.type == "checkbox"){
		if(inputDiv.checked){
			return false;
		}
		return true;
	}
	if (inputDiv.value == ""){
		return true;
	}
	return false;
}

window.onload = function() {
	var mainForm = document.getElementById("mainForm");
	
	var requiredInputs = document.querySelectorAll(".required")
	for (var i = 0; i < requiredInputs.length ; i++ ){
			requiredInputs[i].onfocus = function (){
			this.style.backgroundColor = "yellow";
		}
	}
	mainForm.onsubmit = function(e){
		var requiredInputs = document.querySelectorAll(".required")
		for (var i = 0; i < requiredInputs.length ; i++ ){
			if (isBlank(requiredInputs[i])){
				e.preventDefault(); //tell browser not to submit the form.
				makeRed(requiredInputs[i]);
			}
			else{
				makeClean(requiredInputs[i]);
			}
		}
	}
}