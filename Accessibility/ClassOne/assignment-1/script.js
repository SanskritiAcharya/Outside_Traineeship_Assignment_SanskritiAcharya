document.getElementById("form").addEventListener("submit", function (e) {
  if (!document.getElementById("privacy").checked) {
    e.preventDefault();
    alert("You must agree to the privacy notice before submitting.");
    document.getElementById("privacy").focus();
    return;
  }
  e.preventDefault();
  alert("Thank you! Your message has been submitted.");
  this.reset();
});