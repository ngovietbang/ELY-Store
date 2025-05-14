//script header home
//script hien thi nut tai khoan
document.addEventListener("DOMContentLoaded", function () {
    const settk = "";
    const divtk = document.getElementById('head-taikhoan');

    if (divtk) {
        if (settk === "") {
            divtk.style.display = "none";
        } else {
            divtk.style.display = "inline-block";
        }
    }
});

//script mo form dang ky
document.querySelector("#dang-ky").addEventListener("click", function () {
    let modal1 = document.getElementById("form-register");
    modal1.style.display = "flex";
    let modal2 = document.getElementById("form_login");
    modal2.classList.remove("show");
    setTimeout(() => {
        modal1.classList.add("show");
    }, 10);
    setTimeout(() => {
        modal2.style.display = "none";
    }, 400);
});

//script mở, đóng form login
//
const btlogin = document.getElementById("bt_login");
if (btlogin) {
    document.getElementById("bt_login").addEventListener("click", function () {
        let modal = document.getElementById("form_login");
        modal.style.display = "flex";
        setTimeout(() => {
            modal.classList.add("show");
        }, 10);
    });
}

// Đóng modal khi nhấn vào dấu "X"
document.querySelector(".close").addEventListener("click", function () {
    let modal = document.getElementById("form_login");
    modal.classList.remove("show");
    setTimeout(() => {
        modal.style.display = "none";
    }, 400);
    //
    modal.reset();
    //
    document.getElementById("error-message").textContent = '';
});

// Đóng dang ky khi nhấn vào dấu "X"
document.querySelector(".close-register").addEventListener("click", function () {
    let modal = document.getElementById("form-register");
    modal.classList.remove("show");
    setTimeout(() => {
        modal.style.display = "none";
    }, 400);
    //reset
    document.getElementById("form-register").reset();
    //hien
    let dk1 = document.getElementById("dk-1");
    dk1.style.display = "flex";
    dk1.classList.add("show");
    //an
    let dk2 = document.getElementById("dk-2");
    dk2.classList.remove("show");
    dk2.style.display = "none";
    //
    let dk3 = document.getElementById("dk-3");
    dk3.classList.remove("show");
    dk3.style.display = "none";
    //
    let inputs = document.querySelectorAll('input[required]');
    inputs.forEach(function (input) {
        input.style.border = ""; // Reset lại nếu hợp lệ
    });
    //
    document.getElementById('message-remk').textContent = "";
    //pre anh
    previewImg = document.getElementById("pre-anh");
    previewImg.src = "";
    previewImg.style.display = "none";
    //
    document.getElementById('tentk-error').style.display = 'none';
});

//script kiem tra truoc khi dang ký------------------------------------------------------------------------------------
//click div 1
document.querySelectorAll('.bt-next-1').forEach(function (button) {
    button.addEventListener('click', function (e) {
        const form = button.closest('div'); // Tìm form gần nhất chứa nút
        if (!form) return; // Nếu không tìm thấy form thì dừng

        const inputs = form.querySelectorAll('input[required]');
        let isValid = true;

        inputs.forEach(function (field) {
            if (field.value.trim() === '') {
                field.style.border = "1px solid red"; // đặt border cho từng field
                isValid = false;

            } else {
                field.style.border = ""; // reset border nếu đúng
            }
        });

        //kiem tra mk
        mk = document.getElementById('dk-matkhau');
        remk = document.getElementById('dk-rematkhau');
        tb = document.getElementById('message-remk');
        if (mk.value != remk.value) {
            remk.style.border = '1px solid red';
            tb.textContent = '*Mật khẩu xác nhận không đúng';
            isValid = false;
        } else {
            remk.style.border = "";
            tb.textContent = "";
        }

        //
        if (isValid) {
            // Nếu hợp lệ thì chuyển sang dk-2
            let modal = document.getElementById("dk-2");
            modal.style.display = "flex";
            modal.classList.add("show");

            let modal2 = document.getElementById("dk-1");
            modal2.classList.remove("show");
            modal2.style.display = "none";
        }

    });
});
//div2 click
//quay lai 2
document.getElementById('bt-pre-2').addEventListener('click', function () {
    //
    let modal = document.getElementById("dk-1");
    modal.style.display = "flex";
    modal.classList.add("show");
    //an
    let modal2 = document.getElementById("dk-2");
    modal2.classList.remove("show");
    modal2.style.display = "none";
});
//next 2
document.querySelectorAll('.bt-next-2').forEach(function (button) {
    button.addEventListener('click', function (e) {
        const form = button.closest('#dk-2'); // Tìm form gần nhất chứa nút
        if (!form) return; // Nếu không tìm thấy form thì dừng

        const inputs = form.querySelectorAll('input[required]');
        let isValid = true;

        inputs.forEach(function (field) {
            if (field.value.trim() === '') {
                field.style.border = "1px solid red"; // đặt border cho từng field
                isValid = false;

            } else {
                field.style.border = ""; // reset border nếu đúng
            }
        });

        if (isValid) {
            let modal = document.getElementById("dk-3");
            modal.style.display = "flex";
            modal.classList.add("show");
            //an
            let modal2 = document.getElementById("dk-2");
            modal2.classList.remove("show");
            modal2.style.display = "none";
        }
    });
});
//div3 click
document.getElementById('bt-pre-3').addEventListener('click', function () {
    //
    let modal = document.getElementById("dk-2");
    modal.style.display = "flex";
    modal.classList.add("show");
    //an
    let modal2 = document.getElementById("dk-3");
    modal2.classList.remove("show");
    modal2.style.display = "none";
});

//------------------kiểm tra số lượng sdt
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('input-dk-sdt').addEventListener('input', function (e) {
        e.target.value = e.target.value.replace(/[^0-9]/g, '');  // Chỉ cho phép nhập số
    });
});

