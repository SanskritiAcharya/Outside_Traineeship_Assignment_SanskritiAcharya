import { Identity } from './class-based.js';
import { print, count } from './functional-based.js';

const user1 = { name: "Harry", age: 24, address: "Jhamsikhel", city: "Lalitpur" };
const user2 = { name: "Ram", address: "Boudha", city: "Kathmandu" };

async function start() {
  // making object from class
  const person = new Identity();
  // first countdown, waiting till it finishes
  await person.timer(10);
  // now printing first user
  person.print(user1);
  console.log("5 second pause!");
  // this just delays but doesn't actually pause code
  setTimeout(5000);

  await count(5, 500);
  print(user2);
}

start();