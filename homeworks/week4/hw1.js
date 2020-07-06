const request = require('request');

request(
  'https://lidemy-book-store.herokuapp.com/books',
  (error, response, body) => {
    const total = JSON.parse(body);
    for (let i = 0; i < 10; i += 1) {
      const book = total[i];
      console.log(`${book.id} ${book.name}`);
    }
  },
);
