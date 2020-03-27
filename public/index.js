// import { validMinLength } from './js/validate.js';  NEED webpack

/**
 * Define Global Variables
 *
*/
const sections = document.querySelectorAll('section');
const navBar = document.querySelector('ul#navbar__list');
const editSection = document.querySelectorAll('.btnEdit');
const btnEdit = document.querySelector('#btnEdit');
let activeClass = "section1";
let objChanges = {
section:[]
// , subSection: []
// , article: []
};

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

  function validMinLength($str, $minLength) {
    if ($str.length > $minLength) {
      return true;
    };
  };

/**
 * End Helper Functions
 * Begin Main Functions
 *
*/

// build the nav
// function createNavBar() {
//   let navList = ""
//   sections.forEach(function(sections) {
//   let sectionNumber = sections.id.substring(7);
//   navList += "<a href=\"\#" + sections.id + "\">";
//   navList += "<li id=\"S" + sectionNumber + "\" class=\"menu__link\" data-id=\"" + sections.id + "\">";
//   navList += sections.dataset.nav + "</li></a>";}
// );
//   return navList;
// }


// Add class 'active' to section when near top of viewport
function changeActive(newSection) {
  //Remove active class from old Sections
  let removeClass = document.getElementById(activeClass);
  removeClass.classList.remove("your-active-class");
  let removeClassNav = document.getElementById("S" + activeClass.substring(7));
  removeClassNav.classList.remove("navbar__active");

  //Add active class to new sections
  let addClass = document.getElementById(newSection);
  if (addClass != null) {
    addClass.classList.add("your-active-class");
    let addClassNav = document.getElementById("S" + newSection.substring(7));
    addClassNav.classList.add("navbar__active");
    activeClass = newSection;
  };

};

function clickNavEditBtn() {
  let btns = document.querySelectorAll('.btnEdit');
  btns.forEach(btn => btn.style.display = "inline");
  document.getElementById('saveFooter').style.display = "inline";
  document.getElementById('btnEdit').style.display = "none";
};

function clickEditBtn(id, type) {
  if (type == "Sec") {
    let inputBox = document.getElementById(type + id);
    inputBox.readOnly = false;
    inputBox.classList.add("inputEdit")
  }else {
    let h3Box = document.getElementById("h3" + type + id);
    h3Box.readOnly = false;
    h3Box.classList.add("inputEdit");
    if (document.getElementById("h4"  + type + id) !== null) {
      let h4Box = document.getElementById("h4" + type + id);
      h4Box.readOnly = false;
      h4Box.classList.add("inputEdit");
    };
    if (document.getElementById("h5"  + type + id) !== null) {
      let h4Box = document.getElementById("h5" + type + id);
      h4Box.readOnly = false;
      h4Box.classList.add("inputEdit");
    }
  }
  document.getElementById("btnEditSec" + id).style.display = "none";
  document.getElementById("btnOKSec" + id).style.display = "inline";
};

function clickOKBtn(id, type) {
  console.log(id);
  newSection = document.getElementById(type + id).value
  if (validMinLength(newSection, 2) !== true) {
    alert("Please enter a value larger than 2 characters.")
    return;
  };
  sectionLength = objChanges.section.length
  objChanges.section[sectionLength] = {id:parseInt(id), section:newSection};
  // changeSection.push("id":id, section:newSection);
  console.log(objChanges.section[sectionLength]);
  document.getElementById('btnEdit' + type + id).style.display = "inline";
  document.getElementById('btnOK' + type + id).style.display = "none";
  document.getElementById(type + id).classList.remove("inputEdit")
};

function clickSubOKBtn(id) {

}

function clickSaveChanges() {

};

function clickCancelChanges() {
  location.reload(true);
};



// Scroll to anchor ID using scrollTO event


/**
 * End Main Functions
 * Begin Events
 *
*/

// Build menu with anchor link
// navBar.insertAdjacentHTML('afterbegin', createNavBar());

//Listen for click on navigation bar and change active class.
navBar.addEventListener('click', () =>  {changeActive(event.target.dataset.id)});
// navBar.addEventListener('click', changeActive(event.target.dataset.id));

//Listen for scroll event that puts a new Section in the viewport
window.addEventListener('scroll', () => {sectionInVeiwport()});
