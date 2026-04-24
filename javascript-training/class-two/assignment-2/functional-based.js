// countdown function but in arrow style
export const count = (t = 10, i = 1000) => {
  console.log("starting countdown...");

  return new Promise((resolve) => {
    let counter = t;

    const intervalId = setInterval(() => {
      console.log(`${counter}`);

      if (counter <= 0) {
        clearInterval(intervalId); // stopping again same logic
        console.log("Time is upp");
        resolve();
      }

      counter = counter - 1; // decreasing step by step
    }, i);
  });
};

export const print = (user) => {
  const { name, ...restInfo } = user;

  console.log(`Function approach`);
  console.log(`Hello ${name}!`);
   // rest operator basically dumping remaining properties here
  console.log("Info:", restInfo);
};