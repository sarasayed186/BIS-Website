
// =====================NAVBAR====================
const seaCont = document.getElementById("top-search");
const serHide = document.getElementById("topsercross-icon");
const serShow = document.getElementById("ser-btn-icon");

serShow.addEventListener("click", () => {
	seaCont.style.padding = "5px 5%";
	seaCont.style.height = "50px";
	seaCont.style.transition = "all 0.5s";
});

serHide.addEventListener("click", () => {
	seaCont.style.height = "0";
	seaCont.style.padding = "0 5%";
})
// --------------Navbar Hide and Show----------
const barbtn = document.getElementById("bar-icon");
const dropdown = document.getElementById("menu");

barbtn.addEventListener("click", () => {
	dropdown.classList.toggle("show");
})
// ----------------submenu------------------
const droptog = document.querySelectorAll(".droptoggle");
const submenu = document.getElementsByClassName("submanu");

for (let x = 0; x < droptog.length; x++) {
	droptog[x].addEventListener("click", () => {
		submenu[x].classList.toggle("submenushow");
	});
}
// -------------sub-sub-dropdown--------------
const subsubtog = document.querySelectorAll(".sub-sub-drop");
const subSubMenu = document.getElementsByClassName("sub-sub-menu");
for (let y = 0; y < subsubtog.length; y++) {
	subsubtog[y].addEventListener("click", () => {
		subSubMenu[y].classList.toggle("show-sub-sub-menu");
	})
}

// =====================BACK-TO-TOP BUTTON====================
$(document).ready(() => {
	const backToTop = $('#backToTop')
	const amountScrolled = 300

	$(window).scroll(() => {
		$(window).scrollTop() >= amountScrolled
			? backToTop.fadeIn('fast')
			: backToTop.fadeOut('fast')
	})

	backToTop.click(() => {
		$('body, html').animate({
			scrollTop: 0
		}, 10)
		return false
	})
})



// ==================LOAD MORE (EVENT+NEWS+STAFF+ALBUM) =================

$(document).ready(function () {
	$('.hidden-card').hide();
	$('.hidden-card').each(function (index, value) {
		if (index < 9) {
			$(this).show();
		}
	});
	if ($('.hidden-card:hidden').length) {
		$('#load-btn').show();
	}
	if (!$('.hidden-card:hidden').length) {
		$('#load-btn').hide();
	}
});
$('#load-btn').on('click', function () {
	$('.hidden-card:hidden').each(function (index, value) {
		if (index < 6) {
			$(this).show(400);
		}
	});
	if (!$('.hidden-card:hidden').length) {
		$("#load-btn").text("No More Results").addClass("noresults");
	}
});
// ==================LOAD MORE (COUNCIL) =================
$(document).ready(function () {
	$('.council-hidden-card').hide();
	$('.council-hidden-card').each(function (index, value) {
		if (index < 6) {
			$(this).show();
		}
	});
	if ($('.council-hidden-card:hidden').length) {
		$('#load-council-btn').show();
	}
	if (!$('.council-hidden-card:hidden').length) {
		$('#load-council-btn').hide();
	}
});
$('#load-council-btn').on('click', function () {
	$('.council-hidden-card:hidden').each(function (index, value) {
		if (index < 4) {
			$(this).show(400);
		}
	});
	if (!$('.council-hidden-card:hidden').length) {
		$("#load-council-btn").text("No More Results").addClass("noresults");
	}
});

// ================== SORT BY BTN=================
$(document).on('click', '.dropdown-menu label', function (e) {
	e.stopPropagation();
});

// ===============LOAD MORE OF SCHEDULES=============
$(document).ready(function () {
	$('.iframe-section').hide();
	$('.iframe-section').each(function (index, value) {
		if (index < 1) {
			$(this).show();
		}
	});
	if ($('.iframe-section:hidden').length) {
		$('#more').show();
	}
	if (!$('.iframe-section:hidden').length) {
		$('#more').hide();
	}
});
$('#more').on('click', function () {
	$('.iframe-section:hidden').each(function (index, value) {
		if (index < 1) {
			$(this).show(300);
		}
	});
	if (!$('.iframe-section:hidden').length) {
		$("#more").text("No More Results").addClass("noresults");
	}
});

// =====================NEWS&EVENTS GALLERY====================

// Gallery image hover
$(".img-wrapper").hover(
	function () {
		$(this).find(".img-overlay").animate({ opacity: 1 }, 300);
	}, function () {
		$(this).find(".img-overlay").animate({ opacity: 0 }, 300);
	});
