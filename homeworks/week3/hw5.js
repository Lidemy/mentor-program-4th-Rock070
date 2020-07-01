/* global BigInt */

const readline = require('readline');

const lines = [];
const rl = readline.createInterface({
  input: process.stdin,
});

rl.on('line', (line) => {
  lines.push(line);
});

function solve(input) {
  const m = Number(input[0]);
  for (let i = 1; i <= m; i += 1) {
    const [a, b, p] = input[i].split(' ');
    if (BigInt(a) === BigInt(b)) {
      console.log('DRAW');
    } else if ((BigInt(a) > BigInt(b) && p === 1) || (BigInt(a) < BigInt(b) && p === -1)) {
      console.log('A');
    } else {
      console.log('B');
    }
  }
}
rl.on('close', () => {
  solve(lines);
});
