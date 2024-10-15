/**  ========================= SHOW SIDEBAR ==================================*/
const showSidebar = (toggleId, sidebarId) => {
    const toggle = document.getElementById(toggleId);
          sidebar = document.getElementById(sidebarId);

    if(toggle && sidebar){
        toggle.addEventListener('click', ()=>{
            sidebar.classList.toggle('show-sidebar')
        })
    }
}
showSidebar('header-toggle', 'sidebar');

/**  ========================= ACTIVE LINK ==================================*/
const sidebarLink = document.querySelectorAll('.sidebar__list a');

function linkColor(){
    sidebarLink.forEach(l => l.classList.remove('active-link'));
    this.classList.add('active-link');
}

sidebarLink.forEach(l => l.addEventListener('click', linkColor));

/**  ========================= DARK LIGHT THEME ==================================*/
const themeButton = document.getElementById('theme-button');
const darkTheme = 'dark-theme';
const iconTheme = 'ri-sun-line';

// Memilih topik sebelumnya (jika user memilih)
const selectedTheme = localStorage.getItem('selected-theme');
const selectedIcon = localStorage.getItem('selected-icon');

// Mengambil tema sekarang dan menampilkannya dengan validasi dark theme
const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light';
const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'ri-moon-clear-fill' : 'ri-sun-line';

//  Validasi pilihan user sebelumnya
if(selectedTheme){
        // Jika validasi terpenuhi maka kita perlu mengetahui apakah menambah atau menghapus the dark
    document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme);
    themeButton.classList[selectedIcon === 'ri-moon-clear-fill' ? 'add' : 'remove'](iconTheme);
}

// Aktivasi dan nonaktif manual dengan button
themeButton.addEventListener('click', () => {
    // Mengubah tema ke gelap dan terang
    document.body.classList.toggle(darkTheme);
    themeButton.classList.toggle(iconTheme);

    // menyimpan tema sekarang yang dipilih user
    localStorage.setItem('selected-theme', getCurrentTheme());
    localStorage.setItem('selected-icon', getCurrentIcon());
})
