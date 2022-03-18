// Tiny slider config

let slider = tns({
  container: ".slider",
  controls: false,
  nav: false,
  items: 8,
  slideBy: "page",
  autoplay: true,
  autoplayTimeout: 3000,
  autoplayButtonOutput: false,
  controlsContainer: false,
  swipeAngle: false,
  speed: 400,
  responsive: {
    0: {
      items: 1,
    },
    200: {
      items: 3,
    },
    1000: {
      items: 6,
    },
    1400: {
      items: 7,
    },
  },
});
