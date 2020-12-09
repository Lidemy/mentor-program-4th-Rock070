import React, { useState, memo, useCallback, useRef, useEffect } from "react";
import "./App.css";

function Header() {
  return (
    <header>
      <h1 className="title">新拖延運動報名表單</h1>
      <section id="info">
        <p>
          活動日期：2020/12/10 ~ 2020/12/11
          <br />
          活動地點：台北市大安區新生南路二段1號
        </p>
        <div className="mark">*必填</div>
      </section>
    </header>
  );
}

function FormContent({
  nameValue,
  emailValue,
  phoneValue,
  typeValue,
  howknowValue,
  otherValue,
  setNameValue,
  setEmailValue,
  setPhoneValue,
  setTypeValue,
  setHowknowValue,
  setOtherValue,
}){
  return (
    <form action="">
      <section id="form">
        <div className="name">
          <div className="title">
            暱稱<span>*</span>
          </div>
          <input
            onChange={(e) => {
              setNameValue(e.target.value);
            }}
            value={nameValue}
            type="text"
            placeholder="你的回答"
            name="name"
          />
          <div className="redText hidden">此欄位不可為空</div>
        </div>
        <div className="email">
          <div className="title">
            電子郵件<span>*</span>
          </div>
          <input
            onChange={(e) => {
              setEmailValue(e.target.value);
            }}
            value={emailValue}
            type="email"
            placeholder="你的電子郵件"
            name="email"
          />
          <div className="redText hidden">此欄位不可為空</div>
        </div>
        <div className="phone">
          <div className="title">
            手機號碼<span>*</span>
          </div>
          <input
            onChange={(e) => {
              setPhoneValue(e.target.value);
            }}
            value={phoneValue}
            type="text"
            placeholder="你的手機號碼"
            name="phone"
          />
          <div className="redText hidden">此欄位不可為空</div>
        </div>
        <div className="register">
          <div className="title">
            報名類型<span>*</span>
          </div>
          <select
            onChange={(e) => {
              setTypeValue(e.target.value);
            }}
            value={typeValue}
            defaultValue=""
          >
            <option
              defaultValue="selected"
              disabled="disabled"
              value=""
            ></option>
            <option value="躺在床上用想像力實作">躺在床上用想像力實作</option>
            <option value="趴在地上滑手機找現成的">
              趴在地上滑手機找現成的
            </option>
          </select>
          <div className="redText hidden">此欄位不可為空</div>
        </div>
        <div className="howKnow">
          <div className="title">
            怎麼知道這個活動的？<span>*</span>
          </div>
          <input
            onChange={(e) => {
              setHowknowValue(e.target.value);
            }}
            value={howknowValue}
            type="text"
            placeholder="你的回答"
            name="howKnow"
          />
          <div className="redText hidden">此欄位不可為空</div>
        </div>
        <div className="other">
          <div className="title">其他</div>
          <p>對活動的一些建議</p>
          <input
            onChange={(e) => {
              setOtherValue(e.target.value);
            }}
            value={otherValue}
            type="text"
            placeholder="你的回答"
            name="advice"
          />
          <div className="redText hidden">此欄位不可為空</div>
        </div>
      </section>
      <input
        className="submit"
        type="submit"
        onClick={(e) => {
          e.preventDefault();
          if(nameValue == "" || emailValue == "" || phoneValue == "" || typeValue == "" || howknowValue == "" ) {
            if(nameValue == "") {
              document.querySelector('.name .redText').classList.remove('hidden')
            } else {
              document.querySelector('.name .redText').classList.add('hidden')
            }

            if(emailValue == "") {
              document.querySelector('.email .redText').classList.remove('hidden')
            } else {
              document.querySelector('.email .redText').classList.add('hidden')
            }

            if(phoneValue == "") {
              document.querySelector('.phone .redText').classList.remove('hidden')
            } else {
              document.querySelector('.phone .redText').classList.add('hidden')
            }

            if(typeValue == "") {
              document.querySelector('.register .redText').classList.remove('hidden')
            } else {
              document.querySelector('.register .redText').classList.add('hidden')
            }

            if(howknowValue == "") {
              document.querySelector('.howKnow .redText').classList.remove('hidden')
            } else {
              document.querySelector('.howKnow .redText').classList.add('hidden')
            }
            return
          }

          alert(`
            報名成功！

            以下為報名的資料：
            暱稱：${nameValue}
            電子郵件：${emailValue}
            手機號碼：${phoneValue}
            報名類型：${typeValue}
            怎麼知道這個活動的：${howknowValue}
            對活動的一些建議：${otherValue}
          `)
          setNameValue("")
          setEmailValue("")
          setPhoneValue("")
          setTypeValue("")
          setHowknowValue("")
          setOtherValue("")
        }}
      />
    </form>
  );
}

function App() {
  const [nameValue, setNameValue] = useState("");
  const [emailValue, setEmailValue] = useState("");
  const [phoneValue, setPhoneValue] = useState("");
  const [typeValue, setTypeValue] = useState("");
  const [howknowValue, setHowknowValue] = useState("");
  const [otherValue, setOtherValue] = useState("");

  return (
    <div className="content">
      <div className="topYellow"></div>
      <div className="inner">
        <Header />
        <FormContent
          nameValue={nameValue}
          emailValue={emailValue}
          phoneValue={phoneValue}
          typeValue={typeValue}
          howknowValue={howknowValue}
          otherValue={otherValue}
          setNameValue={setNameValue}
          setEmailValue={setEmailValue}
          setPhoneValue={setPhoneValue}
          setTypeValue={setTypeValue}
          setHowknowValue={setHowknowValue}
          setOtherValue={setOtherValue}
        />
        <p className="remind">請勿透過表單送出您的密碼。</p>
      </div>
    </div>
  );
}
export default App;

// 二次填寫的時候無法正確判斷欄位是否為空
// 正確繳交後無法清除舊答案
