const readline = require('readline');

const lines = [];
const rl = readline.createInterface({
  input: process.stdin,
});

rl.on('line', (line) => {
  lines.push(line);
});

function reverseYa(string) {
  const stringLength = string.length;
  if (stringLength >= 1 && stringLength <= 100) {
    const turnString = string.split('').reverse().join('');
    if (turnString === string) {
      return 'True';
    }
    return 'False';
  }
  return 'False';
}

function solve(input) {
  console.log(reverseYa(input[0]));
}

rl.on('close', () => {
  solve(lines);
});
