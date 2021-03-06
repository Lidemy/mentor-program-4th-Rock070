## 十一到十五週心得

#### 第十一週（08/24 ~ 08/30）：資訊安全
這週學到了關於資訊安全的知識，例如：XSS、SQL Injection、CSRF、分頁權限、雜湊密碼，了解到之前寫的網站都有非常多的漏洞，在資安觀念之上建立程式碼，需要注意，如果有一天，駭客拿到了我所有的程式碼，還無法侵入我的系統，這週的觀念非常重要，日後架設網站都需要考慮資訊安全的問題！


#### 第十二週（08/31 ~ 09/06）：前後端整合
這週運用了前端技術的工具：Bootstrap、jQuery，並將前後端切開，不再將 PHP 與 HTML 混在一起寫，可以將後端寫成 API，讓前端用 XHR 的方式去呼叫 API，並且用 SPA 的方式開發網站，貼近現在用戶使用的習慣，並瞭解 CSR 與 SSR 在網頁渲染、SEO 上的差別。學到原生的 Vanilla JS 與 jQuery 在開發上的差別。


#### 第十三週（09/07 ~ 09/13）：現代前端工具

這週學到較多的工具：
1. sass/scss：CSS 預處理器，可以將 CSS 像 JS 一樣，用變數的方式管理重複的屬性，也可以是先寫好 mixin，類似函式的概念，建構會重複使用的 CSS，要使用時就可以用呼叫的。
2. Babel：將 ES6 最新的語法，轉換成較舊的語法，使較舊版的瀏覽器可以讀取編譯。
3. Gulp：將固定的工作任務寫成一個流程，並簡化成一個指令，輸入指令即可執行所有的任務，簡化開發的流程。
4. Webpack：將所有引入檔案打包成一個 main.js 檔案，不只是 JS 檔，透過 loader，也可以其他檔案類型打包在一起： sass、pug、css、png...等等，在 loader 的執行下，可以完成檔案的編譯，例如：sass -> css、pug -> html、babel 編譯 ES6 語法，並可以將系統打包，做成一個 pluging，可以在其他系統引入使用。

學到 ES6 的 promise & fetch，fetch 簡易的語法與 XHR 做不到的 await 功能，成為在 Ajax 上一個更方便的選擇！

學到 CSS 在系統上如何更輕量、更有效率，也學到 CSS 的權重計算方式！

#### 第十四週（09/14 ~ 09/20）：伺服器與網站部署

這週學到如何架站部署，透過在虛擬機商的網站註冊虛擬機伺服器、設定環境、利用 IP SSH 遠端連線、CLI 安裝環境所需軟體、將 IP 轉換 DNS，並透過 DNS 拜訪自己的網站，在過程中遇到很多的問題，我用很簡單的敘述，記錄在這篇裡面 [部署 - Deploy](https://hackmd.io/nWQklN1kR7OtmeY-FaYntg)！

#### 第十五週（09/21 ~ 09/27）：複習週

本週 showtime 將第十三週製作的留言板 Plugin 引入部落格系統，讓我了解到一個大型的專案，可以透過自行開發不同的 Plugin，然後混在一個網站裡面，並導覽了程式導師實驗計畫第四期的報名網站的架構，裡面的架構讓我覺得非常厲害，因為透過不同的工具，將時間、空間的使用效率提高，並可讀性非常高，真的是值得研究學習，希望我以後也能參與開發這種大型的網站！

這五週的學習較之前不深入，是因為範圍很大，很容易一個觀念就需要很久的時間來研究，也因為落後兩～三週的進度，覺得自己沒有太多時間可以在鑽研小觀念，所以將每週還可以再深入研究的部分都做了筆記，期望之後有時間的時候，再回來深究。

路越走越遠，態度有比較隨便，離初衷遠了一些，明天要進入第十六週了，希望自己找回幹勁，並堅持走完這段自己選擇的路，與所有仍在路上的同學們一起畢業，一起找到工作，打起精神來！