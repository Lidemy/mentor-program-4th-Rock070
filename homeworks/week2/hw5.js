function join(arr, concatStr) {
    result=""
  for(var i=0;i<arr.length;i++){
      result+=arr[i]+concatStr
  }
  return result
}

function repeat(str, times) {
    var result=""
  for(var i=0 ; i<times ; i++){
    result+=str
  }
  return result
}

console.log(join(["a", 1, "b", 2, "c", 3], ','))
console.log(repeat('a', 5));
