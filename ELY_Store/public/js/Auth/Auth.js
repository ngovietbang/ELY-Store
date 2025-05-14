//
document.addEventListener("DOMContentLoaded", function () {
    //
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    //
    form = document.getElementById('form-quenmk');
    const emailInput = document.getElementById('email-quenmk');
    const tentkInput = document.getElementById('tentk-quenmk');
    //token
    csrfToken = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    laymk = document.querySelector('meta[name=laymk-url]').getAttribute('content');
    //
    const overlay = document.querySelector('.quenmk-overlay');
    const tb = document.querySelector('.quenmk-thongbao');
    
    //
    form.addEventListener('submit', function (e) {
        overlay.style.display = 'flex';
        tb.style.display = 'flex';
        //
        const email = emailInput.value.trim();
        const tentk = tentkInput.value.trim();

        e.preventDefault();
        //kiem tra dinh dang email
        const validEmail = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
        if (!validEmail.test(email)) {
            alert("Vui lòng nhập đúng định dạng email (vd: example@gmail.com)");
            overlay.style.display = 'none';
            tb.style.display = 'none';
            return;
        }

        //
        fetch(laymk, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ email: email, tentk: tentk })
        })
            .then(response => response.json())
            .then(data => {
                //kiem tra neu json fail tra ve la true, khong ton tai email
                if (data.fail) { 
                    alert("Email này không trùng với email đã liên kết đến tài khoản.");
                    overlay.style.display = 'none';
                    tb.style.display = 'none';
                }
                if(data.success){
                    alert("Gửi thành công. Mật khẩu mới đã được gửi đến email của bạn");
                    overlay.style.display = 'none';
                    tb.style.display = 'none';
                    window.location.href = data.redirect;
                }
            })
            .catch(error => {
                overlay.style.display = 'none';
                tb.style.display = 'none';
                console.error('Lỗi: ',error);
            });

    });
});
