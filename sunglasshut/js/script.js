function formValidation(theForm){

	theForm.noValidate = true;

	theForm.addEventListener("submit", function(evt){

		var isError = false;

		var formElements = this.elements;

		for (var i=0; i < formElements.length; i++) {

			var field = formElements[i];

			if ( ! isFieldValid(field)){
				isError = true;
			}	
		}
		
		if (isError){
			evt.preventDefault();
		}
	});

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
				
			if (field.type ==="email" && ! isEmail(field.value)) {

				errorMessage = "Please enter a valid email address.";
			}

			
			if (field.required && field.value.trim() === "") {

				errorMessage = "This field is required.";

			}if (errorMessage !== "") {
		
				field.classList.add('invalid');

				var errorSpan = document.querySelector("#" + field.id + "-error");
				errorSpan.innerHTML = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> ' + errorMessage;
				errorSpan.classList.add("warning");

				return false;
			}
				return true;
			
}
	function needsToBeValidated(field){
		var skipElements = ['button','submit'];
		if(skipElements.indexOf(field.type) === -1){
			return true;
		} else {
			return false;
		}
	}
	function isEmail(input){

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


// ****************************     scroll    *************************



var scrollY = 0;
var distance = 40;
var speed = 20;

function autoScrollTo(el){
	var currentY = window.pageYOffset;
	var targetY = document.getElementById(el).offsetTop;
	var bodyHeight = document.body.offsetHeight;
	var yPos = currentY + window.innerHeight;
	var animator = setTimeout('autoScrollTo(\''+el+'\')',speed);
	if (yPos > bodyHeight) {
			clearTimeout(animator);
	} else {
		if (currentY < targetY-distance) {
				scrollY = currentY+distance;
				window.scroll(0, scrollY);
		} else {
			clearTimeout(animator);
		}
	}
}



// ****************************     map    *************************



function initMap() {

	var theDiv = document.querySelector('#map-1');

	// data on Te papa
	var sunglassHutData = {
		lat: -41.286576,
		lng: 174.776012
	};

	var mapOptions = {
		zoom: 15,
		center: sunglassHutData
	};

	// create map
	var theMap = new google.maps.Map(theDiv, mapOptions);

	//options for the te papa marker
	var sunglassHutMarkerOptions = {
		position: sunglassHutData,
		map: theMap,
		// icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
	};

	// now we can create markers
	var sunglassHutMarker = new google.maps.Marker(sunglassHutMarkerOptions);

	// find out the users location
	// make sure the device has geolocation capabilities
	if (navigator.geolocation) {

		// yes the device has geolocation capabilities

		// ask user for their location
		navigator.geolocation.getCurrentPosition(function(position){

			console.log(position);

			var userData = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};

			// prepare the user marker
			var userMarkerOptions = {
				position: userData,
				map: theMap
			};

			// create an marker for the user
			var userMarker = new google.maps.Marker(userMarkerOptions);

			// Drop the icon in
			userMarker.setAnimation(google.maps.Animation.DROP);

			// focus on the users location
			theMap.panTo(userData);

					// prepare the nerd
		var directionsService = new google.maps.DirectionsService();

		// prepare the artist
		var directionsDisplay = new google.maps.DirectionsRenderer();

		// tell the artist which map to paint on
		directionsDisplay.setMap(theMap);

		// direction settings
		var directionSettings = {
			origin: userData,
			destination: sunglassHutData,
			travelMode: google.maps.TravelMode['DRIVING'] //DRIVING, BICYCLING, TRANSIT, WALKING
		};

		// do the calculations
		directionsService.route(directionSettings, function(response, status){
			// once the math is complete
			if (status == 'OK') {
				//tell the artist to draw on the map
				directionsDisplay.setDirections(response);
			}
		});

		});

	} else {
		// no!!
	}



}



