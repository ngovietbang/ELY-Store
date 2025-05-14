//script admin

//script len dau trang-------------------------------
// Hiện nút khi kéo xuống
window.onscroll = function () {
    const btn = document.getElementById("bt-top");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        btn.style.display = "block";
    } else {
        btn.style.display = "none";
    }
};

// Cuộn lên đầu trang
function Top() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}

//focus profile-------------------
document.addEventListener('DOMContentLoaded', function () {
    const div = document.querySelector('.header-div5');
    const dropdown = document.querySelector('.header-div6');

    if (div && dropdown) {
        div.addEventListener('click', (e) => {
            e.stopPropagation(); // Ngăn chặn click lan ra ngoài
            dropdown.style.display = dropdown.style.display === 'flex' ? 'none' : 'flex';
        });
        document.addEventListener('click', () => {
            dropdown.style.display = 'none';
        });

        dropdown.addEventListener('click', (e) => {
            e.stopPropagation(); // Ngăn đóng menu khi click bên trong
        });
    }
});


