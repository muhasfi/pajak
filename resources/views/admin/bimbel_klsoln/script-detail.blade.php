<script>
document.addEventListener('DOMContentLoaded', function () {
    let detailIndex = 1; // mulai dari 1 karena index 0 sudah ada

    // fungsi untuk toggle input upload/link
    function toggleVideoInput(wrapper) {
        const select = wrapper.querySelector('select[name$="[video_type]"]');
        const uploadInput = wrapper.querySelector('input[name$="[video_upload]"]');
        const linkInput = wrapper.querySelector('input[name$="[video_link]"]');

        if (select.value === 'upload') {
            uploadInput.classList.remove('d-none');
            linkInput.classList.add('d-none');
        } else {
            uploadInput.classList.add('d-none');
            linkInput.classList.remove('d-none');
        }
    }

    // inisialisasi untuk detail-item yang sudah ada
    document.querySelectorAll('.detail-item').forEach(item => {
        toggleVideoInput(item);
    });

    // event change untuk semua select video_type
    document.addEventListener('change', function (e) {
        if (e.target && e.target.matches('select[name$="[video_type]"]')) {
            toggleVideoInput(e.target.closest('.detail-item'));
        }
    });

    // tambah modul baru
    document.getElementById('add-detail').addEventListener('click', function () {
        let wrapper = document.getElementById('detail-wrapper');
        let newDetail = `
            <div class="detail-item border rounded p-3 mb-3">
                <div class="mb-2">
                    <label>Judul Modul</label>
                    <input type="text" name="details[${detailIndex}][judul]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Deskripsi Modul</label>
                    <textarea name="details[${detailIndex}][deskripsi]" class="form-control"></textarea>
                </div>
                <div class="mb-2">
                    <label>Materi PDF</label>
                    <input type="file" name="details[${detailIndex}][materi_pdf]" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-2">
                    <label>Video</label>
                    <div class="input-group">
                        <select name="details[${detailIndex}][video_type]" class="form-select" style="max-width: 150px;">
                            <option value="upload">Upload</option>
                            <option value="youtube">YouTube</option>
                        </select>
                        <input type="file" name="details[${detailIndex}][video_upload]" class="form-control d-none" accept="video/*">
                        <input type="text" name="details[${detailIndex}][video_link]" class="form-control" placeholder="https://youtube.com/...">
                    </div>
                </div>
                <div class="mb-2">
                    <label>Urutan</label>
                    <input type="number" name="details[${detailIndex}][urutan]" class="form-control" value="${detailIndex+1}">
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-detail">
                    <i class="bi bi-trash"></i> Hapus Modul
                </button>
            </div>
        `;
        wrapper.insertAdjacentHTML('beforeend', newDetail);

        // jalankan toggle pertama kali
        toggleVideoInput(wrapper.lastElementChild);

        detailIndex++;
    });

    // hapus modul
    document.getElementById('detail-wrapper').addEventListener('click', function (e) {
        if (e.target.closest('.remove-detail')) {
            e.target.closest('.detail-item').remove();
        }
    });
});
</script>