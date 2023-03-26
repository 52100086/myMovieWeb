

// $(document).ready(() {
//     $('#hamburger-menu').click(() => {
//         $('#hamburger-menu').toggleClass('active');
//         $('#menu_item').toggleClass('active');
//     })
// })

// window.onscroll = function() {scrollFunction()};
// function scrollFunction() {
//   if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
//     document.getElementsByClassName("navbar").style.backgroundColor = "black";
//   } else {
//     document.getElementsByClassName("navbar").style.backgroundColor = "rgba(0, 0, 0, 0.5)";
//   }
// }

// chuyenmaukhikeoxuong
window.addEventListener("scroll", function () {
    var navbar = document.querySelector(".navbar");
    if (window.pageYOffset > 50) {
        navbar.classList.add("navbar--scrolled");
        navbar.classList.remove("navbar--top");
    } else {
        navbar.classList.remove("navbar--scrolled");
        navbar.classList.add("navbar--top");
    }
});


// Dropdown

  function closeDropdown() {
    document.getElementById("myDropdown").classList.remove("show");
  }

  
function Dropdown() {
    document.getElementById("myDropdown").classList.add("show");
  }


window.onmousemove = function(e) {
    if (!e.target.matches('.dropdown, .dropdown *')) {
      closeDropdown();
    }
  }

const avatarContainer = document.querySelector('.avatar-container');

avatarContainer.addEventListener('click', function() {
  this.querySelector('.dropdown-menu').classList.toggle('show');
});






