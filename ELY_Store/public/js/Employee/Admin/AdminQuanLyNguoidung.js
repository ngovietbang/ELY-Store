//quan ly nguoi dung
//reload trang khi back
window.onpageshow = function (event) {
    if (event.persisted) {
        window.location.reload();
    }
};

//chuyen doi trang quản ly---------------------------
document.addEventListener('DOMContentLoaded', function () {
    const select = document.querySelector(".content-div2-select-div1");

    // Khi chọn thì chuyển sang trang tương ứng
    select.addEventListener("change", function () {
        const selectedPage = this.value;
        window.location.href = selectedPage;
    });
});

//phan trang------------------------------------------
document.addEventListener('DOMContentLoaded', function () {
    const dulieu = document.querySelectorAll(".table-nhansu-tr2");
    const pagination = document.querySelector(".phantrang-div1");
    const prevBtn = document.querySelector(".bt-phantrang-pre");
    const nextBtn = document.querySelector(".bt-phantrang-next");

    const itemsPerPage = 10;
    const totalPages = Math.ceil(dulieu.length / itemsPerPage);
    let currentPage = 0;
    function showPage(page) {
        if (page < 0 || page >= totalPages) return;

        dulieu.forEach(row => row.style.display = "none");

        const start = page * itemsPerPage;
        const end = Math.min(start + itemsPerPage, dulieu.length);

        for (let i = start; i < end; i++) {
            dulieu[i].style.display = "table-row";
        }

        document.querySelectorAll(".pagination-button").forEach((btn, index) => {
            btn.classList.toggle("active", index === page);
        });

        currentPage = page;
    }
    function createPagination() {
        pagination.innerHTML = "";
        for (let i = 0; i < totalPages; i++) {
            const button = document.createElement("button");
            button.textContent = i + 1;
            button.classList.add("pagination-button");
            if (i === 0) button.classList.add("active");

            button.addEventListener("click", () => {
                showPage(i);
            });

            pagination.appendChild(button);
        }
    }

    prevBtn.addEventListener("click", () => {
        if (currentPage > 0) {
            showPage(currentPage - 1);
        }
    });

    nextBtn.addEventListener("click", () => {
        if (currentPage < totalPages - 1) {
            showPage(currentPage + 1);
        }
    });

    createPagination();
    showPage(0); // khởi tạo trang đầu tiên
});


//mo form them user----------------------------------
document.addEventListener("DOMContentLoaded", function () {
    btThem = document.getElementById("bt-form-themuser");
    overlay = document.getElementById("overlay");
    form = document.getElementById("form-them-user");
    btdong = document.getElementById("bt-close-themuser");
    const previewImg = document.getElementById("preview-anh");
    //
    if (btThem) {
        btThem.addEventListener("click", function () {
            form.style.display = "flex";
            overlay.style.display = "flex";
        });
    }
    //
    if (btdong) {
        btdong.addEventListener("click", function () {
            form.style.display = "none";
            overlay.style.display = "none";
            form.reset();
            // lỗi (ví dụ is-invalid)
            const inputs = form.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                input.classList.remove('is-invalid');
            });

            // Ẩn các thẻ thông báo lỗi 
            const errorMessages = form.querySelectorAll('.invalid-feedback, .error-message');
            errorMessages.forEach(el => el.style.display = 'none');
            //
            previewImg.src = "";
            previewImg.style.display = "none";

        });
    }
});

//preview anh-------------------------------------
document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById("them-anh");
    const previewImg = document.getElementById("preview-anh");

    if (fileInput) {
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
    }
});

//kiem tra do dai-------------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
    const sdt = document.getElementById('admin-input-them-sdt');
    const cccd = document.getElementById('admin-input-them-cccd');

    if (sdt) {
        sdt.addEventListener('input', function (e) {
            e.target.value = e.target.value.replace(/[^0-9]/g, '');  // Chỉ cho phép nhập số
        });
    }
    if (cccd) {
        cccd.addEventListener('input', function (e) {
            e.target.value = e.target.value.replace(/[^0-9]/g, '');
        });
    }
});


