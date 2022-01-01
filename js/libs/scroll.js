
class ScrollObserver{
    constructor(els, cb, options){
        // クラスの中のプロパティに値を格納
        this.els = document.querySelectorAll(els);
        const defaultOptions = {
            root: null,  //交差する要素の親要素を取得する
            rootMargin: "0px",　//交差点にmarginを設定
            threshold: 0, // 入ってくる要素の下部分が交差点に入ると監視（１は上部分）
            once: true
        };
        // ioに渡すオブジェクト
        this.cb = cb;
        this.options = Object.assign(defaultOptions, options);
        // onceがtrueかfalse
        this.once = this.options.once;
        this._init();
    }

    _init(){
        const callback = function(entries, observer){
            entries.forEach(entry => {

                // entries:画面の中に入ってきたHTML要素が格納
                if(entry.isIntersecting){
                    
                    this.cb(entry.target, true);
                    if(this.once){
                        //1回入ったタイミングで監視をやめたい時（targetには登録したDOMが入っている）->監視を解除
                        observer.unobserve(entry.target);
                    }
                    
                }else{
                    // onceがfalseの場合は監視を繰り返す
                    this.cb(entry.target, false);
                }
            });
    };

    // このままだとwindowオブジェクトが入るのでthisをbindさせる
    this.io = new IntersectionObserver(callback.bind(this), this.options);

    // 100msごとにスクロールの値を監視する
    this.io.POLL_INTERVAL = 100;

    // elsに格納されている要素が一つずつループで処理される
    this.els.forEach(el => this.io.observe(el));
}

destory(){
    this.io.disconnect();
}
}


// 上手くいかないときは上手くいかない箇所のthisをconsole.logで確認する