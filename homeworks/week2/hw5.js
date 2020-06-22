function join(arr, concatStr) {
    result=""
  for(var i=0;i<arr.length;i++){
    if(i!=arr.length-1){
      result+=arr[i]+concatStr
    }else{
      result+=arr[i]
    }

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


console.log(join([1, 2, 3], ''))//，正確回傳值：123
console.log(join(["a", "b", "c"], "!"))//，正確回傳值：a!b!c
console.log(join(["aaa", "bb", "c", "dddd"], ',,'))//，正確回傳值：aaa,,bb,,c,,dddd