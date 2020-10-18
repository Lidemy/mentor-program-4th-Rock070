# 部署心得

連結：[半成品部落格官網](http://rock070.tw/rock070_blog/index.php)

卡關卡的真的很久，也遇到很多問題，後來偷偷看了，[部署 AWS EC2 遠端主機 + Ubuntu LAMP 環境 + phpmyadmin](https://github.com/Lidemy/mentor-program-2nd-yuchun33/issues/15)，一步一步照著做，還是出現了很多卡關，所以把他們紀錄一下：


## 本地主機無法選到金鑰

因為對於系統來說，我的檔案權限太過寬鬆，其他系統使用者也可以存取到，所以必須先更改檔案權限：

`chmod 600 /path/to/key.pem`

參考：[解決 WARNING: UNPROTECTED PRIVATE KEY FILE!](https://www.opencli.com/linux/fix-warning-unprotected-private-key-file)



## 在虛擬機環境上，PhpMyAdmin 遇到錯誤訊息

`count(): Parameter must be an array or an object that implements Countable`

這邊是 php 檔案原生的問題，所以必須要進去 php 原生檔案裡面去修改程式碼。

`sudo vim /usr/share/phpmyadmin/libraries/plugin_interface.lib.php`

```php
// 551 行，將 count($options) > 0 拔除
if ($options != null ) {
    // …..
}
```
`sudo vim /usr/share/phpmyadmin/libraries/sql.lib.php`

```php
# 613行，替換成以下判斷式
|| ((count($analyzed_sql_results['select_expr']) == 1)
```

參考：[Install phpMyAdmin on Ubuntu](https://blog.johnsonlu.org/install-phpmyadmin-on-ubuntu/)
[[鐵人賽Day07] - URL複寫(URL Rewrite)](https://ithelp.ithome.com.tw/articles/10204146)


## `session_start` 呼叫必須在所有網頁內容之前

Error:`Warning: Cannot modify header information - headers already sent`

這邊是 php 設定的問題，`session_start` 的使用必須在程式碼最前端，也就是網頁內容出現之前，否則就會出錯。

參考：[PHP 錯誤 - headers already sent
](https://blog.xuite.net/vexed/tech/26406775-PHP+%E9%8C%AF%E8%AA%A4+-+headers+already+sent)

## 短標籤的開關是否打開

這邊卡關卡了整整兩天，一開始的程式碼加上 `phpinfo()` 也無法印出 php 的訊息，加上 `ini_set('display_errors', 1);` 也無法印出 error，所以我就把程式碼切成好幾塊，試圖查找出是哪一部分出問題，最後發現是 php 短標籤預設是關閉，所以當我使用 `<?= $row['name']?>` 會報錯 ; `<?php echo $row['name'] ?>` 不會報錯，所以我就把 php init 的檔案中的 `short_open_tag` 打開，就解決了，這個小地方卡了我兩天，解完當下整個通體舒暢！

參考：[500 Internal Server Error for php file not for html](https://stackoverflow.com/questions/17693391/500-internal-server-error-for-php-file-not-for-html)、
[duplicate][PHP錯誤Parse error: syntax error, unexpected end of file in test.php on line 12解決方法](https://codertw.com/%E7%A8%8B%E5%BC%8F%E8%AA%9E%E8%A8%80/224368/)、
[php中如何设置短标签short_open_tag为打开状态](BlogCommendFromMachineLearnPai2)

## 總結
當然我知道部署完這次後，以後還是會遇到很多崩潰的問題，但至少這些問題使我崩潰過了，所以是有學到東西的，GOGOGO!