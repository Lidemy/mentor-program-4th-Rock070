## 交作業流程

1. 在本地端建立一個當週作業 branch，例如：week1。
`git branch week1`
2. 讀 README.md
3. 在這個 branch 寫完作業
4. 輸入 git add .
5. commit 這個作業
`git commit -am "week1 作業完成"`
6. 瀏覽自我檢討及檢查作業，
7. push 上 GitHub 遠端
`git push origin master`
8. 發起 Pull Request
9. 上 [Lidemy Learning](https://learning.lidemy.com/homeworks)去新增作業，附上 PR 連結
10. 當作業已被批改後，在本地更新版本：
`git pull origin master`
11. 切換到 master branch，刪除本地當週作業的 branch
`git branch -d week1`
