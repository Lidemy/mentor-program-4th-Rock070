## 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。

### 1. `<code>button</code>` 

code 標籤用在段落裡來表示這是一段程式碼。

### 2. `<hr></hr>` 

與 br 標籤一樣為分行性質，但 hr 標籤有畫線的功能，可以用 border-bottom 來調整屬性。

### 3. `<audio></audio>`

用來嵌入 MP3, WAV, OGG 音檔，audio 標籤內需有 source 標籤來嵌入音源，若有多個音源在一個 audio 內，瀏覽器只會顯示第一個可以支援的 source。

列兩個重要的特性(attribute)：

* control: 用以顯示播放音檔的介面。
*  loop: 重複播放。

範例程式碼：

```
<audio controls>
  <source src="horse.ogg" type="audio/ogg">
  <source src="horse.mp3" type="audio/mpeg">
  Your browser does not support the audio tag.
</audio>
```

## 請問什麼是盒模型（box modal）

![](https://guxinyan.github.io/blogImg/%E6%A0%87%E5%87%86%E7%9B%92%E6%A8%A1%E5%9E%8B.png)

當你打開瀏覽器的 DevTool 可以看到一個小盒子，代表著每一個元素的 box-model ，所謂 box-model 包含了 content、padding、border、margin，這些屬性的大小加起來就是元素的 box-model 大小。

若有排版問題，可以試著用 box-sizing 這個 css 屬性調整：
1. border-sizing:content-box

    預設值，實際寬高＝所設定的數值＋border＋padding

2. border-sizing:border-box
    
    實際寬高＝所設定的數值(已包含border和padding)


## 請問 display: inline, block 跟 inline-block 的差別是什麼？

### 1. block

例如：div、h1、p...

特型：佔據整排的空間。

### 2. inline

例如：sapn、a

特性：根據元素內的大小來決定大小，無法調寬高，只能調左右的邊界(margin)，無法調上下的 margin。<br>
padding 可以撐開左右會移動，但上下的部分以不影響元素位置為主，以中心點往上下撐開，位置不變。

### 3. inline-block

例如：button、input、select...

特性：對外像 inline 可併排、對內像 block 可調各種屬性。

## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？

1. static： 為預設值，各個元素會按照原本特性排版定位。
2. relative：相對元素原本位置做定位。
3. absolute： 相對上一層非 static 的元素做定位，會將原本的元素的 static 屬性取消，後面的元素會直接遞補原本元素的位置，通常會應用在針對上層元素做定位，將上層元素的定位設定成 relative，若上層無設定 relative 定位，則會直接針對 body 做絕對定位。
4. fixed： 會將元素針對瀏覽器（viewport）定位，不論頁面如何捲動，都會固定定位在設定的瀏覽器視窗的位置上。
5. sticky：當瀏覽器捲動，元素到達設定的值的位置的時候，將會變成 fixed 狀態，例如： top: 0px，當瀏覽器捲動到達該元素 top = 0px 的位置時，繼續向下捲動，該元素將 fixed 在瀏覽器的 viewport 視窗上，可應用在 navbar、通訊錄滾動視窗分類 (姓名 a、b、c、d...)。
