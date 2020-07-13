## 請以自己的話解釋 API 是什麼
### API

API 英文全名為 「 Application Programming Interface 」，中文為「 應用程式介面 」，為什麼要有這個東西，其實很簡單：用來溝通、交換資料。

假如我需要製作飯店住房率看板，我需要飯店的後端人員提供後台統計資料，也就是提供一個後台的 API 給我，來去得到我需要的資料

#### 提供 API 的人，可以定義哪些東西要給對方。

後台人員擁有所有的統計資料，當我提出我需要的資料時，他可以只將我需要的房型、住房率、房間特色等等資料，做成一個 API，而不是所有資料，這是 API 的一個作用，就是可以由做的人選擇要提供什麼資訊給使用者。


### Web API

Web API，顧名思義，要透過網路來用網站溝通、交換資料，換句話來說，是符合 HTTP 協定的 API，可以透過 HTTP 協定中的 GET（得到）、 POST（新增）、 PUT（修改）、 DELETE（刪除）... 等等，這幾種功能來使用 API。

例如：我是 Twitch 的創辦人，大家想要跟我拿遊戲各直播的名稱、流量、遊戲名稱、編號，我可以提供一個 API 來給需要使用的人，使用者可以透過這個 API 來得到我提供的資料。

API 提供的是一個介面，所以，假如我想要我的網站有 Facebook 登入的功能，我也可以透過 Facebook 提供的 API 來把登入功能設定在我的網站上面。

## 請找出三個課程沒教的 HTTP status code 並簡單介紹

1. 410 Gone


表示所請求的資源不再可用，將不再可用。當資源被有意地刪除並且資源應被清除時，應該使用這個。在收到410狀態碼後，用戶應停止再次請求資源。但大多數伺服器端不會使用此狀態碼，而是直接使用404狀態碼。

2. 503 Service Unavailable


由於臨時的伺服器維護或者過載，伺服器當前無法處理請求。這個狀況是暫時的，並且將在一段時間以後恢復。如果能夠預計延遲時間，那麼回應中可以包含一個 Retry-After 頭用以標明這個延遲時間。如果沒有給出這個 Retry-After 資訊，那麼客戶端應當以處理 500 回應的方式處理它。

3. 401 Unauthorized


類似於 403 Forbidden，401 語意即「未認證」，即用戶沒有必要的憑據。該狀態碼表示當前請求需要用戶驗證。該回應必須包含一個適用於被請求資源的 WWW-Authenticate 資訊頭用以詢問用戶資訊。客戶端可以重複提交一個包含恰當的 Authorization 頭資訊的請求。如果當前請求已經包含了 Authorization 憑證，那麼 401 回應代表著伺服器驗證已經拒絕了那些憑證。如果 401 回應包含了與前一個回應相同的身分驗證詢問，且瀏覽器已經至少嘗試了一次驗證，那麼瀏覽器應當向用戶展示回應中包含的實體資訊，因為這個實體資訊中可能包含了相關診斷資訊。
注意：當網站（通常是網站域名）禁止IP位址時，有些網站狀態碼顯示的 401，表示該特定位址被拒絕存取網站。

## 假設你現在是個餐廳平台，需要提供 API 給別人串接並提供基本的 CRUD 功能，包括：回傳所有餐廳資料、回傳單一餐廳資料、刪除餐廳、新增餐廳、更改餐廳，你的 API 會長什麼樣子？請提供一份 API 文件。


### 首頁：
**Request:**
`https://rockwang/api/restaurants`

**Response 200:** 
```JSON
[
  {
    "id": 1,
    "name": "zebra",
    "number": "04-37028988",
    "address": "403台中市西區英才路601號",
    "url": "https://www.hotelroyal.com.tw/taichung/dining.aspx?NO=1405",
    "photo": "https://www.hotelroyal.com.tw/upload/Banner/201904/20190412193601576CE264.jpg",
  },
  {
    "id": 2,
    "name": "鮭魚大助",
    "number": "04-37022988",
    "address": "403台中市西區向上路601號",
    "url": "https://www.hotelroyal.com.tw/taichung/dining.aspx?NO=1405",
    "photo": "https://www.hotelroyal.com.tw/upload/Banner/201904/20190412193601576CE264.jpg",
  },
]
```

### 一、GET ( 回傳資料 )
**Request** :

`rockwang/api/restaurants/1`


**Response 200:**
```JSON

{
  "id": 1,
  "name": "zebra",
  "number": "04-37028988",
  "address": "403台中市西區英才路601號",
  "url": "https://www.hotelroyal.com.tw/taichung/dining.aspx?NO=1405",
  "photo": "https://www.hotelroyal.com.tw/upload/Banner/201904/20190412193601576CE264.jpg",
}


```

### 二、DELETE ( 刪除餐廳 )

**Request** :

`rockwang/api/restaurants/1`


**Response 204**

### 三、POST ( 新增餐聽 )

**Request** :

`rockwang/api/restaurants/`

```JSON
{
  "name": "Tasty",
  "number": "04-23102522",
  "address": "403台中市西區健行路1049號金典綠園道4F",
  "url": "https://www.tasty.com.tw/",
  "photo": "https://picdn.gomaji.com/products/o/407/215407/215407_1_1.jpg",
}
```

**Response 200:**
```JSON
{
  "id": 3,
  "name": "Tasty",
  "number": "04-23102522",
  "address": "403台中市西區健行路1049號金典綠園道4F",
  "url": "https://www.tasty.com.tw/",
  "photo": "https://picdn.gomaji.com/products/o/407/215407/215407_1_1.jpg",
  "CreateAt": "2020-07-12T07:02:26.063Z",
}

```
### 四、PATCH ( 更改餐廳 )

**Request** :

`rockwang/api/restaurants/1`

```JSON
{
  "number": "04-23914555",
}
```

**Response 200:**
```JSON
{
  "id": 1,
  "name": "zebra",
  "number": "04-23914555",
  "address": "403台中市西區英才路601號",
  "url": "https://www.hotelroyal.com.tw/taichung/dining.aspx?NO=1405",
  "photo": "https://www.hotelroyal.com.tw/upload/Banner/201904/20190412193601576CE264.jpg",
  "CreateAt": "2020-07-12T07:02:26.063Z",
}

```

參考資料：
1. [wikipedia-USB](https://zh.wikipedia.org/wiki/USB)
2. [wikipedia-HTTP 狀態碼](https://zh.wikipedia.org/wiki/HTTP%E7%8A%B6%E6%80%81%E7%A0%81)
