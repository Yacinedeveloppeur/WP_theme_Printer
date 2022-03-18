//manages background transparency on scroll

window.onscroll = () => {
  const nav = document.getElementById("nav_id");
  const navLink = document.querySelectorAll(
    ".header-nav-items > div > ul > li > .nav-item-link"
  );
  const navLogo = document.querySelector(".header-logo");
  if (this.scrollY <= 5 && nav.className.indexOf("color-bg-header") !== -1) {
    nav.className =
      "navbar navbar-expand-md navbar-dark fixed-top header-nav-items color-bg-header";
    navLogo.className = "header-logo";
    navLink.forEach((element) => {
      element.className = "nav-item-link";
    });
  } else if (
    this.scrollY <= 5 &&
    nav.className.indexOf("color-bg-header") == -1
  ) {
    nav.className =
      "navbar navbar-expand-md navbar-dark fixed-top header-nav-items";
    navLogo.className = "header-logo";
    navLink.forEach((element) => {
      element.className = "nav-item-link";
    });
  } else {
    nav.classList.add("scroll");
    navLogo.className = "header-logo scroll-logo";
    navLink.forEach((element) => {
      element.className = "nav-item-link scroll-link";
    });
  }
};
