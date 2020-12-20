## 請列出 React 內建的所有 hook，並大概講解功能是什麼

1. useState: 回傳一個 state 的值，以及更新 state 的 function，當 state 值改變，即會 re-render。

2. useEffect: 在畫面 render 後執行，傳遞一個「建立」function 及依賴 array。useMemo 只會在依賴改變時 function 才會被 clean 並重新宣告。

3. useLayoutEffect: 在 DOM 改變後，畫面被 render 之前執行。

4. useContext: 接收一個 context object（React.createContext 的回傳值）並回傳該 context 目前的值。Context 目前的值是取決於由上層 component 距離最近的 `<MyContext.Provider>` 的 value prop。可避免 props drilling 問題。

5. useCallback: 回傳一個 memoized 的 function。可在第二個引數新增「依賴」，當依賴被改變的時候，該 function 才會被 clean 並重新宣告。

6. useMemo: 回傳一個 memoized 的值。傳遞一個「建立」function 及依賴 array。useMemo 只會在依賴改變時才重新計算 memoized 的值。

7. useRef: useRef 回傳一個 mutable 的 ref object，.current 屬性被初始為傳入的參數。可儲存 input or textarea 的值，並賦值 .current。


## 請列出 class component 的所有 lifecycle 的 method，並大概解釋觸發的時機點

1. ComponentDidMount: 指的是當元件已經成功 render 到 DOM 上後，要做的事情，包裝成一個 function。

2. componentWillUnmount: 元件 unmount 前做的事。

componentDidMount & componentWillUnmount 是成對出現的，如果只設定一個，將會出現 error。

3. componentDidUpdate: 當 state 改變並成功渲染的時候，就會呼叫這個生命週期。

4. shouldComponentUpdate: 在元件 render 前執行，回傳 true ，可以執行並 render; 回傳 false，無法執行無法 render

## 請問 class component 與 function component 的差別是什麼？

class component 功能較完整，但語法較複雜且冗長。

function component: 語法較簡潔，無法設定 constructor。16.8 版本更新，加強了功能性，可以透過 hook 來設定 state....等等。

## uncontrolled 跟 controlled component 差在哪邊？要用的時候通常都是如何使用？

controlled component: 用 state 的方式紀錄，並跟著 state 改變而重新渲染。
uncontrolled: 不將狀態記錄到 state 裡，而是需要的時候再用 DOM & vanilla.js去取值。