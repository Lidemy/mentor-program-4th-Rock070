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
2. `setTimeout(() => {console.log(2)}, 0)` 進入 call stack 內 -> 透過 event loop 機制，轉到 webAPI 內執行。
3. `console.log(3)` 進入 call stack 內執行，輸出 `3`。
4. `setTimeout(() => {console.log(4)}, 0)` 進入 call stack 內 -> 透過 event loop 機制，轉到 webAPI 內執行。
5. `console.log(5)` 進入 call stack 內執行，輸出 `5`。

目前看來，已經 log 出了 1、3、5。

```js
output

1
3
5
```

### 二、WebAPI 運作

1. `setTimeout(() => {console.log(2)}, 0)` 等零秒後，傳致 callback Queue 內等待 stack 執行完畢後，進入堆疊。
2. `setTimeout(() => {console.log(4)}, 0)` 等零秒後，傳致 callback Queue 內等待 stack 執行完畢後，進入堆疊。

### 三、callback Queue 運作

1. 檢查 call stack 是否執行完，無任務堆疊，是，將 `setTimeout(() => {console.log(2)}, 0)` 送入 stack 執行。
2. 檢查 call stack 是否執行完，無任務堆疊，是，將 `setTimeout(() => {console.log(4)}, 0)` 送入 stack 執行。


### 最後 Log
```
1
3
5
2
4
```