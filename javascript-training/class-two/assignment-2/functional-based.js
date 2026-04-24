export const counting = (total = 10, i = 1000) => { 
  return new Promise((resolve) => {
    let currentNumber = total;
    //using setInterval for the countdown
    const myInterval = setInterval(() => {
      console.log(`${currentNumber}`);

      if (currentNumber === 0) {
        clearInterval(myInterval);
        resolve();
      }
      currentNumber = currentNumber - 1;
    }, i);
  });
};

export const print = (user) => {
  // using template literals + rest operator for formatted logging
  const { name, ...restInfo } = user;
  console.log(`Hello ${user.name}, your info :`, restInfo);
};