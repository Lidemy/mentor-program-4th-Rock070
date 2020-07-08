/* eslint-disable no-unused-vars */
/* eslint-disable no-shadow */
const request = require('request');
const process = require('process');

console.log(process.argv);
request(
  'https://lidemy-book-store.herokuapp.com/books',
  (error, response, body) => {
    const total = JSON.parse(body);
    const third = process.argv[2];
    const forth = process.argv[3];
    const fifth = process.argv[4];

    // console.log(typeof(forth))
    // console.log(typeof(total[0].id))
    if (third === 'list') {
    // process.argv[2]
      for (let i = 0; i < 20; i += 1) {
        const book = total[i];
        console.log(`${book.id} ${book.name}`);
      }
    } else if (third === 'read') {
      request.get(`https://lidemy-book-store.herokuapp.com/books/${forth}`, (error, response, body) => {
        console.log(body);
      });
      // console.log(`${total[forth-1].id} ${total[forth-1].name}`);
    } else if (third === 'create') {
      // console.log(total.length+1)
      request.post(
        'https://lidemy-book-store.herokuapp.com/books',
        {
          form: {
            id: total.length + 1,
            name: forth,
          },
        },
      );
    } else if (third === 'delete') {
      request.del(`https://lidemy-book-store.herokuapp.com/books/${forth}`, (error, response, body) => {
        // console.log(body)
        // console.log(response.statusCode)
      });
    } else if (third === 'update') {
      request.patch(
        {
          url: `https://lidemy-book-store.herokuapp.com/books/${forth}`,
          form: {
            name: fifth,
          },
        },
        (error, response, body) => {
          //   console.log(body);
        },
      );
    }
    // console.log(body);
  },
);

// $ajax({
//     url: 'https://google.com/query?id=1&&name=rock'
//     'https://google.com/delete?id=1&&name=rock'
// })

// request.post('http://service.com/upload', {form:{key:'value'}})

// request.post(
//   {
//     url: 'https://lidemy-book-store.herokuapp.com/books',
//     form: {
//       "id": "21",
//       "name": "software engineer"}
//   },
//   function(error, reponse, body) {
//     console.log(body)
// })

// request.delete(
//   'https://lidemy-book-store.herokuapp.com/books',
//   (error, response, body) => {
//   }
// )
