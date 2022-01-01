document.addEventListener('DOMContentLoaded', function(){

    const main = new Main();
});

class Main{
    constructor(){
        this.header = document.querySelector('.l-header');
        // 配列にスクロールオブザーバーのインスタンスを入れる
        this._observers = [];
        this._scrollInit();
        // this._init();

    }

    set observers(val){
        this._observers.push(val);
    }

    get observers(){
        return this._observers;
    }

    // _init(){
        // new MobileMenu();
        // this.gallery = new gallerySlider('.swiper-container');
        // new tabChanges();
    // }

    // _toggleSlideAnimation(el, inview){
    //     if(inview){
    //         this.gallery.start();
    //     }else{
    //         this.gallery.stop();
    //     }
    // }

    _navAnimation(el, inview){
        if(inview){
            this.header.classList.remove('triggered');
        }else{
            this.header.classList.add('triggered');
        }
    }

    _inviewAnimation(el, inview){
        if(inview){
            el.classList.add('inview');
        }else{
            el.classList.remove('inview');
        }
    }


    _scrollInit(){
        this._observers = new ScrollObserver('.js-nav-trigger', this._navAnimation.bind(this), {once: false});
        // this._observers = new ScrollObserver('.swiper-container', this._toggleSlideAnimation.bind(this), {once: false});
        this._observers = new ScrollObserver('.appear', this._inviewAnimation);
    }
}