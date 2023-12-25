const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document)

const tabs = $$('.tabs-custom .tab-item')
const panes = $$('.tab-content-custom .tab-pane')

const tabActive = $(".tabs-custom .tab-item.active");
const line = $(".tabs-custom .line");

line.style.left = tabActive.offsetLeft + "px";
line.style.width = tabActive.offsetWidth + "px";

tabs.forEach((tab,index) => {
    const pane = panes[index]
    tab.onclick = function () {
        $('.tabs-custom .tab-item.active').classList.remove('active')
        $('.tab-content-custom .tab-pane.active').classList.remove('active')

        this.classList.add('active')
        pane.classList.add('active')
        const tabActive = $(".tabs-custom .tab-item.active");
        const line = $(".tabs-custom .line");

        line.style.left = tabActive.offsetLeft + "px";
        line.style.width = tabActive.offsetWidth + "px";
    }
})
