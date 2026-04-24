export class Identity {
  // timer function with default values 
  timer(total = 10, i = 1000) {
    console.log("Starting the countdown");

    return new Promise((countdownOver) => {
      let currentNumber = total;

      const myInterval = setInterval(() => {
        console.log(`${currentNumber}`); // printing number like countdown

        if (currentNumber === 0) {
          clearInterval(myInterval); // stop interval or else infinite
          console.log("TIMES UPPPP!");
          countdownOver();
        }
        // decreasing number manually 
        currentNumber = currentNumber - 1;
      }, i);
    });
  }

  print(user) {
    console.log(`Class approach`);
    // directly using object properties
    console.log(`Hello ${user.name}, how are you ? Are you ${user.age}? & live in ${user.address}, ${user.city}?`);
  }
}