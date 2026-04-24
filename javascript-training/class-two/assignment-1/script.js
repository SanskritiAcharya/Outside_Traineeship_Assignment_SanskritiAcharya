let singers=["Justin","Gdragon","Taeyang","Taylor","Michael","Sabrina","Baekhyun","Shawn"];
console.log(`Original Array:${singers}`);
//started from 4th index, delete count is 3 i.e. removed element present in 4th,5th and 6th index, and added 5 elements from index 4.
singers.splice(4,3,"Pratik","Arijit","Sajjan","Shreya","Anuv");
console.log(`Updated Array:${singers}`);
