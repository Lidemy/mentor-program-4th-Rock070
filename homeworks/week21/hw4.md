## 為什麼我們需要 React？可以不用嗎？

可以不用，若沒有 React，會需要儲存跟畫面連動的資料，每次變動資料，重新渲染畫面（刪除再新增）時，需要自行寫刪除與新增的函式並執行，且需要寫畫面上觸發事件與資料連動的函式，要很多時間去寫函式。

如果使用 React，就可以透過 state 來統一紀錄資料，並透過 hook、props 來控管 state，預設 state 內的資料有任何變動，畫面都會整個 re-render。

## React 的思考模式跟以前的思考模式有什麼不一樣？

使用 React 需要思考哪些畫面會需要一直 re-render，將那部分需要變動的資料透過 state 來管理，交給 React 來判斷是否需要 re-render，就可以充分的利用 React 框架帶來的方便。

## state 跟 props 的差別在哪裡？

state：在 parent component 內宣告且使用，是整個 APP 使用的資料。

props：是 parent component 與 child component 溝通的方式，透過 props 將 parent component 內的 function、資料，傳進 child component 內使用。