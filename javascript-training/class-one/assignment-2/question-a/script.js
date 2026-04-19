const nums = [5, 12, 8, 130, 44];

let sum = 0;
let largest = nums[0];   // start by assuming first number is biggest
let smallest = nums[0];  // same idea but for smallest
let evenCount = 0;

// i start at 0 because arrays count from 0 not 1
for (let i = 0; i < nums.length; i++) {
  sum += nums[i];         // keep adding to sum each loop

  // check if current number beats our record's largest
  if (nums[i] > largest) largest = nums[i];

  // check if current number beats our record's smallest
  if (nums[i] < smallest) smallest = nums[i];

  // % is the remainder operator, if nothing left over after ÷2, it's even
  if (nums[i] % 2 === 0) evenCount++;
}

// divide after the loop, not inside it 
const avg = sum / nums.length;

// another loop just to find numbers bigger than average
const aboveAvg = [];
for (let i = 0; i < nums.length; i++) {
  if (nums[i] > avg) aboveAvg.push(nums[i]);
}

console.log("Sum:", sum);
console.log("Average:", avg);
console.log("Largest:", largest);
console.log("Smallest:", smallest);
console.log("Even count:", evenCount);
console.log("Above average:", aboveAvg);