// chuyen form khi o form dang ky----------------------------------------------------------------------------
document.getElementById("bt-dang-nhap").addEventListener("click", function () {
    let modal = document.getElementById("form_login");
    modal.style.display = "flex";
    setTimeout(() => {
        modal.classList.add("show");
    }, 10);
    //dong form register
    let modal2 = document.getElementById("form-register");
    modal2.classList.remove("show");
    setTimeout(() => {
        modal2.style.display = "none";
    }, 400);
    //reset
    document.getElementById("form-register").reset();
    //hien
    let dk1 = document.getElementById("dk-1");
    dk1.style.display = "flex";
    dk1.classList.add("show");
    //an
    let dk2 = document.getElementById("dk-2");
    dk2.classList.remove("show");
    dk2.style.display = "none";
    //
    let dk3 = document.getElementById("dk-3");
    dk3.classList.remove("show");
    dk3.style.display = "none";
    //
    let inputs = document.querySelectorAll('input[required]');
    inputs.forEach(function (input) {
        input.style.border = ""; // Reset lại nếu hợp lệ
    });
    //thong bao do
    document.getElementById('message-remk').textContent = "";
    //pre anh
    previewImg = document.getElementById("pre-anh");
    previewImg.src = "";
    previewImg.style.display = "none";
    //
    document.getElementById('tentk-error').style.display = 'none';
});

//banner slide------------------------------
let currentIndex = 0;
let wrapper;
let totalSlides;

document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll('.slide');
    totalSlides = slides.length;
    wrapper = document.querySelector('.slides-wrapper');

    showSlide(currentIndex);

    setInterval(() => {
        moveSlide(1);
    }, 5000);
});

function showSlide(index) {
    wrapper.style.transform = `translateX(-${index * 100}%)`;
}

function moveSlide(direction) {
    currentIndex = (currentIndex + direction + totalSlides) % totalSlides;
    showSlide(currentIndex);
}


//script len dau trang-------------------------------
// Hiện nút khi kéo xuống
window.onscroll = function () {
    const btn = document.getElementById("scrollTopBtn");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        btn.style.display = "block";
    } else {
        btn.style.display = "none";
    }
};

// Cuộn lên đầu trang
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}

//preview anh-----------------------------------------
document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById("file-select-dk");
    const previewImg = document.getElementById("pre-anh");

    fileInput.addEventListener("change", function () {
        const file = fileInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImg.src = e.target.result;
                previewImg.style.display = "block";
            };
            reader.readAsDataURL(file);
        } else {
            previewImg.src = "";
            previewImg.style.display = "none";
        }
    });
});


//Kiem tra dang ky--------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function () {
    const tentkInput = document.getElementById('tentk-dk');
    const tentkError = document.getElementById('tentk-error');
    const bt1 = document.getElementById('bt-next-1');
    //token
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const checkTentkUrl = document.querySelector('meta[name="customer-check-tentk-url"]').getAttribute('content');

    let tentkIsValid = false;
    let isChecking = false;

    async function checkTentk(tentk) {
        isChecking = true;
        bt1.disabled = true;
        bt1.style.cursor = "wait";

        try {
            const res = await fetch(checkTentkUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ tentk })
            });

            const data = await res.json();

            tentkIsValid = !data.exists;
            tentkError.style.display = data.exists ? 'block' : 'none';
            tentkInput.classList.toggle('is-invalid', data.exists);

        } catch (err) {
            console.error("Lỗi kiểm tra tên tài khoản:", err);
            tentkIsValid = false;
        }

        isChecking = false;
        bt1.disabled = !tentkIsValid;
        bt1.style.cursor = tentkIsValid ? 'pointer' : 'not-allowed';
    }

    tentkInput.addEventListener('input', function () {
        const tentk = tentkInput.value.trim();
        tentkIsValid = false;
        bt1.disabled = true;
        bt1.style.cursor = 'not-allowed';
        tentkError.style.display = 'none';

        if (tentk.length > 0) {
            checkTentk(tentk);
        }
    });
    //
    const form = document.getElementById('form-register');

    form.addEventListener('submit', function (e) {
        if (isChecking || !tentkIsValid) {
            e.preventDefault(); // chặn gửi form nếu chưa hợp lệ
            alert("Vui lòng nhập tên tài khoản hợp lệ trước khi tiếp tục.");
        } else {
            e.preventDefault();

            alert("Đăng ký thành công!");

            form.submit();
        }
    });

});

//xu lý đăng nhập
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('form_login').addEventListener('submit', function (e) {
        e.preventDefault(); // Ngừng submit mặc định của form

        // Lấy dữ liệu từ form
        var tentk = document.getElementById('tentk-dn').value;
        var matkhau = document.getElementById('matkhau-dn').value;
        //token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const login = document.querySelector('meta[name="login-url"]').getAttribute('content');

        // Gửi yêu cầu đăng nhập bằng Fetch API
        fetch(login, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken // CSRF token
            },
            body: JSON.stringify({
                tentk: tentk,
                matkhau: matkhau
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Nếu đăng nhập thành công, chuyển hướng đến trang tương ứng
                    window.location.href = data.redirect_url;
                } else {
                    // Hiển thị thông báo lỗi mà không reload trang
                    document.getElementById('error-message').textContent = data.message;
                    document.getElementById('error-message').classList.add('alert', 'alert-danger');
                }
            })
            .catch(error => {
                // Hiển thị lỗi hệ thống nếu có
                document.getElementById('error-message').textContent = 'Lỗi hệ thống!';
                document.getElementById('error-message').classList.add('alert', 'alert-danger');
            });
    });
});


