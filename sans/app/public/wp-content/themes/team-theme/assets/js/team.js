document.addEventListener("DOMContentLoaded", function () {
 const buttons = document.querySelectorAll(".tab-btn");
 const groups = document.querySelectorAll(".team-group");


 if (!buttons.length || !groups.length) return;


 buttons.forEach(button => {
   button.addEventListener("click", function () {
     const term = this.getAttribute("data-term");
     buttons.forEach(btn => btn.classList.remove("active"));
     this.classList.add("active");
     groups.forEach(group => {
       group.style.display = "none";
     });
     const target = document.getElementById(term);
     if (target) {
       target.style.display = "block";
     }
   });
 });


 buttons[0].click();
});