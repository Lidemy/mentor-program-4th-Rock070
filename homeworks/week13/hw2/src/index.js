import $ from 'jquery';
import { getComment, addComment } from './api.js';
import {getComments, getLoadMore, getCss, getForm} from './template.js';
import {escape, getQueryString, appendCommentsDOM} from './utilis.js';
    
export  function init(options){
  let siteKey = ''
  let apiUrl = ''
  let containerElement = null;
  let commentsDOM = '';
  let limit = 5;
  let offset = 0;

  let commentsClassName;
  let loadMoreIdName;
  let formClassName;
  let commentsSelector;
  let loadMoreSelector;
  let formSelector;

  siteKey = options.siteKey;
  apiUrl = options.apiUrl;
  containerElement = $(options.containerSelector);

  commentsClassName = `${siteKey}-comments`;
  loadMoreIdName = `${siteKey}-load-more`;
  formClassName = `${siteKey}-form`;

  commentsSelector = `.${commentsClassName}`;
  loadMoreSelector = `#${loadMoreIdName}`;
  formSelector = `.${formClassName}`;

  containerElement.append(getForm(formClassName), getComments(commentsClassName), getLoadMore(loadMoreIdName));
  commentsDOM = $(commentsSelector);

    
    
    // JS 動態新增 CSS
  const styleElement = document.createElement('style');
  styleElement.type = 'text/css';
  styleElement.appendChild(document.createTextNode(getCss()));
  document.head.appendChild(styleElement);

  function appendAllDOM() {
    getComment(apiUrl, siteKey, limit, offset, data => {
      if(!data.ok) {
        alert(data.message);
        return
      }

      let commentAdds = data.discussions;
      let count = data.count;
      offset += 5;
    
      if(offset >= count) {
        $(loadMoreSelector).addClass('hidden');
      }

      for (let element of commentAdds) {
        appendCommentsDOM(commentsDOM, element, false);
      }
        
    })
  }

    

    $(loadMoreSelector).click( e => {
      appendAllDOM();
    })



    $(formSelector).submit(e => {
      e.preventDefault();
    
      const dataNewToAppend = { 
        nickname: $(`${formSelector} .input-nickname`).val(),
        content: $(`${formSelector} .form-control`).val(),
        site_key: siteKey
      };
      addComment(apiUrl, dataNewToAppend, data => {
        if(!data.ok) {
          alert(data.message);
          return
        }
        
      $(`${formSelector} .input-nickname`).val('');
      $(`${formSelector} .form-control`).val('');

      appendCommentsDOM(commentsDOM, dataNewToAppend, true);
      })
    })
    appendAllDOM();
}





    