//action: them user -- Script kiem tra truoc khi submnit form------------------------------
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form-them-user');
    const emailInput = document.getElementById('email');
    const tentkInput = document.getElementById('tentk');
    //

    const emailError = document.getElementById('email-error');
    const tentkError = document.getElementById('tentk-error');

    let emailIsValid = true;
    let tentkIsValid = true;

    //Lấy giá trị từ <meta> trong HTML
    const csrfMeta = document.querySelector('meta[name="csrf-token"]');
    const checkEmailMeta = document.querySelector('meta[name="check-email-url"]');
    const checkTentkMeta = document.querySelector('meta[name="check-tentk-url"]');

    const csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : '';
    const checkEmailUrl = checkEmailMeta ? checkEmailMeta.getAttribute('content') : '';
    const checkTentkUrl = checkTentkMeta ? checkTentkMeta.getAttribute('content') : '';


    if (emailInput) {
        emailInput.addEventListener('blur', function () {
            const email = emailInput.value.trim();
            if (!email) return;

            fetch(checkEmailUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ email })
            })
                .then(res => {
                    if (!res.ok) throw new Error("Server error");
                    return res.json();
                })
                .then(data => {
                    emailIsValid = !data.exists;
                    emailError.style.display = data.exists ? 'block' : 'none';
                    emailInput.classList.toggle('is-invalid', data.exists);
                })
                .catch(err => {
                    console.error("Email check failed:", err);
                });
        });
    }

    if (tentkInput) {
        tentkInput.addEventListener('blur', function () {
            const tentk = tentkInput.value.trim();
            if (!tentk) return;

            fetch(checkTentkUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ tentk })
            })
                .then(res => {
                    if (!res.ok) throw new Error("Server error");
                    return res.json();
                })
                .then(data => {
                    tentkIsValid = !data.exists;
                    tentkError.style.display = data.exists ? 'block' : 'none';
                    tentkInput.classList.toggle('is-invalid', data.exists);
                })
                .catch(err => {
                    console.error("Username check failed:", err);
                });
        });
    }

    if (form) {
        form.addEventListener('submit', async function (e) {
            e.preventDefault(); // luôn chặn trước

            const email = emailInput.value.trim();
            const tentk = tentkInput.value.trim();

            // kiểm tra lại khi submit để đảm bảo fetch đã xong
            const [emailCheck, tentkCheck] = await Promise.all([
                fetch(checkEmailUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ email })
                }).then(res => res.ok ? res.json() : { exists: true }),

                fetch(checkTentkUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ tentk })
                }).then(res => res.ok ? res.json() : { exists: true })
            ]);



            //
            emailIsValid = !emailCheck.exists;
            tentkIsValid = !tentkCheck.exists;

            emailError.style.display = emailCheck.exists ? 'block' : 'none';
            tentkError.style.display = tentkCheck.exists ? 'block' : 'none';
            emailInput.classList.toggle('is-invalid', emailCheck.exists);
            tentkInput.classList.toggle('is-invalid', tentkCheck.exists);

            //kiem tra valid email
            const checkEmail = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
            if (email != '') {
                if (!checkEmail.test(email)) {
                    alert('Không đúng định dạng gmail. (vd:example@gmail.com)');
                    return;
                }
            }

            if (emailIsValid && tentkIsValid) {
                /*form.submit(); // gửi nếu hợp lệ*/
                alert("Thêm thành công!");
                form.submit();
            } else {
                alert('Thông tin không hợp lệ!');
                return;
            }
        });
    }

});


//xóa ajax-------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('.table-nhansu-tr2-td-xoa');
    //token
    const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    forms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const userid = form.dataset.userid;
            //
            fetch(`/employee/DeleteUser/${userid}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf,
                },
            })
                .then(response => response.json())
                .then(data => {
                    if (data.fail) {
                        alert('Error: Bạn đang đăng nhập với tài khoản này.');
                    }
                    else if (data.success) {
                        alert('Xóa thành công.');
                        form.closest('tr').remove();
                    }
                })
                .catch(error => {
                    console.error('Error: ', error);
                });
        });
    });
});

//sua user------------------------------------------------------------------
//mo form sua
document.addEventListener('DOMContentLoaded', function () {
    //
    const bt = document.querySelectorAll('.bt-mo-form-sua');
    const form1 = document.getElementById('form-sua-user');
    const form2 = document.querySelectorAll('.form-bt-mo-form-sua');
    //token
    const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content') ?? '';
    //
    const anh = document.getElementById('preview-anh-sua');

    form2.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            //chuyen du lieu
            const getuserid = form.dataset.getuserid;
            fetch(`/employee/getEmployeeById/${getuserid}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf
                },
            })
                .then(respnose => respnose.json())
                .then(data => {
                    if (data.success) {
                        let result = data.result;
                        document.querySelector('.sua-userid').value = result.userid;
                        document.getElementById('sua-roles').value = result.roles;
                        document.getElementById('sua-tentk').value = result.tentk;
                        document.getElementById('sua-hovaten').value = result.hovaten;
                        document.getElementById('sua-ngaysinh').value = result.ngaysinh;
                        document.getElementById('sua-gioitinh').value = result.gioitinh;
                        document.getElementById('sua-diachi').value = result.diachi;
                        document.getElementById('sua-cccd').value = result.cccd;
                        document.getElementById('sua-sdt').value = result.sdt;

                        const target = result.anh;
                        anh.src =  '/' + target;
                    }
                })
                .catch(error => {
                    console.log('Error: ', error);
                });

            //mo form
            form1.style.display = 'flex';
            document.getElementById('overlay').style.display = 'flex';
        });
    });

    //preview anh
    const fileInput = document.getElementById("them-anh-sua");

    if (fileInput) {
        fileInput.addEventListener("change", function () {
            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    anh.src = e.target.result;
                    anh.style.display = "block";
                };
                reader.readAsDataURL(file);
            } else {
                anh.src = "";
            }
        });
    }

});

