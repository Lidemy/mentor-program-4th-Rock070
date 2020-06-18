## 跟你朋友介紹 Git

## Git 基本觀念
* 使用 Git 為了做到有系統的控制版本，這是你在 Google 上面，大部分人會告訴你的答案。

> 那，為什麼我需要版本控制呢?

假設：
你要寫一篇論文，這個論文會持續半年，並需要每天傳到 LINE 的群組上向教授報告每天的進度、每天寫了些什麼。

第一天，你開始撰寫論文，忙了一個下午，終於完成今天給自己設立的進度，你把檔案取名叫「論文」，上傳到 LINE 上面。

第二天，你點開第一天的檔案，繼續撰寫，寫完之後，準備上傳前，你想，為了讓大家看出今天與昨天的區別，應該要怎麼存檔阿?

你會遇到兩個選擇：
1. 新建一個檔案叫做「第二天論文」
2. 直接把原本的「報告」改作「第二天論文」。

選一的話，就不能在自己的電腦看到每天更改的進度，除非要看的時候在去 LINE 上面下載，但好麻煩，而且檔案可能會過期。

選二的話，這個論文長達半年，每天一個新檔案，不就會有一百多個檔案?

這時候，Git 就可以派上用場啦！

Git 提供版本控制的功能，而且非常方便管理，在 mac 電腦中的 Terminal，進到你想進行版本控制的資料夾，輸入`git init` ，Git 就會創建一個 .git 隱藏資料夾，監控你想加入 Git 監控的檔案。


------

## 觀念補充：

* 先用 add 將檔案放進 temp 概念的資料夾，進 stage 階段，再用 commit ，將 temp 資料夾改名為 Hash 亂碼，成為真正的新版本。
* 版本名稱會用 Hash 亂碼，避免版本名稱重複，例如：`888cee9cbe44dea043b4440c40717db716cfa0f6`
* git 可供遠端repo讓工作團隊下載，個人編輯後再上傳、合併。

