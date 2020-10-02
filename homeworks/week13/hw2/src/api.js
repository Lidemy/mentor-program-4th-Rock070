import $ from 'jquery'

export function getComment(apiUrl, siteKey,limit, offset, cb) {
  $.ajax({
    type: 'GET',
    url: `${apiUrl}/api_comments.php?site_key=${siteKey}&limit=${limit}&offset=${offset}`,
        
  }).done(function(data){
    cb(data)    
  })
}

export function addComment(apiUrl, dataNewToAppend, cb) {
  $.ajax({
    type: 'POST',
    url: `${apiUrl}/api_add_comments.php`,
    data: dataNewToAppend
  }).done(function(data){
    cb(data);
  })
}