//dong form sua
document.addEventListener('DOMContentLoaded', function () {
    bt1 = document.querySelectorAll('.bt-close-suauser');
    form1 = document.getElementById('form-sua-user');
    const tb = document.getElementById('email-error-sua');
    bt1.forEach(bt => {
        bt.addEventListener('click', function () {
            form1.style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
            tb.style.display = 'none';
            form1.reset();
        });
    });
});

//kiem tra sdt va cccd
document.addEventListener("DOMContentLoaded", function () {
    const sdt = document.getElementById('sua-sdt');
    const cccd = document.getElementById('sua-cccd');

    if (sdt) {
        sdt.addEventListener('input', function (e) {
            e.target.value = e.target.value.replace(/[^0-9]/g, '');  // Chỉ cho phép nhập số
        });
    }
    if (cccd) {
        cccd.addEventListener('input', function (e) {
            e.target.value = e.target.value.replace(/[^0-9]/g, '');
        });
    }
});

//adction sua-----
document.addEventListener('DOMContentLoaded', function () {
    const formsua = document.getElementById('form-sua-user');
    const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content') ?? '';
    const emailUrl = document.querySelector('meta[name="check-email-url"]').getAttribute('content') ?? '';
    const suaUrl = document.querySelector('meta[name="sua-user-url"]').getAttribute('content') ?? '';
    //thong bao
    const tb = document.getElementById('email-error-sua');
    function dongformsua() {
        bt1 = document.querySelectorAll('.bt-close-suauser');
        form1 = document.getElementById('form-sua-user');

        form1.style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
        form1.reset();

        tb.style.display = 'none';
    }

    //
    if (formsua) {
        formsua.addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(formsua); // lấy dữ liệu form
            const email1 = document.getElementById('sua-email').value.trim();

            //kiem tra valid email
            const checkEmail = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
            if (email1 !== '') {
                if (!checkEmail.test(email1)) {
                    alert('Không đúng định dạng gmail. (vd:example@gmail.com)');
                    tb.style.display = 'none';
                    return;
                }
                const response = await fetch(emailUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf,
                    },
                    body: JSON.stringify({ email: email1 }) //gui email di kiem tra
                })
                const result = await response.json();
                if (result.exists) {
                    tb.style.display = 'flex';
                    alert('Email này đã tồn tại.');
                    return;
                }
            }

            //xac nhan
            if (!confirm('Bạn có chắc chắn muốn cập nhật thông tin người dùng này không?')) {
                return;
            }

            const response = await fetch(suaUrl, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrf,
                },
                body: formData
            })
            const data = await response.json();
            if (data.success) {
                //cap nhat hien thi
                const row = document.querySelector(`#user-row-${data.user.userid}`);
                if (row) {
                    row.querySelector('.user-hovaten').textContent = data.user.hovaten;
                    row.querySelector('.user-ngaysinh').textContent = data.user.ngaysinh;
                    row.querySelector('.user-gioitinh').textContent = data.user.gioitinh;
                    row.querySelector('.user-diachi').textContent = data.user.diachi;
                    row.querySelector('.user-cccd').textContent = data.user.cccd;
                    row.querySelector('.user-sdt').textContent = data.user.sdt;
                    row.querySelector('.user-email').textContent = data.user.email;
                    row.querySelector('.user-anh').src = '/' + data.user.anh;
                }
                dongformsua();
                alert('Cập nhật thành công.');
            }
            else {
                alert('Có lỗi xảy ra!');
                return;
            }
        });
    }
});

