## 教你朋友 CLI

一般跟電腦溝通有兩種方式
1. 圖形化介面（ GUI ）

透過點選的方式來操作，例如桌面，我點選右鍵，就有可以選擇桌面要如何檢視，是用中圖示、小圖示還是大圖示，可以透過**點選**的方式，來操作電腦。

![](https://www.techmarks.com/wp-content/uploads/2018/08/%E9%9A%B1%E8%97%8FWindows%E6%A1%8C%E9%9D%A2%E5%9C%96%E7%A4%BA1.png)

2. Command Line( CLI )

透過輸入文字的方式來操作電腦，所以就必須學習不同操作電腦的指令。
這邊用 MacOS 系統來解說，你可以找到一個內建的程式 Terminal，在這裡面可以打文字，例如：

![](https://ithelp.ithome.com.tw/upload/images/20161208/20102342Co0Bq9HX3B.png)
這邊輸入 `程式 -v`，用來查這個程式的版本是什麼。

------

# command line 指令
接下來介紹一些指令，可以自行試試看哦！

* `cat 檔案`  顯現檔案內文字
例如
`cat code.js`
```js
Hello world

for(var i=0;i<3;i++){
    console.log(i)
 }
```
* grep 抓取關鍵字
例如，從 test.html 這個檔案中，抓取有提到[ o ]，這個字母的行，用於搜尋功能。
`
grep o test.html
`
* wget ，下載檔案或網頁原始碼
例如:下載 GOOGLE 首頁的原始碼
`wget https://google.com`
下載圖片
`wget https://avatars0.githubusercontent.com/u/53036805?v=4`

* curl 送出 Request
例如 : 得到 GOOGLE 的 Response
`curl https://google.com`
得到 GOOGLE 的 Head
`curl -i https://google.com`
* echo 印出文字
例如： 印出 123
`echo "123"`

* redirection > 重新導向，並蓋掉原本檔案內的內容
例如： 把ls -a 的 CLI 結果輸出到 list_result 這個檔案裡面
`ls -a > list_result`
把 echo 的結果重新導向到 test.txt 這個檔案裡面
`echo "123" > test.txt`

* append >> 附在後方
例如：text.txt 內已有文字 "123"，將 "456"，附在原有文字後方
`echo "456" >> test.txt`


* pipe | 指令組合，將前面檔案的輸出，變成後面檔案的輸入
例如：找出 test.txt 中 含字元 [ o ]的行
```
cat test.txt | grep o 
等於
grep o test.txt
將結果重新導向成檔案
cat test.txt | grep o > result
```


