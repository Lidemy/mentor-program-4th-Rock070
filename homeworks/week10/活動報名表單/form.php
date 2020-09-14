

<!DOCTYPE html>

<html>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset='utf-8'>
    <title>新拖延運動報名表單</title>
    <link rel="stylesheet" href="./style.css">
  <script>
    document.addEventListener('DOMContentLoaded', function() {

      const ansName = document.querySelector('input[name=name]')
      const ansEmail = document.querySelector('input[name=email]')
      const ansPhone = document.querySelector('input[name=phone]')
      const ansRegister = document.querySelectorAll('input.register-input')
      const ansHowKnow = document.querySelector('input[name=howKnow]')
      
      // var ansRegisterValue = null ;

      function addWarn(ans) {
        const warn = document.createElement('div')
        console.log(document.querySelector(`.${ans.getAttribute('name')}`))

        const father = document.querySelector(`.${ans.getAttribute('name')}`)
        warn.innerText = '此欄位不可為空！'
        warn.classList.add('redText')
        father.appendChild(warn)
      }

      function removeWarn(ans) {
        const father = document.querySelector(`div.${ans.getAttribute('name')}`)
        const redText = document.querySelector(`div.${ans.getAttribute('name')} > div.redText`)
        if(redText){
          father.removeChild(redText)
        }
      }
          
      function isInput(ans) {
        if(!ans.value) {
          return false
        }
        return true
      }

      function isInputRadio(ans) {
        for (let i = 0;i < ans.length; i+=1 ) {
          // console.log(ans[i].checked);
          if (ans[i].checked) {
            ansRegisterValue = ans[i]
            return true
          }
        }
        return false
      }

      function getUncheckedInputRadioValue(ans) {
        for (let i = 0;i < ans.length; i+=1 ) {
          if (!ans[i].checked) {
            return ans[i]
          }
        }
        return false
      }
      // 問題在 ansRegisterValue 沒有值
      // console.log(document.querySelector(`.${ansRegister[0].getAttribute('name')}`))

      function submitTest() {
        if (!isInput(ansName)) {
          addWarn(ansName)
        }
        if (!isInput(ansEmail)) {
          addWarn(ansEmail)
        }
        if (!isInput(ansPhone)) {
          addWarn(ansPhone)      
        }
        
        if (!isInputRadio(ansRegister)) {
          // console.log(ansRegisterValue)
            let ans = getUncheckedInputRadioValue(ansRegister);
            addWarn(ans);
          
          }
        
        if  (!isInput(ansHowKnow)) {
          addWarn(ansHowKnow)
        } 
      }     
               
        
    

      function isSubmit() {
        if (isInput(ansName) && isInput(ansEmail) && isInput(ansPhone) && isInputRadio(ansRegister) && isInput(ansHowKnow)){
          return true
        }
        return false
      }
      function alertValue() {
        alert(`暱稱：${ansName.value}
電子郵件：${ansEmail.value}
手機號碼：${ansPhone.value}
報名類型：${ansRegisterValue.value}
怎麼知道這個活動的：${ansHowKnow.value}
對活動的一些建議：${document.querySelector('input[name=advice]').value}`)
      }
      document.querySelector('form').addEventListener('submit', function(e){
        if (!isSubmit()) {
          e.preventDefault()
          removeWarn(ansName)
          removeWarn(ansEmail)
          removeWarn(ansPhone)
          removeWarn(ansRegister[0])
          removeWarn(ansHowKnow)
          submitTest()
          return false
        }
        alertValue()
        return true
        })
    })

  </script>
       
       
  </script>
  </head>  
  
  <body>
    
<div class="content">
    <div class="content-box">
      <div class="topYellow"></div>
      <div class="inner">
        <header>
          <h1 class="title">新拖延運動報名表單</h1>
        </header>
        <section id="info">
          <p>活動日期：2020/12/10 ~ 2020/12/11<br/>活動地點：台北市大安區新生南路二段1號</p>
          <div class="mark">*必填</div>
        </section>
        <form action='./submit.php' method='POST' >
          <section id="form">
              <div class="name">
              <div class="title">暱稱<span>*</span></div>
              <input type="text" placeholder="你的回答" name='name' />
              </div>
              <div class="email">
              <div class="title">電子郵件<span>*</span></div>
              <input type="email" placeholder="你的電子郵件" name='email'  />
              </div>
              <div class="phone">
              <div class="title">手機號碼<span>*</span></div>
              <input type="text" placeholder="你的手機號碼" name='phone' />
              </div>
              <div class="register">
                <div class="title">報名類型<span>*</span></div>
                <input class='register-input' id="bed" type="radio" name="register" value="躺在床上用想像力實作"   />
                <label for="bed">躺在床上用想像力實作</label><br/>
                <input class='register-input' id="floor" type="radio" name="register" value="趴在地上滑手機找現成的"  />
                <label for="floor">趴在地上滑手機找現成的</label>
              </div>
              <div class="howKnow">
              <div class="title">怎麼知道這個活動的？<span>*</span></div>
              <input type="text" placeholder="你的回答" name='howKnow' />
              </div>
              <div class="other">
              <div class="title">其他</div>
              <p>對活動的一些建議</p>
              <input type="text" placeholder="你的回答" name='advice' />
              </div>
          
        </section>
        <input class="submit" type="submit" />
      </form>
        <p class="remind">請勿透過表單送出您的密碼。</p>

      </div>
    </div>
  </div>
  <footer>
    <p>© 2020 © Copyright. All rights Reserved.</p>
  </footer>

  
  </body>

</html>