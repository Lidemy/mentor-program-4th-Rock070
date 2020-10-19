### 輸出

```
1
3
5
2
4
```
### 詳解

```js
console.log(1) 
setTimeout(() => {
  console.log(2)
}, 0)
console.log(3)
setTimeout(() => {
  console.log(4)
}, 0)
console.log(5)
```

### 一、call stack 執行狀況

1. `console.log(1)` 進入 call stack 內執行，輸出 `1`。
2. `setTimeout(() => {console.log(2)}, 0)` 進入 call stack 內 -> 執行 setTimeout 這個 function，然後 setTimeout 會呼叫瀏覽器幫忙設定一個 0 ms 後期的定時器，到期之後就把第一個參數 `() => {console.log(2)}` 放進去 callback queue。
3. `console.log(3)` 進入 call stack 內執行，輸出 `3`。
4. `setTimeout(() => {console.log(4)}, 0)` 進入 call stack 內 -> 執行 setTimeout 這個 function，然後 setTimeout 會呼叫瀏覽器幫忙設定一個 0 ms 後期的定時器，到期之後就把第一個參數 `() => {console.log(4)}` 放進去 callback queue。
5. `console.log(5)` 進入 call stack 內執行，輸出 `5`。

目前看來，已經 log 出了 1、3、5。

```js
output

1
3
5
```

### 二、callback Queue 運作

1. 檢查 call stack 是否執行完，無任務堆疊，是，將 `() => { console.log(2))}` 送入 call stack 中，再將 `console.log(2))` 送進 call stack 執行。
2. 檢查 call stack 是否執行完，無任務堆疊，是，將 `() => { console.log(4)}` 送入 call stack 中，再將 `console.log(4)` 送進 call stack 執行。


### 最後 Log
```
1
3
5
2
4
```