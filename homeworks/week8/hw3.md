## 什麼是 Ajax？
全名 「Asynchronous JavaScript And XML」，非同步與系統交換資料的JavaScript。
可以達到不跳動網頁，即渲染頁面，例如：透過 `XMLHttpRequest`實例，設定按導覽列某項時，會重新 request 某網站，拿到資料並回傳渲染，達到不用整個網頁更動，非同步渲染的概念。

## 用 Ajax 與我們用表單送出資料的差別在哪？

1. 表單：送出後整個頁面重新渲染。
2. Ajax：啟動後部分頁面重新渲染，不用花時間渲染整個頁面。

## JSONP 是什麼？

有些標籤，不受同源政策的影響，可以直接引入其他網域的資源，
例如：`<img>`、`<script>`

我們可以將此特性作延伸利用，

#### 首先利用 callback function 的做法，來得到資料：
```xml
<script>
  function receiveData (response) {
    console.log(response);
  }
</script>

<script>
    receiveData({
        name: 'rock',
        age: 23,
    })
</script>
```
就可以拿到這個資料：
```js
{
  name: rock,
  age: 23,
}
```
#### 第二步，將第二個 script 寫成一個 src，達到相同功用：

```xml
<script>
  function receiveData (response) {
    console.log(response);
  }
</script>

<script src="https://example.js"></script>
```

JSONP 就是：
透過 script 標籤、callback function 的特性，在將 `script`標籤的 src 來源內呼叫函式，並在 main.js 裡面宣告函數，就可以將 src 的資料帶回 main.js，藉此達到跨來源請求。

## 要如何存取跨網域的 API？

需要確保 Server 端有加上 Access-Control-Allow-Origin：* or 某網域，不然 Response 會被瀏覽器給擋下來並且顯示出錯誤訊息。
某些伺服器還會加上類似「身份驗證」的 header，例如：Access-Control-Allow-Headers、Access-Control-Allow-Methods，，當你發出 request 時，透過 preflight request 的方式，先行驗證身份、網域、IP...等等，


## 為什麼我們在第四週時沒碰到跨網域的問題，這週卻碰到了？

因為發起 request 時使用的環境不同，環境（runtime）
1. 第四週：Node.js
2. 第八週：chrome 瀏覽器

透過瀏覽器的話，會因為「兒全性考量」，在對伺服器發出 request 後，某些情況下，伺服器的 response 會被瀏覽器先擋住，先進行一些「驗證」，通過之後才能拿到資料。
所謂「驗證」，這個環節，就是「瀏覽器的限制」，只有在瀏覽器上執行才會需要去配合，例如：同源政策，在瀏覽器執行環境下，預設需要在同網域下的 DNS 才能對某網址發出 request。