// 現在有一個排序好的陣列 arr，裡面的元素都是正整數而且保證不會重複。

// 給你一個數字 n，請寫出一個函式 search 回傳 n 在這個陣列裡面的 index，沒有的話請回傳 -1。

// 範例：




function search(arr, n){
    return arr.indexOf(n)
}

console.log(search([1, 3, 10, 14, 39], 14)) //=> 3
console.log(search([1, 3, 10, 14, 39], 299)) //=> -1