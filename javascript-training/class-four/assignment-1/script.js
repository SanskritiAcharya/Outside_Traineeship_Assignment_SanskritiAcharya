const menuBtn   = document.querySelector('.show-menu');
const sidePanel = document.querySelector('.sidebar');
// Tracks whether the panel is currently visible or not
let isPanelOpen = false;
// Tracks whether we're still inside the 500ms wait window
let isThrottled = false;
// Opens the panel if closed, closes it if open
function switchPanel() {
  isPanelOpen = !isPanelOpen;
  sidePanel.classList.toggle('panel-open', isPanelOpen);
  menuBtn.classList.toggle('panel-open', isPanelOpen);
}

// Runs on every click, but only lets switchPanel() through once every 500ms
function onMenuClick() {
  if (isThrottled) {
    return;
  }
  switchPanel(); 
  isThrottled = true; // lock it
  // After 500ms, unlock so the next click can work again
  setTimeout(function () {
    isThrottled = false;
  }, 500);
}
menuBtn.addEventListener('click', onMenuClick);