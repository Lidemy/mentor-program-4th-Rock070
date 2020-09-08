## 請說明雜湊跟加密的差別在哪裡，為什麼密碼要雜湊過後才存入資料庫
1. 
雜湊像是算法，不同明碼雜湊後，可能會得到相同的結果。
加密是各字元有對應的規則，不同組明碼會對應到不同獨立的結果。
2. 因為若是在資料庫儲存明碼，若有一天，駭客以你沒有預防到的方式駭進資料庫，就可以得到完整的帳號密碼，加以利用。

## `include`、`require`、`include_once`、`require_once` 的差別

#### include v.s require：

最大的差別在於當引入的檔案不存在或錯誤的時候：
1. 用 include，下方的 php 程式碼依然會繼續執行，並產生 warning。 
2. 用 require，下方的 php 程式碼會停止在此行，並產生 fatal error。

#### 兩者分別建議：
include: 動態的程式碼。
require: 需建立安全連線的程式碼。

## 請說明 SQL Injection 的攻擊原理以及防範方法

#### 攻擊原理：
後端程式碼設計時，若使用「字串拼接」的方式，會將資料庫執行語法「SQL query」與「使用者輸入」，拼接在一起，在資料庫執行。
一但「使用者輸入」的欄位，被填入惡意的「SQL query」，就會對資料庫產生惡意的行為，例如：盜取帳號密碼個資、刪除資料...等等。

#### 防範方法：
在程式碼設計的時候，使用 php 內建的 prepare statement，將「使用者輸入」定義成「字串」或其他形態，就不會成為「SQL query」執行。

##  請說明 XSS 的攻擊原理以及防範方法

全名：Cross Site Script 跨站腳本。

#### 攻擊原理：
利用程式碼會將「使用者輸入」的資料，傳到後端去執行的概念，將「惡意的」JavaScript 的程式碼輸入，可能導致 JavaScript 程式碼儲存到資料庫中，導致每次渲染頁面，都會執行一次「惡意的」JavaScript 程式碼，可能導致網站癱瘓。

#### 防範方法：
當「使用者輸入」的資料要拿來渲染頁面的時候，透過 PHP 內建的 htmlspecialchars() 函式，來避免特殊字元出現，例如：「<」、「>」、「/」、「\」、「 」....等等。

## 請說明 CSRF 的攻擊原理以及防範方法

全名：Cross-site request forgery 跨站請求偽造，又稱作 one-click attack。

#### 攻擊原理：
利用超連結文字偽造前往位址，例如：`<a href='http://example.com/delete?id=2'>開始心理測驗</a>`，誘導使用者點擊心理測驗，但實際網址是用 GET 方法刪除掉資料，並利用使用者本地瀏覽器裡面的 COOKIE 資料，使原網站以為是本人要刪除資料，藉此達到惡意的目的。

#### 防範方法：
1. 加上圖形驗證碼、簡訊驗證碼：就跟網路銀行轉帳的時候一樣，都會要你收簡訊驗證碼，多了這一道檢查就可以確保不會被 CSRF 攻擊。

2. 在原本 response header 的 cookie 設置加上 `SameSite=Lax`，像是這樣：`Set-Cookie: foo=bar; SameSite=Lax`，只要是瀏覽器驗證不是在同一個 site 底下發出的 request，全部都不會帶上這個 cookie。且 Lax 模式限制較寬，例如說`<a>`, `<link rel="prerender">`, `<form method="GET">` 這些都還是會帶上 cookie。但是 POST 方法 的 form，或是只要是 POST, PUT, DELETE 這些方法，就不會帶上 cookie。
