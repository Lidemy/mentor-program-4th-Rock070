const request = require('request');

request(
  'https://lidemy-book-store.herokuapp.com/books?_limit=10',
  (error, response, body) => {
    let total;
    try {
      total = JSON.parse(body);
    } catch (e) {
      console.log(e);
    }
    for (let i = 0; i < total.length; i += 1) {
      const book = total[i];
      console.log(`${book.id} ${book.name}`);
    }
  },
);
