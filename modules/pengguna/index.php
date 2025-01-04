<?php
$pengguna = $conn->query("SELECT * FROM pengguna ORDER BY id DESC");
?>

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
            <a href="?module=tambah-pengguna" class="btn btn-primary d-flex align-items-center" style="width: fit-content;">
               <i class="tf-icons bx bx-user-plus me-2"></i> Tambah Pengguna
            </a>
         </div>
      </div>
      <div class="card mb-4">
         <div class="card-body p-3">
            <table class="table table-hover" id="tableData" class="display">
               <thead>
                  <tr class="text-nowrap">
                     <th>#</th>
                     <th>Nama Pengguna</th>
                     <th class="text-start">Telepon</th>
                     <th>Username</th>
                     <th>E-Mail</th>
                     <th>Role</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($pengguna as $pgn) : ?>
                     <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $pgn['nama_pengguna'] ?></td>
                        <td class="text-start"><?= $pgn['telepon'] ?></td>
                        <td><?= $pgn['username'] ?></td>
                        <td><?= $pgn['email'] ?></td>
                        <td><span class="badge <?= $pgn['role'] == 'admin' ? 'bg-label-danger' : 'bg-label-success' ?>"><?= $pgn['role'] ?></span></td>
                        <td>
                           <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                 <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                 <a href="?module=edit-pengguna&id=<?= $pgn['id'] ?>" class="dropdown-item d-flex align-items-center">
                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                 </a>
                                 <!-- Trigger Modal Hapus -->
                                 <button type="button" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#hapusPengguna<?= $pgn['id'] ?>">
                                    <i class="bx bx-trash me-2"></i> Hapus
                                 </button>
                              </div>

                              <!-- Modal Hapus -->
                              <div class="modal fade" id="hapusPengguna<?= $pgn['id'] ?>" data-bs-backdrop="static" tabindex="-1">
                                 <div class="modal-dialog">
                                    <form class="modal-content" action="modules/pengguna/proses/delete.php" method="POST">
                                       <div class="modal-header">
                                          <h5 class="modal-title d-flex align-items-center" id="backDropModalTitle">
                                             <i class="bx bx-user-minus me-2"></i> Hapus Pengguna
                                          </h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>
                                       <div class="modal-body text-wrap">
                                          <input type="hidden" name="id_pengguna" value="<?= $pgn['id'] ?>">
                                          <div class="alert alert-danger">
                                             Apakah anda yakin akan menghapus pengguna dengan Nama <b><?= $pgn['nama_pengguna'] ?></b>?
                                          </div>
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-outline-secondary me-1" data-bs-dismiss="modal">
                                             Batal
                                          </button>
                                          <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<!-- / Content -->