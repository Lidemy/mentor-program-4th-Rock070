## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼



## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又是怎麼把 Cookie 帶去 Server 的？

Cookie 是使用者存在個人電腦瀏覽器裡面的小文件，裡面設置了一些資料（登入資料...等等）。
Server 端可以透過設定在 response header 裡面，讓使用者的瀏覽器可以設置 Server 端要 Client 端的瀏覽器設置 Cookie。
Server 可以透過 php 語法 `$_COOKIE['xxxx']`，帶出已設置的 COOKIE key。

## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？

1. 用 query string 帶 errMsg 若使用者重新整理，頁面還是會顯示設定的 errorLog，例如：帳號已被使用、請填寫完整資料等等。
2. 