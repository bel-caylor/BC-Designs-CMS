// import 'stylesheets/css/nav.scss'
// import 'stylesheets/css/main.scss'
// import 'stylesheets/css/palette.scss'
// import 'stylesheets/css/theme.scss'
// import 'stylesheets/css/circles.scss'
// import 'stylesheets/css/flyingText.scss'
// import 'stylesheets/css/photos.scss'
// import 'stylesheets/css/media.scss'
// import github from './html/image/github.png'
// import linkedIn from './html/image/LinkedIn-Logo.png'
// import bcPortfolio from './html/image/BCPortfolio.jpg'
// import BCPartyDesigns from './html/image/BCPartyDesigns.jpg'
// import TravelApp from './html/image/TravelApp.jpg'
// import BCPaperDesigns from './html/image/BCPaperDesigns.jpg'
// import Photo1 from './html/image/Photograph1.jpg'
// import Photo2 from './html/image/Photograph2.jpeg'
// import Photo3 from './html/image/Photograph3.jpg'
// import Photo4 from './html/image/Photograph4.jpeg'
// import Photo5 from './html/image/Photograph5.jpg'
// import Photo6 from './html/image/Photograph6.jpg'
// import Photo7 from './html/image/Photograph7.jpeg'
// import Photo8 from './html/image/Photograph8.jpg'
// import Photo9 from './html/image/Photograph9.jpg'
// import Dig1 from './html/image/DigScrap1.png'
// import Dig2 from './html/image/DigScrap2.jpeg'
// import Dig3 from './html/image/DigScrap3.jpeg'
// import Dig5 from './html/image/DigScrap5.jpeg'
// import Dig6 from './html/image/DigScrap6.jpeg'
// import Dig7 from './html/image/DigScrap7.jpeg'
// import Dig8 from './html/image/DigScrap8.jpeg'
// import Dig9 from './html/image/DigScrap9.jpeg'
// import Udacity from './html/image/Udacity5.jpg'

/**
 * Define Global Variables
 *
*/
const sections = document.querySelectorAll('section');
const navBar = document.querySelector('ul#navbar__list');
let activeClass = "section1";
/**
 * End Global Variables
 * Start Helper Functions
 *
*/
function sectionInVeiwport() {
  sections.forEach(function(sections) {
    let position = sections.getBoundingClientRect();
    let topHalf = 0.4 * window.innerHeight;
    //check if section is above 50% of screen innerHeight
    if(position.top >= 0 && position.top < topHalf) {
      changeActive(sections.id);
      return;
    }
  })};

/**
 * End Helper Functions
 * Begin Main Functions
 *
*/

// build the nav
function createNavBar() {
  let navList = ""
  sections.forEach(function(sections) {
  let sectionNumber = sections.id.substring(7);
  navList += "<a href=\"\#" + sections.id + "\">";
  navList += "<li id=\"S" + sectionNumber + "\" class=\"menu__link\" data-id=\"" + sections.id + "\">";
  navList += sections.dataset.nav + "</li></a>";}
);
  return navList;
}


// Add class 'active' to section when near top of viewport
function changeActive(newSection) {
  //Remove active class from old Sections
  let removeClass = document.getElementById(activeClass);
  removeClass.classList.remove("your-active-class");
  let removeClassNav = document.getElementById("S" + activeClass.substring(7));
  removeClassNav.classList.remove("navbar__active");

  //Add active class to new sections
  let addClass = document.getElementById(newSection);
  addClass.classList.add("your-active-class");
  let addClassNav = document.getElementById("S" + newSection.substring(7));
  addClassNav.classList.add("navbar__active");
  activeClass = newSection;
}

// Scroll to anchor ID using scrollTO event


/**
 * End Main Functions
 * Begin Events
 *
*/

// Build menu with anchor link
navBar.insertAdjacentHTML('afterbegin', createNavBar());

//Listen for click on navigation bar and change active class.
navBar.addEventListener('click', function () {changeActive(event.target.dataset.id)});

//Listen for scroll event that puts a new Section in the viewport
window.addEventListener('scroll', function() {sectionInVeiwport()});
