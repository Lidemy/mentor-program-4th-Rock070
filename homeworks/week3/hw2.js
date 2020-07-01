const readline = require('readline');

const lines = [];
const rl = readline.createInterface({
  input: process.stdin,
});

rl.on('line', (line) => {
  lines.push(line);
});

function findWater(num) {
  const numString = num.toString().split('');
  let ans = 0;
  for (let i = 0; i < numString.length; i += 1) {
    const pownum = Number(numString[i]) ** numString.length;
    ans += pownum;
  }
  if (ans === num) {
    return true;
  }
  return false;
}

function solve(input) {
  const temp = input[0].split(' ');
  for (let i = Number(temp[0]); i < Number(temp[1]); i += 1) {
    if (findWater(i)) {
      console.log(i);
    }
  }
}

rl.on('close', () => {
  solve(lines);
});
