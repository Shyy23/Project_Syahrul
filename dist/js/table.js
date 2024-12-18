const tabs = document.querySelectorAll('.tab__btn');
const contents = document.querySelectorAll('.content');
const line = document.querySelector('.line');   
const addButton = document.getElementById('addButton');

const tabData = [
    {name:'Siswa', href:'view/viewAdd.php?tabel=siswa'},
    {name:'Guru', href:'view/viewAdd.php?tabel=guru'},
    {name:'Jadwal', href:'view/viewAdd.php?tabel=jadwal'},
    {name:'Presensi', href:'view/viewAdd.php?tabel=presensi'},
]

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

        addButton.innerHTML = `Tambah ${tabData[index].name} <i class="fa-solid fa-plus icon" ></i>`;
        addButton.href = tabData[index].href;
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

const search = document.querySelector('.header__search input'),
      table_rows = document.querySelectorAll('tbody tr');
      
search.addEventListener('input', searchTable);

function searchTable(){
    table_rows.forEach((row,i) => {
        let table_data = row.textContent.toLowerCase(),
            search_data = search.value.toLowerCase();

        row.classList.toggle('hide',table_data.indexOf(search_data) < 0);
        row.style.setProperty('--delay', i/25 + 's');
    })

    document.querySelectorAll("tbody tr:not(.hide)").forEach((visible_row, i)=> {
        visible_row.style.backgroundColor = (i % 2 == 0)? 'transparent' : ' hsl(0, 0%, 70%)';
    });
}

window.onload = function() {
    var alertBox = document.getElementById('alert');
    if (alertBox) {
        alertBox.classList.add('show'); // Tambahkan kelas 'show' untuk memunculkan alert
        setTimeout(function() {
            alertBox.style.display = 'none'; // Sembunyikan setelah 5 detik
        }, 5000);
    }
};

document.querySelectorAll('.delete__btn').forEach(function(button) {
    button.addEventListener('click', function(event) {
        // Munculkan konfirmasi
        const confirmed = confirm('Apakah Anda yakin ingin menghapus data ini?');
        if (!confirmed) {
            // Jika batal, cegah aksi default (navigasi ke link)
            event.preventDefault();
        }
    });
});