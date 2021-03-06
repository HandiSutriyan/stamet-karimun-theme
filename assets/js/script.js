function myFunction() {
  let x = document.getElementById("myTopnav");
  //let screen_width = document.body.clientWidth;
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
//window.addEventListener("resize", myFunction);

$(document).ready(function () {
  $("#news").owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 3500,
    autoplaySpeed: 1500,
    responsive: {
      0: {
        items: 2,
        margin: 5,
      },
      800: {
        items: 1,
      },
    },
  });

  $("#news-feed").owlCarousel({
    loop: true,
    margin: 30,
    autoplay: true,
    autoplayTimeout: 2500,
    autoplaySpeed: 1500,
    responsive: {
      0: {
        margin: 20,
        items: 1,
        autoplay: true,
        autoplayTimeout: 3500,
        autoplaySpeed: 1500,
      },
      420: {
        items: 3,
      },
    },
  });

  $("#buletin").owlCarousel({
    items: 1,
    loop: true,
    center: true,
    autoplay: true,
    autoplayTimeout: 7000,
  });
  $(".blocks-gallery-item img").simpleLightbox({
    sourceAttr: "src",
    overlay: true,
    spinner: true,
  });
});
