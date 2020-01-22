document.addEventListener("DOMContentLoaded", function() {

  const loading = document.querySelector('.front__bg');

  setTimeout(() => {
    loading.style.opacity = '0';
    loading.style.visibility = 'hidden';
  }, 2000);

    // ハンバーガーメニュー用
    let menu = document.querySelector('.header__spmenu');

    menu.addEventListener('click', function() {
        document.body.classList.toggle('open');
    });

    // swiper.js
    let swiper = new Swiper('.swiper-container', {
      loop: true,
      effect: 'fade',
      autoplay: {
        delay: 8000,
        disableOnInteraction: false
      },
    });

    function showAnimation() {

      var element = document.getElementsByClassName('fade__in__out');
      if(!element) return; // 要素がなかったら処理をキャンセル
      
      var showTiming = window.innerHeight > 768 ? 200 : 40; // タイミング調整
      var scrollY = window.pageYOffset;
      var windowH = window.innerHeight;
    
      for(var i=0;i<element.length;i++) { var elemClientRect = element[i].getBoundingClientRect(); var elemY = scrollY + elemClientRect.top; if(scrollY + windowH - showTiming > elemY) {
          element[i].classList.add('show');
        } else if(scrollY + windowH < elemY) {
          // 上にスクロールして再度非表示にする場合はこちらを記述
          element[i].classList.remove('show');
        }
      }
    }
    showAnimation();
    window.addEventListener('scroll', showAnimation);

});