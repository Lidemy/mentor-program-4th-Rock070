/* eslint-disable no-unused-vars */
/* eslint-disable no-shadow */
/* eslint-disable no-use-before-define */

const request = require('request');
const process = require('process');

const action = process.argv[2];
const param = process.argv[3];
const updateName = process.argv[4];

let data;


switch (action) {
  case 'list':
    listBooks();
    break;
  case 'read':
    readBook(param);
    break;
  case 'delete':
    deleteBook(param);
    break;
  case 'update':
    updateBook(param);
    break;
  default:
    console.log('Available commands: list, read, delete, create and update');
}

function listBooks() {
  request(
    'https://lidemy-book-store.herokuapp.com/books?_limit=20',
    (error, response, body) => {
      if (error) {
        return console.log('抓取失敗', error);
      }
      tryJsonString(body);
      for (let i = 0; i < data.length; i += 1) {
        console.log(data[i]);
      }
      return true;
    },
  );
}

function readBook(param) {
  request(
    `https://lidemy-book-store.herokuapp.com/books/${param}`,
    (error, response, body) => {
      if (error) {
        return console.log('讀取失敗', error);
      }
      tryJsonString(body);
      return console.log(data);
    },
  );
}

function deleteBook(param) {
  request.del(
    `https://lidemy-book-store.herokuapp.com/books/${param}`,
    (error, response, body) => {
      if (error) {
        return console.log('刪除失敗', error);
      }
      return console.log('刪除成功');
    },
  );
}

function updateBook(param) {
  request.patch(
    {
      url: `https://lidemy-book-store.herokuapp.com/books/${param}`,
      form: {
        name: updateName,
      },
    },
    (error, response, body) => {
      if (error) {
        return console.log('更新失敗', error);
      }
      return console.log('更新成功');
    },
  );
}
// 工具
function tryJsonString(body) {
  try {
    data = JSON.parse(body);
  } catch (e) {
    console.log(e);
  }
}