// Lightbox
var $overlay = $('<div id="overlay"></div>');
var $image = $("<img>");
var $prevButton = $('<div id="prevButton"><i class="fa fa-chevron-left"></i></div>');
var $nextButton = $('<div id="nextButton"><i class="fa fa-chevron-right"></i></div>');
var $exitButton = $('<div id="exitButton"><i class="fa fa-times"></i></div>');
$overlay.append($image).prepend($prevButton).append($nextButton).append($exitButton);
$("#gallery").append($overlay);
$overlay.hide();
$(".img-overlay").click(function (event) {
	event.preventDefault();
	var imageLocation = $(this).prev().attr("href");
	$image.attr("src", imageLocation);
	$overlay.fadeIn("slow");
});
$overlay.click(function () {
	$(this).fadeOut("slow");
});
$nextButton.click(function (event) {
	$("#overlay img").hide();
	var $currentImgSrc = $("#overlay img").attr("src");
	var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
	var $nextImg = $($currentImg.closest(".image").next().find("img"));
	var $images = $("#image-gallery img");
	if ($nextImg.length > 0) {
		$("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(500);
	} else {
		$("#overlay img").attr("src", $($images[0]).attr("src")).fadeIn(500);
	}
	event.stopPropagation();
});
$prevButton.click(function (event) {
	$("#overlay img").hide();
	var $currentImgSrc = $("#overlay img").attr("src");
	var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
	var $nextImg = $($currentImg.closest(".image").prev().find("img"));
	$("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
	event.stopPropagation();
});
$exitButton.click(function () {
	$("#overlay").fadeOut("slow");
});

// =====================TOPSTUDENTS====================

wrapper = $(".tabs");
tabs = wrapper.find(".tab");
tabToggle = wrapper.find(".tab-toggle");

function openTab() {
  var content = $(this).parent().next(".content"),
	activeItems = wrapper.find(".active");

  if (!$(this).hasClass('active')) {
	$(this).add(content).add(activeItems).toggleClass('active');
	wrapper.css('min-height', content.outerHeight());
  }
};

tabToggle.on('click', openTab);

$(window).on('load', function () {
  tabToggle.first().trigger('click');
});

// =====================FAQS====================

  const accItems = document.querySelectorAll(".accordion__item");
  accItems.forEach((acc) => acc.addEventListener("click", toggleAcc));

  function toggleAcc() {
	accItems.forEach((item) =>
	  item != this ? item.classList.remove("accordion__item--active") : null
	);

	if (this.classList != "accordion__item--active") {
	  this.classList.toggle("accordion__item--active");
	}
  }

// ==================How To Apply=================

  (function () {
	var items = document.querySelectorAll(".timeline li");

	function isElementInViewport(el) {
		var rect = el.getBoundingClientRect();
		return (
			rect.top >= 0 &&
			rect.left >= 0 &&
			rect.bottom <=
			(window.innerHeight || document.documentElement.clientHeight) &&
			rect.right <= (window.innerWidth || document.documentElement.clientWidth)
		);
	}

	function callbackFunc() {
		for (var i = 0; i < items.length; i++) {
			if (isElementInViewport(items[i])) {
				items[i].classList.add("in-view");
			}
		}
	}
	
	window.addEventListener("load", callbackFunc);
	window.addEventListener("resize", callbackFunc);
	window.addEventListener("scroll", callbackFunc);
})();

// =====================SLIDESHOW====================
const slides = document.querySelectorAll(".slide");
const next = document.querySelector("#next");
const prev = document.querySelector("#prev");
const toggle = document.querySelector("#myonoffswitch");
let auto = true; // Auto scroll
const intervalTime = 7000;
let slideInterval;

const nextSlide = () => {
	// Get current class
	const current = document.querySelector(".current");
	// Remove current class
	current.classList.remove("current");
	// Check for next slide
	if (current.nextElementSibling) {
		// Add current to next sibiling
		current.nextElementSibling.classList.add("current");
	} else {
		// Add current to start
		slides[0].classList.add("current");
	}
	setTimeout(() => current.classList.remove("current"));
};

const prevSlide = () => {
	// Get current class
	const current = document.querySelector(".current");
	// Remove current class
	current.classList.remove("current");
	// Check for next slide
	if (current.previousElementSibling) {
		// Add current to prev sibiling
		current.previousElementSibling.classList.add("current");
	} else {
		// Add current to last
		slides[slides.length - 1].classList.add("current");
	}
	setTimeout(() => current.classList.remove("current"));
};

// Button events
next.addEventListener("click", (e) => {
	nextSlide();
	if (auto) {
		clearInterval(slideInterval);
		slideInterval = setInterval(nextSlide, intervalTime);
	}
});
prev.addEventListener("click", (e) => {
	prevSlide();
	clearInterval(slideInterval);
	slideInterval = setInterval(nextSlide, intervalTime);
});

// Auto slide toggle
toggle.addEventListener("click", (e) => {
	if (toggle.checked) {
		auto = true;
		slideInterval = setInterval(nextSlide, intervalTime);
	} else {
		auto = false;
		clearInterval(slideInterval);
	}
});

// Auto slide
if (auto) {
	slideInterval = setInterval(nextSlide, intervalTime);
}
