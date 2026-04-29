// Grabbing all the elements we need from the HTML
const modal        = document.getElementById('modal');
const modalClose   = document.getElementById('modal-close');
const toast        = document.getElementById('toast');
const itemCountEl  = document.getElementById('total');
const search       = document.getElementById('search');
const newItem      = document.getElementById('new-item');
const addBtn       = document.querySelector('#add-section button');
const list         = document.getElementById('list');
const clearAll     = document.getElementById('clear-all');
const emptyMessage = document.getElementById('empty-message');

// Show the welcome modal 1 second after the page loads
window.addEventListener('load', function() {
  setTimeout(function() {
    modal.style.display = 'flex';
  }, 1000);
}, { 
  once: true 
});

// Hide the modal when the close button is clicked
modalClose.addEventListener('click', function() {
  modal.style.display = 'none';
});

// Timer variable used to clear the previous toast before showing a new one
let toastTimer;

// Shows a message in the toast and hides it after 2 seconds
function showMessage(msg) {
  toast.textContent = msg;
  toast.style.display = 'block';
  clearTimeout(toastTimer);
  toastTimer = setTimeout(function() {
    toast.style.display = 'none';
  }, 2000);
}

// Counts all li elements and updates the total
function updateTotal() {
  const total = list.querySelectorAll('li').length;
  itemCountEl.textContent = total;
  clearAll.disabled = total === 0;
}

// Runs when ADD ITEM button is clicked
addBtn.addEventListener('click', function() {
  const text = newItem.value.trim();

  // Stop if the input is empty
  if (!text) {
    return;
  }

  // Create a new list item with the item text and a remove button
  const li = document.createElement('li');
  const span = document.createElement('span');
  span.textContent = text;
  const btn = document.createElement('button');
  btn.textContent = 'REMOVE';
  btn.dataset.action = 'remove';

  li.appendChild(span);
  li.appendChild(btn);
  list.appendChild(li);

  newItem.value = '';
  updateTotal();
  showMessage('Item added!');
});

// Listening for clicks on the whole list (event delegation)
list.addEventListener('click', function(e) {
  if (e.target.dataset.action === 'remove') {
    e.target.parentElement.remove();
    updateTotal();
    showMessage('Item removed!');
  }
});

// Change background color of an item when mouse enters (event delegation)
list.addEventListener('mouseover', function(e) {
  const li = e.target.closest('li');
  if (li) {
    li.style.background = '#c8c8c8';
  }
});

// Restore background color when mouse leaves (event delegation)
list.addEventListener('mouseout', function(e) {
  const li = e.target.closest('li');
  if (li) {
    li.style.background = '#b8bfc9';
  }
});

// Remove all items when Clear All is clicked
clearAll.addEventListener('click', function() {
  list.innerHTML = '';
  updateTotal();
  showMessage('All items cleared!');
  emptyMessage.style.display = 'none';
});

// Delays a function from running until the user stops typing
function waitThenRun(fn, delay) {
  let timer;
  return function() {
    clearTimeout(timer);
    timer = setTimeout(fn, delay);
  };
}

// Filter list items based on the search input, debounced by 500ms
search.addEventListener('input', waitThenRun(function() {
  const term = search.value.trim().toLowerCase();
  const items = list.querySelectorAll('li');
  let matchCount = 0;

  items.forEach(function(li) {
    const text = li.querySelector('span').textContent.toLowerCase();
    if (text.includes(term)) {
      li.style.display = '';
      matchCount++;
    } else {
      li.style.display = 'none';
    }
  });

  // Show No results found only if there are items but none match the search
  if (items.length > 0 && matchCount === 0) {
    emptyMessage.style.display = 'block';
  } else {
    emptyMessage.style.display = 'none';
  }
}, 500));