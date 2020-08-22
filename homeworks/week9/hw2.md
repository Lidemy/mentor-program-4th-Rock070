## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼

1. 長度
VARCHAR：長度需要設定，可變長度 (0 ~ 65,535 byte) 的字串，最大的有效長度需視資料列大小限制而定。
TEXT：長度不用設定，最大長度可達 65,535 byte。

2. 索引
VARCHAR 建索引可不指定索引長度，但 TEXT 一定要指定長度。

## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又是怎麼把 Cookie 帶去 Server 的？

Cookie 是使用者存在個人電腦瀏覽器裡面的小文件檔案，裡面設置了一些資料（登入資料...等等）。
Server 端可以透過 Set-Cookie 設定在 response header 裡面，讓使用者的瀏覽器可以設置 Server 端要 Client 端的瀏覽器設置 Cookie。
而瀏覽器發送 Request 時，會把相對應的 Cookie 放在 `Cookie` 這個 Header，Server 就可以拿到資料。
Server 可以透過 php 語法 `$_COOKIE['xxxx']`，帶出已設置的 COOKIE key。

## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？

1. 用 query string 帶 errMsg 若使用者重新整理，頁面還是會顯示設定的 errorLog，例如：帳號已被使用、請填寫完整資料等等。
2. 註冊會員密碼需要輸入兩次，並判斷兩次是否相同，不然輸入錯誤會需要重新註冊。
3. 如果檔案路由沒有分類好，會看起來很亂。