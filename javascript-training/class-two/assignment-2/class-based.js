export class Identity {

  counting(total = 10, i = 1000) {
    return new Promise((resolve) => {
      let currentNumber = total;

      // using set interval to print current number at intervals
      const myInterval = setInterval(() => {
        console.log(`${currentNumber}`);

        if (currentNumber === 0) {
          clearInterval(myInterval);
          resolve();
        }
        currentNumber = currentNumber - 1;
      }, i); 
    });
  }

  print(user) {
    // using the rest operator to extract additional info besides name
    const { name, ...restInfo } = user;
    console.log(`Hello ${user.name}, your info :`, restInfo);
  }
}