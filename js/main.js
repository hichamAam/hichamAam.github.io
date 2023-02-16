// Login Validation

function validateForm() {
var userinput = document.getElementById("Username").value;
var passinput = document.getElementById("Password").value;

if (userinput == "" && passinput == "") {

    document.getElementById("Username").style.borderColor = "red";
    document.getElementById("Username").style.backgroundColor = "#ffdddd";
    document.getElementById("userInvalid").style.display = "unset";
    
    document.getElementById("Password").style.borderColor = "red";
    document.getElementById("Password").style.backgroundColor = "#ffdddd";
    document.getElementById("passInvalid").style.display = "unset";

    return false;
}else if (passinput == "") {

    document.getElementById("Password").style.borderColor = "red";
    document.getElementById("Password").style.backgroundColor = "#ffdddd";
    document.getElementById("passInvalid").style.display = "unset";
    return false;

}else if (userinput == "") {
    
    document.getElementById("Username").style.borderColor = "red";
    document.getElementById("Username").style.backgroundColor = "#ffdddd";
    document.getElementById("userInvalid").style.display = "unset";
    return false;
}
return true;
}

// End Login Validation

(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

})(jQuery);

// Get the logo element by its ID
const title = document.getElementById('title');
const logo = document.getElementById('logo');

// Get the button element by its ID
const button = document.getElementById('sidebarCollapse');


button.addEventListener('click', function() {
  
  if (title.style.display === 'block') {   
    title.style.display = 'none';
    logo.style.display = 'block';
    
  } else {
    title.style.display = 'block';
    logo.style.display = 'none';
  }
});
