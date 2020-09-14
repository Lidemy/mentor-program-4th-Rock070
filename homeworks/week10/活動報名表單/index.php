<?php 
  if(!empty($_GET['code']) && $_GET['code'] === '1') {
    echo "<script>alert('報名成功！')</script>";
  }
?>

<!DOCTYPE html>

<html>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset='utf-8'>
    <title>新拖延運動黑客松</title>
    <link rel="stylesheet" href="./style.css">

  </head>  
  
  <body>
    <header>
      <!-- <div class="img"></div> -->
      <img src="png/bg-header.png" alt="">
    </header>
    
    <section id="intro">
      <div class="img-man"></div>
      <div class="intro-content">
        <h3>你知道嗎？拖延...可以拯救世界喔</h3>
        <br>
        <p>有拖延症的人很奇怪，不是所有的事都拖，只有 <span class='yellow-text'>重要的事才拖</span>。並不是動作慢，反而大部分時間手腳還挺快的。偏偏就是那些最需要慢條斯理、按部就班的大計畫，才會拖泥帶水。這是為什麼？</p>
        <p>我們都<span class='yellow-text'>不需要戰勝拖延症，而是與之好好相處</span>，就如同我們的恐懼與黑暗面也是。只要理解背後對你的意義，與其「空性」，所有一切本身都是無害的。而且有時候（是有時候喔……）適時的小拖延，也不外乎是激發創造力與醞釀靈感的方法。願各位與拖延症有更好的相處。</p>
      </div>
    </section>
    <section id='sign-up'>
      <div class="sigh-up-content">
        <h3>我要報名</h3>
        <p>還沒試過拖延救世界的快感嗎？</p>
        <p>快來一起參與吧，點以下連結拯救人生</p>
        <a href='form.html'><button class='sign-up-btn'>線上報名</button></a>
      </div>
    </section>
    <footer>
      <p>© 2020 © Copyright. All rights Reserved.</p>
    </footer>

  
  </body>

</html>