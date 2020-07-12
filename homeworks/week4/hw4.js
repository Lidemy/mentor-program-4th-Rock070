
/* eslint-disable quote-props */


const request = require('request');


const options = {
  url: 'https://api.twitch.tv/kraken/games/top',
  headers: {
    'Accept': 'application/vnd.twitchtv.v5+json',
    'Client-ID': 'kpku5eo961uoviqg7zisi4k2enj78h',
  },
};

const callback = (error, response, body) => {
  const gameList = JSON.parse(body).top;
  for (let i = 0; i < gameList.length; i += 1) {
    console.log(`${gameList[i].viewers}  ${gameList[i].game.name}`);
  }
};
request(options, callback);
