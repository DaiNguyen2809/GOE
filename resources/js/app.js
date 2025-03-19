import './bootstrap';
import Swal from 'sweetalert2';
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

window.handleCloseContent = handleCloseContent;
window.handleShowContent = handleShowContent;
window.handleConfirmDelete = handleConfirmDelete;
window.handleCloseModal = handleCloseModal;
window.handleShowSuccessAlert = handleShowSuccessAlert;
window.handleSearchData = handleSearchData;
