``` js
function isValid(arr) {
  for(var i=0; i<arr.length; i++) {      第迴
    if (arr[i] <= 0) return 'invalid'    一圈
  }                                      個
  for(var i=2; i<arr.length; i++) {                       第
    if (arr[i] !== arr[i-1] + arr[i-2]) return 'invalid'  二
  }                                                       個
  return 'valid'                                          迴  
}                                                         圈

isValid([3, 5, 8, 13, 22, 35])
```


### 第一個迴圈：
1. 執行第一行，帶入引數 [3, 5, 8, 13, 22, 35]。
2. 執行第二行，設定變數 i 等於 0，檢查 i 是否小於引數的長度（6），是，繼續執行。
3. 進入第一圈迴圈。
4. 執行第三行，判斷引數中的第 0 位數（3），是否 <= 0，不是，第一圈迴圈結束。
5. 跑回第二行，i++，i 變成 1，判斷 i 是否小於引數的長度（6) ，是，繼續執行。
6. 進入第二圈迴圈。
7. 執行第三行，判斷引數中的第 1 位數（5），是否 <= 0，不是，第二圈迴圈結束。
8. 跑回第二行，i++，i 變成 2，判斷 i 是否小於引數的長度（6) ，是，繼續執行
9. 進入第三圈迴圈。
10. 執行第三行，判斷引數中的第 2 位數（8），是否 <= 0，不是，第三圈迴圈結束。
11. 跑回第二行，i++，i 變成 3，判斷 i 是否小於引數的長度（6) ，是，繼續執行。
12. 進入第四圈迴圈。
13. 執行第三行，判斷引數中的第 3 位數（13），是否 <= 0，不是，第四圈迴圈結束。
14. 跑回第二行，i++，i 變成 4，判斷 i 是否小於引數的長度（6) ，是，繼續執行。
15. 進入第五圈迴圈。
16. 執行第三行，判斷引數中的第 4 位數（22），是否 <= 0，不是，第五圈迴圈結束。
17. 跑回第二行，i++，i 變成 5，判斷 i 是否小於引數的長度（6) ，是，繼續執行。
18. 進入第六圈迴圈。
19. 執行第三行，判斷引數中的第 5 位數（35），是否 <= 0，不是，第六圈迴圈結束。
20. 跑回第二行，i++，i 變成 6，判斷 i 是否小於引數的長度（6) ，不是，第一個迴圈結束。


### 第二個迴圈：
21. 執行第五行，設定變數 i 等於 2，檢查 i 是否小於引數的長度（6），是，繼續執行。
22. 進入第一圈迴圈。
23. 執行第六行，判斷引數中的第 2 位數（8）是否不等於第 1 位數（5）加上第 0 位數（3），否，第一圈迴圈結束。
24. 跑回第五行，i++，i 變成 3，判斷 i 是否小於引數的長度（6) ，是，繼續執行。
25. 進入第二圈迴圈。
26. 執行第六行，判斷引數中的第 3 位數（13）是否不等於第 2 位數（8）加上第 1 位數（5），否，第二圈迴圈結束。
27. 跑回第五行，i++，i 變成 4，判斷 i 是否小於引數的長度（6) ，是，繼續執行。
28. 進入第三圈迴圈。
29. 執行第六行，判斷引數中的第 4 位數（22）是否不等於第 3 位數（13）加上第 2 位數（8），是，回傳 invalid。
30. 執行完畢。


