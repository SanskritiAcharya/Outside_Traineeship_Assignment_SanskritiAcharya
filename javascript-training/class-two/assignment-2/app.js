import { Identity } from './class-based.js';
import { print, counting } from './functional-based.js';

const user1 = { name: "Harry", age: 24, address: "Jhamsikhel", city: "Lalitpur" };
const user2 = { name: "Ram", address: "Boudha", city: "Kathmandu" };

async function delay(ms) {
  return new Promise((resolve) => {
    setTimeout(resolve, ms);
  });
}

async function startProgram() {

  // creating person object of class Identity
  const person = new Identity();

  console.log("Class based");

  await person.counting(10); // countdown method
  person.print(user1);

  await delay(5000); //wait 5 seconds
  person.print(user2);

  console.log("Function based");
  await counting(10, 1000); // new countdown function

  print(user1); //differnt print function

  await delay(5000);
  print(user2);
}

startProgram();