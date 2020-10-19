### 輸出

```
1. undefined
2. 5
3. 6
4. 20
5. 1
6. 10
7. 100
```

由上往下看，依照執行緒執行，在不同的 execution context 會有自己的 variable object or activation object、scope chain，按照綠色的註解，有順序的記錄變化，有編號的註解為輸出的順序 + 結果。

``` js
var a = 1          # globalEC.VO.a = 1
function fn(){
  console.log(a)   # 1. undefined
  var a = 5        # fnEC.AO.a = 5
  console.log(a)   # 2. 5
  a++              # fnEC.AO.a = 6
  var a
  fn2()
  console.log(a)   # 4. 20
  function fn2(){
    console.log(a) # 3. 6
    a = 20         # fnEC.AO.a = 20
    b = 100        # globalEC.VO.b = 100
  }
}
fn()
console.log(a)     # 5. 1
a = 10             # globalEC.VO.a = 10
console.log(a)     # 6. 10
console.log(b)     # 7. 100
```
```js
fn2 EC {
    AO: { },
    scopeChain: [fn2EC.AO, fnEC.scopeChain]
    = [ {a: 5,fn2: func}, { a: 1,fn: func, b: 100 } ]

}

fn EC {
    AO: {
        a: 5,
        fn2: func
    }
    scopeChain: [fnEC.AO, globalEC.scopeChain]
     = [ {a: 6, fn2: func}, { a: 1, fn: func, b: 100 } ]
}

global EC {
    VO: {
        a: 1,
        fn: func,
        b: 100
    }
    scopeChain: globalEC.[[scope]]
     = globalEC.VO
     = { a: 1, fn: func, b: 100 }
}
```