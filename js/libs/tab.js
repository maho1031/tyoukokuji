
const tabs = document.querySelectorAll('.js-tab-trigger');
const contents = document.querySelectorAll('.js-tab-target');
console.log(tabs[0]);
console.log(contents);

for(let i = 0; i < tabs.length; i++){

    tabs[i].addEventListener("click", function(e){
        e.preventDefault();

        for(let j = 0; j < tabs.length; j++){
            tabs[j].classList.remove('-active');
            contents[j].classList.remove('-show');
        }

        //this:tabs[i]
        this.classList.add("-active");
        contents[i].classList.add("-show");

});

}