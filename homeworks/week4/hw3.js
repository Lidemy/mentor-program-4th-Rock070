/* eslint-disable  */
const request = require('request');
const process = require('process');

request(
  `https://restcountries.eu/rest/v2/name/${process.argv[2]}`,
  (error, response, body) => {
    const status = response.statusCode;
    const obj = JSON.parse(body)[0];
    // console.log(status)
    // console.log(error)
    if (status >= 200 && status< 300) {
      console.log(
        `
        國家：${obj.name}
        首都：${obj.capital}
        貨幣：${obj.currencies[0].code}
        國碼：${Number(obj.callingCodes[0])}
        `,
      );
    } else {
      console.log('找不到國家資訊');
    }
    // console.log(obj);
    // console.log(obj.currencies);
  },
);
