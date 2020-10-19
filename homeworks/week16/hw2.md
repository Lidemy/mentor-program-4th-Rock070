``` js
for(var i=0; i<5; i++) {
  console.log('i: ' + i)
  setTimeout(() => {
    console.log(i)
  }, i * 1000)
}
```

### 輸出

```
output

i: 0
i: 1
i: 2
i: 3
i: 4

5
5
5
5
5
```

### 一、call stack 執行狀況

1. 宣告變數 `i` 為全域變數，賦值為 0。
2. 迴圈開始。
3. `i = 0`， `console.log(0)`，進入 call stack 執行，印出 `0`。
4. `i = 0`，`setTimeout(() => {console.log(i)}, 0 * 1000)` 進入 call stack 內 -> 透過 event loop 機制，轉到 webAPI 內執行。
5. `i = 1`， `console.log(1)`，進入 call stack 執行，印出 `1`。
6. `i = 1`，`setTimeout(() => {console.log(i)}, 1 * 1000)` 進入 call stack 內 -> 透過 event loop 機制，轉到 webAPI 內執行。
7. `i = 2`， `console.log(2)`，進入 call stack 執行，印出 `2`。
8. `i = 2`，`setTimeout(() => {console.log(i)}, 2 * 1000)` 進入 call stack 內 -> 透過 event loop 機制，轉到 webAPI 內執行。
9. `i = 3`， `console.log(0)`，進入 call stack 執行，印出 `3`。
10. `i = 3`，`setTimeout(() => {console.log(i)}, 3 * 1000)` 進入 call stack 內 -> 透過 event loop 機制，轉到 webAPI 內執行。
3. `i = 4`， `console.log(4)`，進入 call stack 執行，印出 `4`。
4. `i = 4`，`setTimeout(() => {console.log(0)}, 4 * 1000)` 進入 call stack 內 -> 透過 event loop 機制，轉到 webAPI 內執行。


### 二、WebAPI 運作

1. `setTimeout(() => {console.log(i)}, 0 * 1000`等 0 秒後，傳致 callback Queue 內等待 stack 執行完畢後，進入堆疊。
2. `setTimeout(() => {console.log(i)}, 1 * 1000`等 1 秒後，傳致 callback Queue 內等待 stack 執行完畢後，進入堆疊。
3. `setTimeout(() => {console.log(i)}, 2 * 1000`等 2 秒後，傳致 callback Queue 內等待 stack 執行完畢後，進入堆疊。
4. `setTimeout(() => {console.log(i)}, 3 * 1000`等 3 秒後，傳致 callback Queue 內等待 stack 執行完畢後，進入堆疊。
5. `setTimeout(() => {console.log(i)}, 4 * 1000`等 4 秒後，傳致 callback Queue 內等待 stack 執行完畢後，進入堆疊。

### 三、callback Queue 運作

1. 檢查 call stack 是否執行完，無任務堆疊，是，將 `console.log(i)` 送入 stack 執行。
2.  檢查 call stack 是否執行完，無任務堆疊，是，將 `console.log(i)` 送入 stack 執行。
3.  檢查 call stack 是否執行完，無任務堆疊，是，將 `console.log(i)` 送入 stack 執行。
4.  檢查 call stack 是否執行完，無任務堆疊，是，將 `console.log(i)` 送入 stack 執行。
5.  檢查 call stack 是否執行完，無任務堆疊，是，將 `console.log(i)` 送入 stack 執行。

### 四、call stack 運作

```js
console.log(i)
console.log(i)
console.log(i)
console.log(i)
console.log(i)
```

此時迴圈早已跑完，`i = 5`，所以這邊印出來的都是 `5`。

### 最後 Log

```js
i: 0
i: 1
i: 2
i: 3
i: 4

5
5
5
5
5
```