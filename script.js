'use strict';

// navbar toggle

//Selecting Elements
const overlay = document.querySelector("[data-overlay]");
const navOpenBtn = document.querySelector("[data-nav-open-btn]");
const navbar = document.querySelector("[data-navbar]");
const navCloseBtn = document.querySelector("[data-nav-close-btn]");
const navLinks = document.querySelectorAll("[data-nav-link]");

//Creating an Array of Elements
const navElemArr = [navOpenBtn, navCloseBtn, overlay];

//Defining a Function for Toggling Navigation
const navToggleEvent = function (elem) {
  for (let i = 0; i < elem.length; i++) {
    elem[i].addEventListener("click", function () { //each element, it adds a click event listener
      navbar.classList.toggle("active");
      overlay.classList.toggle("active");
    });
  }
} //When an element is clicked, it toggles the "active" class on both the navbar and overlay elements.

navToggleEvent(navElemArr);
navToggleEvent(navLinks);

// go to top

//Selecting Elements
const header = document.querySelector("[data-header]");
const goTopBtn = document.querySelector("[data-go-top]");

//Scroll Event Listener
window.addEventListener("scroll", function () {

  //Condition based on Scroll Position
  if (window.scrollY >= 200) { // Checks if the vertical scroll position is greater than or equal to 200 pixels /the user has scrolled down at least 200 pixels
    header.classList.add("active"); //If the condition is true: it adds the "active" class to both the header and goTopBtn elements
    goTopBtn.classList.add("active");
  } else {
    header.classList.remove("active"); //If the condition is false: it removes the "active" class from both elements.
    goTopBtn.classList.remove("active");
  }

});