![](https://backlog.com/git-tutorial/tw/img/post/intro/capture_intro1_2_2.png)

* git可提供不同版本提交的時間軸。

![git log](https://backlog.com/git-tutorial/tw/img/post/intro/capture_intro1_3_1.png)

### * 建立 Git ＆查看狀況
* 在資料夾內建立 Git 版本控制  
`git init`
* 刪除 Git 版本控制
`rm -r .git`
* 查看版本控制狀況
`git status`
```On branch master

No commits yet

nothing to commit (create/copy files and use "git add" to track)
```

### * add將檔案加入版本控制
`git add code.js`


加入所有檔案  
`git add .` 
```
➜ git:(master) ✗ git status
On branch master

No commits yet

Changes to be committed:
  (use "git rm --cached <file>..." to unstage)
	new file:   code.js
	new file:   rock.txt
```

取消加入的檔案( unstage )，變成 untracked
`git rm --cached code.js`

### * commit 新建一個版本
`git commit -m "first commit"`

commit 出去之後代表已經建立一個新的 Git版本了，會存在 git log 裡面，可以查看歷史新建紀錄

### * 如何一個指令，新增所有的 modified 檔案 到 stage 並 commit 出去 (全新檔案不適用，會失敗)
`git commit -am
`
* 全新的檔案，需要先 add 到 stage 裡面，才能進行 commit -am



### * log 查看版本更新歷史紀錄
`git log`
``` 
commit 888cee9cbe44dea043b4440c40717db716cfa0f6 (HEAD -> master)
Author: 王茂己 <rock@wangjiajide-MacBook-Air.local>
Date:   Mon Jun 15 20:51:04 2020 +0800

    first commit
```
`git log --oneline` 簡短顯示歷史
```
888cee9 (HEAD -> master) first commit
(END)
```
### * diff ，在 commit 之前，查看這次 stage 裡的版本與上次的版本的差異
`git diff`
```
diff --git a/rock.txt b/rock.txt
index 4e1053c..062e147 100644
--- a/rock.txt
+++ b/rock.txt
@@ -1 +1 @@
-Code6
+Code4
(END)
```

### * checkout 回到過去
* 初始狀態( log )，有三次 commit 紀錄
```
commit 2d4ef193227d567d3c7df70c0721b8323a0e161c (HEAD -> master)
Author: 王茂己 <rock@wangjiajide-MacBook-Air.local>
Date:   Mon Jun 15 21:28:32 2020 +0800

    third commit

commit 1f9d406a9ea3665f5a36eb949cfead3e3e7640c0
Author: 王茂己 <rock@wangjiajide-MacBook-Air.local>
Date:   Mon Jun 15 21:27:53 2020 +0800

    second commit

commit 888cee9cbe44dea043b4440c40717db716cfa0f6
Author: 王茂己 <rock@wangjiajide-MacBook-Air.local>
Date:   Mon Jun 15 20:51:04 2020 +0800

    first commit
(END)
```
* 切換到第二次版本提交後的時間點
`git checkout 1f9d406a9ea3665f5a36eb949cfead3e3e7640c0 `
* 再看一次狀態
```
commit 1f9d406a9ea3665f5a36eb949cfead3e3e7640c0 (HEAD)
Author: 王茂己 <rock@wangjiajide-MacBook-Air.local>
Date:   Mon Jun 15 21:27:53 2020 +0800

    second commit

commit 888cee9cbe44dea043b4440c40717db716cfa0f6
Author: 王茂己 <rock@wangjiajide-MacBook-Air.local>
Date:   Mon Jun 15 20:51:04 2020 +0800

    first commit
(END)
```
* 是不是回到第二次的時間了！
* 如何回去：
`git checkout master`
* 就會回到最新的版本時間上了

### * .gitignore 將不想加入版本控制裡的檔案忽略( untracked )，例如系統內建執行檔
順序：
```
touch .gitignore
vim .gitignore
test //在vim編輯器裡面輸入檔名，例如test
git status  //🍵看檔案是否還被認為是需要被 add 的，
其實就是會剩下.gitignore被偵測到
```
------


## Branch 分支
* 建立一個新的 branch，例如：
`git branch week1[branch 名稱]`  。

* 切換 branch
`git branch checkout week1[branch 名稱]`。
* 查看目前在哪個 branch，例如：
`git branch -v`
```
  master 61fb6ac forth commit
* week1  61fb6ac forth commit
(END)
```

* 刪除 branch
`git branch -d week1[branch 名稱]`






## Merge 合併

在 master 分支，把另一個分支合併進來
`git merge test[分支名稱]`

------

## Conflict 衝突
想像一下，分別有Ａ檔案與Ｂ檔案，我們建立一個 new-feature 分支，在兩人操作不同分支的情況下，分兩種狀況：
1. 同事甲改Ａ檔案，同事乙改Ｂ檔案，兩人改完後 merge，天下太平！
2. 同事甲改Ａ、Ｂ檔案，同事乙改Ｂ檔案，兩人改完之後 merge，天下大亂！

在狀況2中，Git 的邏輯要怎麼解決呢？
按照時間嗎？先 Merge 的先贏？
也不行！

解決方法： **手動解決！**


例如：衝突發生，使用 merger 的時候 :
```
➜  git git:(master) git merge new-feature
Auto-merging code.js
CONFLICT (content): Merge conflict in code.js
Automatic merge failed; fix conflicts and then commit the result.
```
檔案會出現 :

```
<<<<<<< HEAD
@@@@@@@@@@@@@      //master branch
=======
!new feature       //another branch(new-feature)
>>>>>>> new-feature
```

這時就可以直接在這個檔案修改成你要的最終版本，
```
resolve conflict
@@@@@@@@@@@@@
!new feature
```
然後改完之後存檔，直接 commit :

`commit -am "resolve confilcts"`

就解決啦！



----
## GitHub 遠端倉庫 Repository
簡單來說，GitHub 就是用來存放 Repositiry 的地方，因為是公開的，所以也變成是共享的資源，大家可以上你的 Repository 去 DownLoad 你的 Code ，一起協作一個專案。

剛創立的時候，需要將本地的資料夾與遠端的 origin（代稱） 做連結：
`git remote add origin https://github.com/Rock070/Lidemy-.git`

完成本地的 commit 後，就可以 Push 上遠端的 Origin ，分支是 master :
`git push -u origin master`

如果想 Push 分支上去：
本地的分支 test:
```
➜  Lidemy 第四期 git:(test) git commit -am "Welcome to GitHub"
➜  Lidemy 第四期 git:(test) git push -u origin test
```

就會在遠端 GitHub 上建立一個 test 分支，
並會詢問是否要發一個 Pull requests 。


> 已經知道如何將本地端的 Git Push 到遠端了，接下來先介紹，如何把遠端的版本 Pull 下來到本地端電腦。


## Git Pull 拉遠端最新版本到本地（更新本地）
`git pull origin master`

> 記得，若遠端與本地端，同時更改同一份檔案後，再進行 pull，一樣會發生 Conflict，處理方法同上方 Conflict ，更改成最終要的版本，然後 commit ，再 push 上遠端 origin，就完成本地與遠端的版本更新
。

## clone 下載遠端 Repository 的資料夾到本地端
`git clone https://github.com/Rock070/Lidemy-4th.git [Repository 連結]`
 


##  Push
![](https://backlog.com/git-tutorial/tw/img/post/intro/capture_intro3_1_1.png)


## GitHub 操作複習
若要使用已存在的別人的 Repository，把它更新成自己的版本，以下步驟：
1. Fork 別人的 Repositiory。
2. pull or clone Repository 到本地端。
3. 再本地端開一個 branch，開始做更動。
4. 做完之後，在本地的 branch commit，並 push:'git push origin [分支名稱]'，例如:
```
git commit -am "new push"
git push origin test
```
6. 接下來到 GitHub 上面看到 branch，會變成2個，且問詢問'是否可以要進行 test 分支的 Compare & Pull Request。
7. 點擊 Compare & Pull Request 之後，標題會變成剛剛 commit 上去的訊息 "new push"，並可以在下方方格中詳細留言，並可以在最下方看到版本的變動是什麼，然後按下 Create Pull Request。
8. 接著，這個 Repository 的管理者，就會看到你的 Pull Request，並有權力可以決定是否要讓你 Merge，並且可以刪除 branch。
9. 等到 Merge 成功之後，再 Pull 最新版本到本地端，這樣用 git log，就可以查到 Merge 的紀錄。
10. 若是在本地端 merge 的話，只會看到在分支 commit 的訊息就無法看到檔案的變化；因此，建議在本地端 Push branch 上 GitHub 再 merge，這樣遠端跟本地端就可以看到檔案的變化。

----

## GitHub Page
GitHub Page 提供免費的網頁空間、Domain，就是不用自己架置主機，只要在 GitHub 給的網址後方輸入相對路徑，就可以用瀏覽器開啟你的程式碼檔案。



1. 在 Repository 的 Settings 裡面，找到 GitHub Page 這個功能。
2. 把 Source 改成 master
3. 即可得到自己的網址，例如:https://rock070.github.io/Lidemy-4th/
4. 貼上相對路徑，例如: https://rock070.github.io/Lidemy-4th/rock.js
5. 首頁網址就是:https://rock070.github.io/Lidemy-4th
6. 以 README.md 做導覽頁面


## GitHub Flow
1. Create branch
2. Add commit
3. Open a Pull Request
4. Review & dicuss code
5. merge

------

## Git 狀況劇
### 打錯字  Git commit --amend  修正
commit 之後發現打錯字了，例如： commit -am "neq add"，" new " 打成 " neq "，這時就可以用這個指令:

`git commit --amend`

就可以進去 Vim 編輯器去改 commit messange

> 備註：

如果你已經 commit 而且又 push 了，那就乖乖認命吧，這種情形下你在 local 端改的話可能會造成其他人的困擾。

最好的方法還是 push 之前先檢查一下，避免錯的東西被放到遠端。



### 取消 commit 
`git reset HEAD\^ --hard `

直接刪除 commit，檔案回到原本的狀態，改變都不見

`git reset HEAD\^ --soft (預設)`

檔案回到修改過，但未 commit 的狀態（modified），改變都還在

git reset 版本號，例如：

`git reset df4fb6c424e1ec50490203b739511206331169e7`

### 我還沒 commit，但我改的東西我不想要了
`git checkout --<file>`
會直接回復上一個 commit 的狀態

### 我想改 branch 名稱
直接到所在 branch 分支，輸入 "git branch -m [新的名稱]"

### 想摘下遠端的 branch 給你
本地端想用遠端有但本地端沒有的 branch，可以直接在本地端輸入：

`git checkout [遠端branch 名稱]`

即可在本地端使用那條 branch。

------

## Git Hook
即為：發生某件事情的時候通知我。


------

參考資料：[連猴子都能懂的 Git 入門指南](https://backlog.com/git-tutorial/tw/)