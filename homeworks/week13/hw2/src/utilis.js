export function escape(unsafe) {
  return unsafe
    .replace(/&/g, "&amp;")
    .replace(/</g, "&lt;")
    .replace(/>/g, "&gt;")
    .replace(/"/g, "&quot;")
    .replace(/'/g, "&#039;");
}

export function getQueryString() {
  let urlParams = new URLSearchParams(window.location.search);
  return urlParams.get('site_key')
}

export function appendCommentsDOM(container, comment, isPrepend) {
  const html = `
    <div class="card">        
      <div class="card-body">
        <h4 class="card-title">${escape(comment.nickname)}</h4>
        <p class="card-text">${escape(comment.content)}</p>
      </div>
    </div>`;
  if (isPrepend) {
    container.prepend(html);
  } else {
    container.append(html);
  }
}