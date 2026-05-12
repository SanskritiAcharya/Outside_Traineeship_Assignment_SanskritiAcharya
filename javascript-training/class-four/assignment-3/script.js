const colors = ["tomato", "orange", "mediumseagreen", "cornflowerblue", "mediumpurple", "hotpink", "mediumturquoise", "slategray"];
let colorIndex = 0; // keeps track of which color to use next

// Set up MutationObserver to watch the #app div
const appContainer = document.getElementById("app");

// This function runs every time something changes inside #app
function handleDomChange(mutationsList) {
  for (const mutation of mutationsList) {
    for (const newNode of mutation.addedNodes) {
      // Check if the added node is our button
      if (newNode.tagName === "BUTTON" && newNode.id === "addBoxBtn") {
        newNode.addEventListener("click", function () {
          const box = document.createElement("div");
          box.style.width = "300px";
          box.style.height = "300px";
          box.style.backgroundColor = colors[colorIndex % colors.length];
          colorIndex++;

          box.style.margin = "20px";
          document.getElementById("boxContainer").appendChild(box);
        });

      }
    }
  }
}

// Create the observer and tell it to watch for child elements being added
const watcher = new MutationObserver(handleDomChange);

// Start observing #app for direct child additions
watcher.observe(appContainer, { childList: true });

// After 2 seconds, create and add the "Add Box" button
setTimeout(function () {
  const addBoxButton = document.createElement("button");
  addBoxButton.id = "addBoxBtn";
  addBoxButton.textContent = "Add Box";

  // Appending the button triggers the MutationObserver above
  appContainer.appendChild(addBoxButton);
}, 2000);