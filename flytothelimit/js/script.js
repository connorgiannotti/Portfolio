var path = window.location.pathname;
var page = path.split("/").pop();
console.log( page );
page = page.replace(".html", "");
console.log( page );


// *************************    GALLERYPAGE    ********************************

if (page == "gallery"){
	var counter = 0;
	var allFigures = document.querySelectorAll("#slideshow figure");
	console.log(allFigures);
	var countFigures = allFigures.length;
	var prevButton = document.querySelector(".left img");
	var nextButton = document.querySelector(".right");
	var pagerList = document.querySelectorAll(".pager li");

	var pager = document.querySelectorAll(".selector");
	console.log(pagerList);

	prevButton.addEventListener("click", function(){
		console.log(prevButton);
		counter--;
		if (counter < 0) {
			counter = countFigures -1;
		}
		showFigure();
	}, false);

	nextButton.addEventListener("click", function(){
		counter++;
		showFigure();
	}, false);

	for (var i = 0; i < pager.length; i++) {
		
		pager[i].addEventListener("click", function(e){
			var child = e.target;
			var parent = child.parentNode;
			
		for (var i = 0; i < pagerList.length; i++) {
			if(pagerList[i].contains(parent)){
				var index = i;
			}
		}
			showFigure(index);
		}, false);
	}

function showFigure(childItem){
	
	if (childItem >= 0){
		var displayedFigure = childItem ;		
		counter = displayedFigure;
	} else {
		displayedFigure = Math.abs(counter % countFigures);
	}	
	for(var i=0; i < countFigures; i++){
		if(allFigures[i].classList.contains("show")){
			allFigures[i].classList.remove("show");
			break;
		}
	}
	allFigures[displayedFigure].classList.add('show');
}

}

// ***********************      BOOKNOWOVERLAY      ********************************


var button = document.querySelectorAll(".bookbtn");
console.log(button);
var closeButton = document.querySelector("#close");

for (var i = 0; i < button.length; i++) {
	button[i].addEventListener("click", overlay, false);
};
// button.addEventListener("click", overlay, false);
closeButton.addEventListener("click", overlay, false);

function overlay(){
	console.log("sjhcjav");
	var overlayElement = document.querySelector("#overlay");
	if (overlayElement.style.visibility == "visible") {
		overlayElement.style.visibility = "hidden";
	} else{
		overlayElement.style.visibility = "visible";
	}

}


// ***********************      BOOKNOW      ********************************


function formValidation(theForm){


	theForm.noValidate = true;


	theForm.addEventListener('blur', function(evt) {
			if(validateForm(theForm) === false){
	            evt.preventDefault();
	        } 
		}, true);

		theForm.addEventListener('submit', function(evt) {
			if(validateForm(theForm) === false){
	            evt.preventDefault();
	        } 
		}, true);

	function validateForm(theForm){
	    	// assume initially there are no errors
	        var isError = false;
	        // get elements from the form
	        var elements = theForm.elements;
	        // traverse through the array to get fields and check if it is valid
	         for (var i = 0; i < elements.length; i += 1) {
	            var isValid = isFieldValid(elements[i]);
	             if(isValid === false){
	                    isError = true;
	                }      
	         }
	         return ! isError;
	}
	function isFieldValid(field){

		var errorMessage = "";

		if (! needsToBeValidated(field)) {
			return true;
		}


		if (field.id.length === 0 || field.name.length === 0){
			console.error("error: ","field should have ID and Name attributes.");
			return false;
		}
		if (document.querySelector("#"+ field.id +"-error") === null) {
			console.error("error: ","A span field is missing.");
			return false;
		}


	
			field.classList.remove('invalid');
			var errorSpan = document.querySelector("#" + field.id + "-error");
			errorSpan.innerHTML = "";
			errorSpan.classList.remove("warning");


			if (field.type === "tel" && ! validPhoneNumber(field.value)) {
				console.log(field);
				errorMessage = "* Enter a valid phone number.";
			}

			if (field.type === "number" && field.min > 0 && field.value < parseInt(field.min)) {
				errorMessage = "Must be atleast " + field.min + " or greater.";
			}

			if (field.type === "number" && field.max > 0 && field.value > parseInt(field.max)) {
					errorMessage = "Must be atleast " + field.max + " or less.";
				}

			if (field.minLength > 0 && field.value.length < field.minLength) {
					errorMessage = "* Must be atleast " + field.minLength + " or more characters long.";
				}

		if (field.type === "email" && ! isEmail(field.value)) {

			errorMessage = "* Provide a proper email.";
			console.log(errorMessage);
		}

		if (field.required && field.value.trim() === "") {

			errorMessage = "* This field is required.";

		}

		if (errorMessage !== "") {

			field.classList.add('invalid');

			var errorSpan = document.querySelector("#" + field.id + "-error");
			console.log(errorSpan);
			errorSpan.innerHTML = errorMessage;

			errorSpan.classList.add("warning");

			return false;
		}
			return true;

	}
		function needsToBeValidated(field){
			var skipElements = ['button', 'submit'];
			if(skipElements.indexOf(field.type) === -1){
				return true;
			} else {
				return false;
			}
		}
		function isEmail(input){
		// console.log(input.match(/^([a-z0-9_.\-+]+)@([\da-z.\-]+)\.([a-z\.]{2,})$/));
		return input.match(/^([a-z0-9_.\-+]+)@([\da-z.\-]+)\.([a-z\.]{2,})$/);
		}
		function validPhoneNumber(input){
			console.log(input);
			var pattern =/[^\dA-Z]/g;
			var phonenum = input.replace(pattern, '');
			if (phonenum.length >6 && phonenum.length <15) {
				return true;
			}
		}
}


// ***********************      CONTACTPAGE      ********************************


