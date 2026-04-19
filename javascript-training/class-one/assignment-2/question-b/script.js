const nums = [5, 12, 8, 130, 44];

// adds every number together, runningTotal starts at 0 and grows each step
const sum = nums.reduce((runningTotal, n) => runningTotal + n, 0);

const avg = sum / nums.length;

// each time, keep whichever is bigger, current number or the one we already have
const largest = nums.reduce((currentLargest, n) => {
  if (n > currentLargest) {
    return n;
  } else {
    return currentLargest;
  }
});

// each time, keep whichever is smaller, current number or the one we already have 
const smallest = nums.reduce((currentSmallest, n) => {
  if (n < currentSmallest) {
    return n;
  } else {
    return currentSmallest;
  }
});

// % 2 === 0 means no remainder when divide by 2, so its even
const evenCount = nums.filter(n => n % 2 === 0).length;

// only keep numbers bigger than the average we got above
const aboveAvg = nums.filter(n => n > avg);

console.log("Sum:", sum);
console.log("Average:", avg);
console.log("Largest:", largest);
console.log("Smallest:", smallest);
console.log("Even count:", evenCount);
console.log("Above average:", aboveAvg);