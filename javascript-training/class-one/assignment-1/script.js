// loop from 1 to 100
for (let i = 1; i <= 100; i++) {
    // figure out what to show for this number
    let result;
    // divisible by both 3 and 5? got to check this FIRST
    // otherwise the 3 or 5 check would catch it early
    if (i % 15 === 0) {
      result = 'FizzBuzz';
    } else if (i % 3 === 0) {
      // only divisible by 3
      result = 'Fizz';
    } else if (i % 5 === 0) {
      // only divisible by 5
      result = 'Buzz';
    } else {
      // just a normal number, nothing to replace so just print it
      result = i;
    }
    console.log(result);
}