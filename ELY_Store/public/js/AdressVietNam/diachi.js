//diachi
document.addEventListener('DOMContentLoaded', async () => {
    const tinhSelect = document.getElementById('tinh');
    const huyenSelect = document.getElementById('huyen');
    const xaSelect = document.getElementById('xa');

    const tinhData = await fetch('/js/AdressVietNam/tinh_tp.json').then(res => res.json());
    const huyenData = await fetch('/js/AdressVietNam/quan_huyen.json').then(res => res.json());
    const xaData = await fetch('/js/AdressVietNam/xa_phuong.json').then(res => res.json());

    // Đổ dữ liệu tỉnh vào select
    for (const [code,tinh] of Object.entries(tinhData)) {
        const option = document.createElement('option');
        option.value = code;
        option.textContent = tinh.name;
        tinhSelect.appendChild(option);
    }

    // Khi chọn tỉnh lọc quận/huyện
    tinhSelect.addEventListener('change', () => {
        const selectedTinhCode = tinhSelect.value;

        // Xoá các option cũ
        huyenSelect.innerHTML = '<option value="">-- Chọn Quận/Huyện --</option>';

        for (const [code, huyen] of Object.entries(huyenData)) {
            if (huyen.parent_code === selectedTinhCode) {
                const option = document.createElement('option');
                option.value = code;
                option.textContent = huyen.name;
                huyenSelect.appendChild(option);
            }
        }
    });

    // Khi chọn huyen loc xa-phuong
    huyenSelect.addEventListener('change', () => {
        const selectedHuyenCode = huyenSelect.value;

        // Xoá các option cũ
        xaSelect.innerHTML = '<option value="">-- Chọn Xã/Phường --</option>';

        for (const [code, xa] of Object.entries(xaData)) {
            if (xa.parent_code === selectedHuyenCode) {
                const option = document.createElement('option');
                option.value = code;
                option.textContent = xa.name;
                xaSelect.appendChild(option);
            }
        }
    });

});
