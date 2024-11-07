const tabs = document.querySelectorAll('.tab__btn');
const contents = document.querySelectorAll('.content');
const line = document.querySelector('.line');   
function updateLinePosition(activeTab){
    line.style.width = activeTab.offsetWidth + 'px';
    line.style.left = activeTab.offsetLeft + 'px';
}
 
tabs.forEach((tab, index) => {
    tab.addEventListener('click', (e) => {
       tabs.forEach((tab)=> tab.classList.remove('active'));
       e.target.classList.add('active');

       updateLinePosition(e.target);

       contents.forEach(content => {content.classList.remove('active')});
       contents[index].classList.add('active');
    });
});

window.addEventListener('resize', () => {
    const activeTab = document.querySelector('.tab__btn.active');
    if(activeTab){
        updateLinePosition(activeTab);
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const initialActiveTab = document.querySelector('.tab__btn.active') || tabs[0];
    if(initialActiveTab){
        initialActiveTab.classList.add('active');
        updateLinePosition(initialActiveTab);
    }
})