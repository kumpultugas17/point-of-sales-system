<div class="container-xxl flex-grow-1 container-p-y">
   <nav class="mb-3" aria-label="breadcrumb">
      <div class="d-flex justify-content-between align-items-center">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
               <a href="?module=dashboard">Home</a>
            </li>
            <li class="breadcrumb-item">
               <a href="javascript:void(0);">Pengguna</a>
            </li>
            <li class="breadcrumb-item active">List Pengguna</li>
         </ol>
      </div>
   </nav>

   <div class="nav-align-top mb-4">
      <div class="card mb-4">
         <div class="card-body">
            <a href="?module=list-pengguna" class="btn btn-secondary d-flex align-items-center" style="width: fit-content;">
               <i class="tf-icons bx bx-arrow-back me-2"></i> Kembali
            </a>
         </div>
      </div>
      <div class="card mb-4">
         <div class="card-body p-3">
            <form class="px-3 py-2 needs-validation" action="modules/pengguna/proses/insert.php" method="POST" novalidate>
               <div class="mb-3">
                  <label class="form-label" for="nama_pengguna">Nama Pengguna</label>
                  <input type="text" name="nama_pengguna" class="form-control" id="nama_pengguna" placeholder="Masukkan Nama Pengguna" required>
                  <div class="invalid-feedback">
                     Nama Pengguna Harus Diisi
                  </div>
               </div>
               <div class="mb-3">
                  <label class="form-label" for="alamat">Alamat Lengkap</label>
                  <textarea name="alamat" id="alamat" class="form-control" rows="5" placeholder="Masukkan Alamat Lengkap" required></textarea>
                  <div class="invalid-feedback">
                     Alamat Harus Diisi
                  </div>
               </div>
               <div class="mb-3">
                  <label class="form-label" for="telepon">Nomor Telepon</label>
                  <input type="number" name="telepon" class="form-control" id="telepon" placeholder="Masukkan Nomor Telepon" required>
                  <div class="invalid-feedback">
                     Nomor Telepon Harus Diisi
                  </div>
               </div>
               <div class="mb-3">
                  <label class="form-label" for="username">Username</label>
                  <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan Username untuk login" required>
                  <div class="invalid-feedback">
                     Username Harus Diisi
                  </div>
               </div>
               <div class="mb-3">
                  <label class="form-label" for="email">E-mail</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan E-mail" required>
                  <div class="invalid-feedback">
                     E-Mail Harus Diisi
                  </div>
               </div>
               <div class="mb-3">
                  <label class="form-label" for="role">Role</label>
                  <select name="role" class="form-select" id="role" required>
                     <option value="" selected>Pilih Role</option>
                     <option value="Admin">Admin</option>
                     <option value="Kasir">Kasir</option>
                  </select>
                  <div class="invalid-feedback">
                     Role Harus Dipilih
                  </div>
               </div>
               <div class="mb-6">
                  <span class="badge bg-label-danger">Password default adalah <b>"secret"</b></span>
               </div>
               <button type="submit" class="btn btn-primary">Buat</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- / Content -->