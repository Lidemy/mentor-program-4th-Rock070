## Webpack 是做什麼用的？可以不用它嗎？

webpack是前端打包用的工具，可以將很多檔案類型（例如：sass、js、png、jpg），透過不同的 loader 打包在一個檔案內，此外不同的 loader 還會有不同的編譯功能，像是 babel loader 就可以編譯 ES6 的語法。

也可以將 原本在 Node.js 上才能執行的 npm 模組，打包編譯成可以在 Web 中執行。

可以不用 webpack，可以使用 ES6 的 Import、Export 語法，也可以使用 `<script>` 標籤來引入檔案。

## gulp 跟 webpack 有什麼不一樣？

兩者定位完全不同：

### gulp
Task Manager，可以讓做到任何 Task 執行，只要你寫的出來，但原生沒有將模組打包的功能。

### webpack 
module bundler，可以將不同的檔案，打包成一個檔案，讓主檔案 `index.html` 只需要引入一個檔案即可執行。

## CSS Selector 權重的計算方式為何？

!important > inline style > ID > Class/psuedo-class(偽類)/attribute（屬性選擇器） > Element。

