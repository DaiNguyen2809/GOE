import './bootstrap';
import Swal from 'sweetalert2';
import html2canvas from 'html2canvas';
import printJS from "print-js";
window.Swal = Swal;  // Đảm bảo SweetAlert được load

function handleAjaxPagination(containerSelector, tableSelector, paginationSelector) {
    $(document).off('click', `${paginationSelector} a`).on('click', `${paginationSelector} a`, function (e) {
        e.preventDefault();
        let url = $(this).attr('href');

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(data){
                $(tableSelector).fadeOut(200, function () {
                    $(this).html(data.table).fadeIn(200);
                });

                $(paginationSelector).fadeOut(200, function () {
                    $(this).html(data.pagination).fadeIn(200);
                });
                window.history.pushState(null, null, url);
            },
            error: function(xhr, status, error) {
                console.log('Loi AJAX phan trang: ' + error);
            }
        });
    });
}
function handleShowSuccessAlert(message) {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        showClass: {
            popup: "animate__animated animate__fadeInRight animate__faster"
        },
        hideClass: {
            popup: "animate__animated animate__fadeOutRight animate__faster"
        },
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    Toast.fire({
        icon: "success",
        title: message
    });
}
function handleConfirmDelete(id, modal, form, route) {
    let modaldlt = document.getElementById(modal);
    let formdlt = document.getElementById(form);
    formdlt.action = route.replace('__id__', id);
    modaldlt.classList.remove('hidden');
    modaldlt.classList.add('block');
}
function handleCloseModal(modal) {
    let modaldlt = document.getElementById(modal);
    modaldlt.classList.remove('block');
    modaldlt.classList.add('hidden')
}
function debounce(func, delay) {
    let time;
    return function(...args) {
        clearTimeout(time);
        time = setTimeout(() => func.apply(this, args), delay);
    };
}
function handleSearchData (inputTag, url, containerId) {
    let search = $('#' + inputTag);
    let container = $('#' + containerId);

    search.on('input', debounce(function () {
        let query = $(this).val().trim();
        $.ajax ({
            url: url,
            type: 'GET',
            data: {query: query},
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(data){
                container.html(data);
            },
            error: function(xhr, status, error) {
                console.log('Loi ham search ' + error);
            }
        });
    },250));
}
function handleClickUploadImage(uplContainer, uplInput) {
    let container = document.getElementById(uplContainer);
    let input = document.getElementById(uplInput);
    container.addEventListener('click', function () {
        input.click();
    });
}
function handleUploadImage(uplContainer, uplInput, uplTxt) {
    let container = document.getElementById(uplContainer);
    let input = document.getElementById(uplInput);
    let txt = document.getElementById(uplTxt);
    input.addEventListener('change', function (event) {
        let file = event.target.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (e) {
                container.style.backgroundImage = `url(${e.target.result})`;
                container.style.backgroundSize = 'cover';
                container.style.backgroundPosition = 'center';
                txt.style.display = 'none';
            }
            reader.readAsDataURL(file);
        }
    });
}
function areaSelect(areas) {
    return {
        open: false,
        search: '',
        selected: '',
        selectedName: '',
        locations: areas,
        filteredLocations: areas,

        filterLocations() {
            this.filteredLocations = this.locations.filter(loc =>
                loc.name.toLowerCase().includes(this.search.toLowerCase())
            );
        },

        selectLocation(area) {
            this.selected = area.id;
            this.selectedName = area.name;
            this.open = false;

            // Gửi sự kiện để thông báo cho component Ward biết
            window.dispatchEvent(new CustomEvent('area-selected', {
                detail: { areaId: area.id }
            }));
        }
    };
}
function wardSelect(allWards) {
    return {
        open: false,
        search: '',
        selected: '',
        selectedName: '',
        allWards: allWards, // Lưu toàn bộ danh sách ward ban đầu
        locations: [], // Ban đầu không có location nào
        filteredLocations: [], // Ban đầu không có location nào được lọc
        getSelectedAreaId: null, // Area ID đã chọn

        init() {
            // Lắng nghe sự kiện khi area được chọn
            window.addEventListener('area-selected', (event) => {
                this.getSelectedAreaId = event.detail.areaId;
                this.updateWardsByArea(this.getSelectedAreaId);
            });
        },

        updateWardsByArea(areaId) {
            if (!areaId) {
                this.locations = [];
                this.filteredLocations = [];
                this.selected = '';
                this.selectedName = '';
                return;
            }

            // Lọc ward theo area_id
            this.locations = this.allWards.filter(ward => ward.area_id == areaId);
            this.filteredLocations = this.locations;

            // Reset các giá trị đã chọn
            this.selected = '';
            this.selectedName = '';
        },

        filterLocations() {
            this.filteredLocations = this.locations.filter(loc =>
                loc.name.toLowerCase().includes(this.search.toLowerCase())
            );
        },

        selectLocation(ward) {
            this.selected = ward.id;
            this.selectedName = ward.name;
            this.open = false;
        }
    }
}
function handleShowContent(content) {
    let ctn = document.getElementById(content);
    ctn.classList.remove('hidden');
    ctn.classList.add('block');
    handleClickOutside(content)
}
function handleClickOutside(content) {
    let ctn = document.getElementById(content);
    function clickOutside(event) {
        if (!ctn.contains(event.target)) {
            ctn.classList.remove('block');
            ctn.classList.add('hidden');
            document.removeEventListener('click', clickOutside);
        }
    }
    // Thêm sự kiện sau khi click hiện tại hoàn tất
    setTimeout(() => {
        document.addEventListener('click', clickOutside);
    }, 0);
}
function handleCloseContent(content) {
    let ctn = document.getElementById(content);
    ctn.classList.remove('block');
    ctn.classList.add('hidden');
}
function handleValidateDecimalInput(input) {
    let value = input.value = input.value.replace(/[^0-9]/g, '');
    if (value === '')
        return input.value = 0;
    input.value = parseInt(value).toLocaleString('en-US');
}
function handleGenerateQRCode() {
    let amount = $('#amount_qr').val();
    let content = $('#content_qr').val();
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/admin/dreamup/generateQR",
        method: "POST",
        data: {
            _token: csrfToken,
            amount_qr: amount,
            content_qr: content
        },
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        success: function(response) {
            $('#qrCode').html('<img class="pl-3 w-[432px] h-[432px]" src="' + response.qr_url + '" />');
            $('#amount_qr_show').text(Number(response.amount).toLocaleString('en-US'));
            $('#content_qr_show').text(response.content);
            $('#account_name').text(response.account_name);
            $('#account_no').text(response.account_no);
        },
        error: function(xhr) {
            alert("Có lỗi xảy ra!");
        }
    });
}
function handleCaptureDivToImage() {
    let targetDiv = document.getElementById('vietqr-box'); // ID của div cần chụp

    html2canvas(targetDiv, { useCORS: true }).then(canvas => {
        let imageURL = canvas.toDataURL('image/png'); // Chuyển thành base64
        let link = document.createElement('a');
        link.href = imageURL;
        link.download = 'vietqr.png'; // Tên file khi tải về
        link.click();
    });
}
function handleCopyDivToClipboard() {
    let targetDiv = document.getElementById('vietqr-box'); // ID của div cần chụp

    html2canvas(targetDiv, { useCORS: true }).then(canvas => {
        canvas.toBlob(blob => {
            // Kiểm tra xem trình duyệt có hỗ trợ clipboard API không
            if (navigator.clipboard && navigator.clipboard.write) {
                let item = new ClipboardItem({ "image/png": blob });
                navigator.clipboard.write([item]).then(() => {
                    console.log("Sao chép ảnh thành côntg");
                }).catch(err => {
                    console.error("Lỗi sao chép ảnh:", err);
                    alert("Không thể sao chép ảnh, hãy thử lại!");
                });
            } else {
                alert("Trình duyệt của bạn không hỗ trợ sao chép ảnh!");
            }
        });
    });
}
function handlePrintOrder() {
    $('#print-order').removeClass('hidden');
    printJS({
        printable: 'print-order',
        type: 'html',
        css: [
            '/build/assets/app.css',
        ],
        style: `
            .w-874px { width: 874px; }
            .h-1240px { height: 1240px; }
            .p-6 { padding: 1.5rem; }
            .mt-16 { margin-top: 4rem; }
            .mt-8 { margin-top: 2rem; }
            .my-4 { margin-top: 1rem; margin-bottom: 1rem; }
            .mt-4 { margin-top: 1rem; }
            .mr-2 { margin-right: 0.5rem; }
            .ml-2 { margin-left: 0.5rem; }
            .mt-2 { margin-top: 0.5rem; }
            .w-30pct { width: 30%; }
            .w-full { width: 100%; }

            .text-xs { font-size: 0.75rem; }
            .text-sm { font-size: 0.875rem; }
            .text-base { font-size: 1rem; }
            .text-2xl { font-size: 1.5rem; }
            .font-bold { font-weight: 700; }
            .text-center { text-align: center; }
            .text-right { text-align: right; }

            .bg-gray-200 { background-color: #e5e7eb; }
            .border-gray-300 { border-color: #d1d5db; }

            .border-collapse { border-collapse: collapse; }
            .border { border: 1px solid #d1d5db; }
            .p-2 { padding: 0.5rem; }
            .border-t { border-top: 1px solid #d1d5db; }

            .flex { display: flex; }
            .flex-col { flex-direction: column; }
            .justify-between { justify-content: space-between; }
            .items-center { align-items: center; }


        `,
        onPrintDialogClose: function() {
            $('#print-order').addClass('hidden');
        }
    });
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'X-Requested-With': 'XMLHttpRequest' // Vẫn cần
    }
});

$(document).ready(function () {
    handleAjaxPagination('#pd-cat-container', '#pd-cat-table', '#pd-cat-pagination');
    // handleAjaxPagination('#cm-cat-container', '#cm-cat-table', '#cm-cat-pagination');

    for (let i = 1; i <= 8; i++) {
        handleClickUploadImage('pd-upl-container' + i, 'pd-upl-input' + i);
        handleUploadImage('pd-upl-container' + i, 'pd-upl-input' + i, 'pd-upl-txt' + i);
    }
});

window.handlePrintOrder = handlePrintOrder;
window.handleGenerateQRCode = handleGenerateQRCode;
window.handleCopyDivToClipboard = handleCopyDivToClipboard;
window.handleCaptureDivToImage = handleCaptureDivToImage;
window.handleValidateDecimalInput = handleValidateDecimalInput;
window.handleCloseContent = handleCloseContent;
window.handleShowContent = handleShowContent;
window.handleConfirmDelete = handleConfirmDelete;
window.handleCloseModal = handleCloseModal;
window.handleShowSuccessAlert = handleShowSuccessAlert;
window.handleSearchData = handleSearchData;
