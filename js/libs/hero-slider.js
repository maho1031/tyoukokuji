document.addEventListener('DOMContentLoaded', function () {
    const hero = new HeroSlider('.swiper-container');
    hero.start();
});
class HeroSlider {
    constructor(el) {
        this.el = el;
        this.swiper = this._initSwiper();
    }

    _initSwiper() {
        return new Swiper(this.el, {
            // Optional parameters
            // direction: 'vertical',
            loop: true,
            grabCursor: true,
            spaceBetween: 0,
            // effect: 'coverflow',
            centeredSlides: true,
            slidesPerView: 1,
            speed: 1000,
            loopedSlides: 3,
            breakpoints: {
                // 画面幅が 640px 以上の場合（window width >= 640px）
                640: {
                    slidesPerView:2,  //スライドを2つ（分）表示
                    spaceBetween: 5
                },
                // 画面幅が 980px 以上の場合（window width >= 980px）
                980: {
                    slidesPerView: 3,
                    spaceBetween: 10
                }
              },
              // If we need pagination
              pagination: {
                el: '.swiper-pagination',
              },
            
              // Navigation arrows
              navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
              },
        });
    }

    start(options = {}) {
        options = Object.assign({
            delay: 4000,
            disableOnInteraction: false
        }, options);
        
        this.swiper.params.autoplay = options;
        this.swiper.autoplay.start();
    }
    stop() {
        this.swiper.autoplay.stop();
    }
}