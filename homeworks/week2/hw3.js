function reverse(str) {
  

  var arr=str.split("")
  var newarr=[];
  for(var i=arr.length-1 ; i>=0 ; i--){
    newarr.push(arr[i])
  }
  console.log(newarr.join(""))
}

reverse('hello');
