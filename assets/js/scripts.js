var sidebarToggle = document.querySelector("#sidebarToggle");

var nav = document.querySelectorAll("#layoutSidenav_nav .sb-sidenav a.nav-link");
var path = window.location.href; // because the 'href' property of the DOM element is the absolute path

    sidebarToggle.addEventListener("click", function() {
        document.querySelector("body").classList.toggle("sb-sidenav-toggled");
    });


    // console.log(nav[0].href);
    // console.log(path)
    nav.forEach(function(index) {
        // console.log(nav[index]);
        if(index.href === path) {
            index.classList.add('active');
            console.log("active");
        }
    });
