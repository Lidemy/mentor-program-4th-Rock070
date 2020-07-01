const readline = require('readline');


const lines = [];
const rl = readline.createInterface({
  input: process.stdin,
});

rl.on('line', (line) => {
  lines.push(line);
});
function prime(num) {
  if (num <= 100000 && num >= 1) {
    if (num === 1) {
      return 'Composite';
    }
    for (let i = 2; i <= num / 2; i += 1) {
      if (num % i === 0) {
        return 'Composite';
      }
    }
    return 'Prime';
  }
  return false;
}

function solve(input) {
  const time = input[0];
  for (let i = 1; i <= time; i += 1) {
    console.log(prime(Number(lines[i])));
  }
}

rl.on('close', () => {
  solve(lines);
});
