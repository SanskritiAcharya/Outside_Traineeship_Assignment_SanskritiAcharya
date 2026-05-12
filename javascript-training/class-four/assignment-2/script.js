const boxOnce = document.getElementById("box-once");
const boxRepeat = document.getElementById("box-repeat");

// tracking if box-once has already rotated so we dont rotate it again
let alreadyRotated = false;

// Box 1: rotate only the first time it enters the screen 
const watcherForOnce = new IntersectionObserver(function(entries) {
  const entry = entries[0];

  // isIntersecting = true means the box is visible on screen right now
  if (entry.isIntersecting && !alreadyRotated) {
    boxOnce.classList.add("rotated"); // rotate 
    alreadyRotated = true;            // never rotate again
    watcherForOnce.unobserve(boxOnce);
  }
});

// Box 2: rotate every time it enters, reset when it leaves 
const watcherForRepeat = new IntersectionObserver(function(entries) {
  const entry = entries[0];
  if (entry.isIntersecting) {
    // box is on screen -> rotate it
    boxRepeat.classList.add("rotated");
  } else {
    // box left the screen -> reset so it rotates again next scroll
    boxRepeat.classList.remove("rotated");
  }
}, { threshold: 0.5 });

watcherForOnce.observe(boxOnce);
watcherForRepeat.observe(boxRepeat);