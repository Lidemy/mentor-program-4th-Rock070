export function getComments(commentsClassName) {
  return `<div class=${commentsClassName}></div>`
}
export function getLoadMore(loadMoreIdName) {
  return  `<button class='btn btn-primary' id=${loadMoreIdName}>Load More</button>`
}
export function getCss() {
  return ` .card {
              margin-top: 12px;
              padding: 0px 10px;
            }
            .hidden {
              display: none;
            }
         `
}

export function getForm(formClassName) {
  return `
        <div>
          <form class=${formClassName}>
            <div class="form-group">
              <label for="nickname-input">暱稱</label>
              <input class="input-nickname" id="nickname-input" style='display: block; width: 100%;'/>
            </div>
            <div class="form-group">
              <label for="content-textarea">留言內容</label>
              <textarea class="form-control" id="content-textarea" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        `
}
    
