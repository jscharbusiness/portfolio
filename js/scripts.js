$(window).on('load', function(){

	// $('.menu').hide();

	if ($(window).width() > 974) {

		$('#inBody').hide();

	}

	// Add smooth scrolling to all links
	$("a").on('click', function(event) {

	    // Make sure this.hash has a value before overriding default behavior
	    if (this.hash !== "") {
			// Prevent default anchor click behavior
			event.preventDefault();

			// Store hash
			var hash = this.hash;

			$('html, body').animate({

				scrollTop: $(hash).offset().top

			}, 500, function() {
			// window.location.hash = hash;
			});

	    }

	});
});

$(document).ready(function() {

	var didScroll;
	var lastScrollTop = 0;
	var delta = 5;
	var navbarHeight = 60; //was causing issues when dynamic: $('html').innerHeight(); because window didnt load height until after

	$(window).scroll(function(event){
	    didScroll = true;

	    var headerHeight = $('#header').height();
	    // alert(headerHeight);

	    if ($(window).width() > 974) {

	    	if($(window).scrollTop() <= headerHeight ) {

			    $('#inHeader').fadeIn();
			    $('#inBody').fadeOut();

			} else {

			    $('#inHeader').fadeOut();
			    $('#inBody').fadeIn();

			}

	    }

	});

	$('.menu').click(function menuAnimate() {

		if ($(window).width() < 974) {

			$('.menu').toggleClass("change");
			$('#bodyU1').slideToggle(300);

		} else {

			$('#bodyU1').show();

		}

	});

	$('.closeMenu').click(function menuAnimate() {

		if ($(window).width() < 974) {

			$('.menu').toggleClass("change");
			$('#bodyU1').slideToggle(300);

		} else {

			$('#bodyU1').show();

		}

	});

	$('.projectInfoButton').click(function() {

		$(this).parent().next().children('div:nth-of-type(1)').fadeToggle();
		$(this).parent().next().children('div:nth-of-type(2)').fadeToggle();

	});

	$( window ).resize(function() {

		if ($(window).width() > 974) {

			$('#inBody').hide();
			$('#bodyU1').show();

		} else {

			$('#inBody').show();
			$('#bodyU1').hide();
			// $('#bodyU1').show();

			// if ($(window).width() < 974) {

			// 	$('#bodyU1').hide();

			// }

		}

	});

	$("#submit").click(function(){

			var error = $("#error");
			var success = $("#success");

			$.ajax({
				type: "POST",
				url: "index.php?action=email",
				data: "&name=" + $("#name").val() + "&email=" + $("#email").val() + "&comments=" + $("#comments").val(),
				success: function(result) {

					if (result == "1") {

						error.hide();
						success.show();
						success.html("Thanks, I will get back to you soon!");

					} else if (result == "2") {

						error.show();
						success.hide();
						error.html("A name is required.");

						// $error = "A name is required.";

					} else if (result == "3") {

						error.show();
						success.hide();
						error.html("An email address is required.");

						// $error = "An email address is required.";

					} else if (result == "4") {

						error.show();
						success.hide();
						error.html("Please enter a valid email address.");

						// $error = "Please enter a valid email address.";

					} else if (result == "5") {

						error.show();
						success.hide();
						error.html("You don't want to send anything?");

						// $error = "You don't want to send anything?";

					} else {

						error.show();
						success.hide();
						error.html("Sorry, something went wrong! Please try again later!");

					}

				}
			});

		});

	[].forEach.call(document.querySelectorAll('img[data-src]'),    function(img) {
		img.setAttribute('src', img.getAttribute('data-src'));
		img.onload = function() {
			img.removeAttribute('data-src');
		};
	});

	function mainBGImage(x) {
    	if (x.matches) { // If media query matches
	        document.getElementById('header').style.backgroundImage = "url(./images/mainPic900.png)";
	    } else {
	        document.getElementById('header').style.backgroundImage = "url(./images/mainPic1200.png)";
	    }
	}

	var x = window.matchMedia("(max-width: 990px)");
	mainBGImage(x); // Call listener function at run time
	x.addListener(mainBGImage);

	
});