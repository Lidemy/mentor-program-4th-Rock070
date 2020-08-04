## 什麼是 DOM？

DOM，Document Object Model，全名「文件物件模型」，是瀏覽器的文件架構。

在DOM的標準下，一份文件中所有的標籤定義，包括文字，都是一個物件，這些物件以文件定義的結構，形成了一個樹狀結構。

讓 JavaScript 與 HTML 之間透過 DOM 這一個橋樑溝通，將 Document 當成一個物件來看，這個物件有很多的節點 (Node)，以下圖示：

![](https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/DOM-model.svg/1200px-DOM-model.svg.png)

## 事件傳遞機制的順序是什麼；什麼是冒泡，什麼又是捕獲？

先來看這張圖：
![](https://miro.medium.com/max/2038/1*NrgJ4ygwxBGs4RohkH1FDA.png)

當我們觸發某元素的事件時，會出現三個事件階段：

#### 1. capture phase 捕獲階段
意思就是當我點擊 td 的時候，瀏覽器從 window 出發，經過每個節點，到達 td 前，叫做捕獲。
#### 2. target phase 目標階段
td 階段。
#### 3. bubbling phase 冒泡階段
當捕獲到 td 時，會一路從 td 回到 window，這一段叫做冒泡。

## 什麼是 event delegation，為什麼我們需要它？

若今天要動態新增元素每一個元素都要有一個「事件監聽」的機制，這樣的話，效率非常低，所以我們可以使用「事件代理」。

例如：利用 div 包住所有 button，將 eventListener 掛在 div 上，藉以達到事件冒泡，讓 button 也會掛有 div 設定的 eventListener 事件監聽。

這樣透過父節點來處理子節點的事件，就叫做事件代理。

## event.preventDefault() 跟 event.stopPropagation() 差在哪裡，可以舉個範例嗎？


#### 1. event.preventDefault() 跟 event.stopPropagation() 的差異
前者用來阻止元素預設行為，後者用來阻止事件繼續傳遞到下一個節點。

#### 2. 阻止預設行為 e.preventDefault() 

範例：

登入畫面：

![](https://i.imgur.com/PC7JQWk.png)
HTML:
```xml
 <form class='login-form' action="" onsubmit="">
      <div>username
        <input type="text" name='username'>
      </div>
      <div>password
        <input type="password" name='password'>
      </div>
      <div>password again
        <input type="password" name='password2'>
      </div>
      <input type="submit">
</form>
```

我們來嘗試取消 input 輸入字母的功能，限制輸入字母 `e`：

js：
```js 
let element = document.querySelector('input[name=username]')
element.addEventListener('keypress',function(e){
  if(e.key ==='e'){
      e.preventDefault()
  }
  console.log(e.key)
})
```

鍵盤上按下 `e` 都無法輸入，但可以 log 出來 :

![](https://i.imgur.com/QLGK0BW.png)




#### 3. 阻止事件冒泡 event.stopPropagation() 
你加在哪邊，事件的傳遞就斷在哪裡，不會繼續往下傳遞。

HTML:

```xml
<div class="outer">
  <div class="inner">
    <button class="btn">click me</button>
    </div>
</div>
```

JS:

```js
addEvent('.outer')
addEvent('.inner')

             
function addEvent(className) {
    document.querySelector(className)
            .addEventListener('click',function(e) {
              console.log(className, '捕獲')
            }, true)
    document.querySelector(className)
            .addEventListener('click',function(e) {
              console.log(className, '冒泡')
            }, false)
}

document.querySelector('.btn')
                .addEventListener('click', function(e) {
                  e.stopPropagation() //這句是重點
                  console.log('.btn 目標')
              })      
```

#### * 當有 e.stopPropagation() 的時候，會 log 出：

![](https://i.imgur.com/Xe2ISGh.png)

僅有捕獲階段被 log 出來，代表到達目標（target phase）後沒有冒泡回去。

#### * 當沒有 e.stopPropagation() 的時候，會 log 出：

![](https://i.imgur.com/sLQ9niS.png)

捕獲階段跟冒泡階段都有 log 出來。


