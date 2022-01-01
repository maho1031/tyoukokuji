document.addEventListener('DOMContentLoaded', function () {
    const Moblie = new MobileMenu();
    
});

class MobileMenu{
    constructor(){
        this.DOM = {}; //thisのDOMをオブジェクトリテラルで初期化
        this.DOM.btn = document.querySelector('.js-toggle-moblileMenu');
        this.DOM.menu = document.querySelector('.js-toggle-mobileMenu-target');  //p-nav
        this.DOM.link = document.querySelector('.js-nav-menu'); //p-nav__menu
        this.eventType = this._getEventType();
        this._addEvent();
    }

    _getEventType(){
        return window.ontouchstart ? 'touchstart' : 'click';
    }

    _toggle(){
        this.DOM.menu.classList.toggle('-active');
        this.DOM.btn.classList.toggle('-active');
    }

    _remove(){
        this.DOM.menu.classList.remove('-active');
        this.DOM.btn.classList.remove('-active');
    }

    _addEvent(){
        this.DOM.btn.addEventListener(this.eventType,this._toggle.bind(this));
        this.DOM.link.addEventListener(this.eventType,this._remove.bind(this));
    }
}