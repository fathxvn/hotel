<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Validasi Bootstrap -->
<script>
    (() => {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', e => {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>

<!-- Sidebar Toggle -->
<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.querySelector('.main-content');
    sidebar.classList.toggle('closed');
    mainContent.classList.toggle('full');
}
</script>

<!-- SweetAlert Login Gagal -->
<?php if ($this->session->flashdata('error')): ?>
<script>
Swal.fire({
  icon: 'error',
  title: 'Login Gagal!',
  text: '<?= $this->session->flashdata('error') ?>',
  timer: 2500,
  showConfirmButton: false
});
</script> 
<?php endif; ?>

<!-- SweetAlert Konfirmasi Hapus -->
<script>
document.querySelectorAll('.tombol-hapus').forEach(button => {
  button.addEventListener('click', function(e) {
    e.preventDefault();
    const href = this.getAttribute('href');

    Swal.fire({
      title: 'Yakin hapus data ini?',
      text: "Data tidak bisa dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = href;
      }
    });
  });
});
</script>

<!-- sweet alert succes -->
<?php if ($this->session->flashdata('success')): ?>
<script>
Swal.fire({
  icon: 'success',
  title: 'Berhasil!',
  text: '<?= $this->session->flashdata('success') ?>',
  timer: 2500,
  showConfirmButton: false
});
</script>
<?php endif; ?>
