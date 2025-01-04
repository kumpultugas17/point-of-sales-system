<?php
$result = $conn->query("SELECT * FROM produk");
$produk = [];
while ($row = $result->fetch_assoc()) {
   $produk[] = $row;
}
?>

<div class="container-xxl flex-grow-1 container-p-y">
   <nav class="mb-3" aria-label="breadcrumb">
      <div class="d-flex justify-content-between align-items-center">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
               <a href="?module=dashboard">Home</a>
            </li>
            <li class="breadcrumb-item">
               <a href="javascript:void(0);">Transaksi</a>
            </li>
            <li class="breadcrumb-item active">Transaksi Baru</li>
         </ol>
      </div>
   </nav>

   <form method="POST" action="modules/transaksi/proses/insert.php">
      <div class="row">
         <div class="col-md-9 col-sm-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Transaksi Baru</h5>
               </div>
               <div class="card-body">
                  <p class="float-end">Tanggal Transaksi : <?php echo date('d-m-Y'); ?></p>
                  <div class="mb-3">
                     <table class="table">
                        <thead>
                           <tr>
                              <th>Produk</th>
                              <th>Qty</th>
                              <th>Harga</th>
                              <th>Subtotal</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody id="item-list">
                           <!-- Item rows will be added here dynamically -->
                        </tbody>
                        <tfoot>
                           <tr>
                              <th colspan="3" class="total-row text-end">Grand Total</th>
                              <th class="total-row" id="total-amount">0</th>
                              <th></th>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
                  <div>
                     <button type="button" class="btn btn-primary btn-sm" onclick="addItem()">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bx-plus bx-xs me-2"></i>Add Item</span>
                     </button>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-3 col-sm-12">
            <div class="card">
               <div class="card-body d-grid">
                  <button type="submit" class="btn btn-success d-grid w-100 mb-4">
                     <span class="d-flex align-items-center justify-content-center text-nowrap">
                        <i class="bx bx-cart-alt bx-xs me-2"></i>Checkout
                     </span>
                  </button>
                  <a href="javascript:void(0);" class="btn btn-secondary d-grid w-100" onclick="window.location.reload()">Batal</a>
               </div>
            </div>
         </div>
      </div>
   </form>
</div>
<!-- / Content -->

<script>
   // Array produk
   const produk = <?php echo json_encode($produk); ?>;

   // Format rupiah Indonesia
   const rupiah = (number) => {
      return new Intl.NumberFormat("id-ID", {
         style: "currency",
         currency: "IDR"
      }).format(number);
   }

   // Fungsi untuk menambahkan item
   function addItem() {
      let itemList = document.getElementById('item-list');
      let newRow = itemList.insertRow();

      // Buat pilihan produk dari array produk
      let produtOption = produk.map(produk => {
         return `
         <option value="${produk.id}" data-price="${produk.harga}">${produk.kode_produk} - ${produk.nama_produk}</option>
         `;
      }).join('');

      newRow.innerHTML = `
      <tr>
         <td>
            <select class="form-select" name="produk_id[]" onchange="updateHarga(this)">
               <option value="" data-price="0" selected>Pilih Produk</option>
               ${produtOption}
            </select>
         </td>
         <td>
            <input type="number" class="form-control" name="quantity[]" min="0" value="0" oninput="updateSubtotal(this)">
         </td>
         <td class="harga">
            0
         </td>
         <td class="sub_total">
            0
         </td>
         <td class="text-center">
            <button type="button" class="btn btn-sm px-2 btn-outline-danger" onclick="removeItem(this)"><span class="bx bx-trash"></span></button>
         </td>
      </tr>`;
      updateTotal();
   }

   // Fungsi untuk menghapus item
   function removeItem(button) {
      let row = button.parentNode.parentNode;
      row.parentNode.removeChild(row);
      updateTotal();
   }

   // Fungsi untuk memperbarui harga
   function updateHarga(select) {
      let row = select.parentNode.parentNode;
      let harga = select.options[select.selectedIndex].getAttribute('data-price');
      row.querySelector('.harga').innerText = harga;
      updateSubtotal(row.querySelector('input[name="quantity[]"]'));
   }

   // Fungsi untuk memperbarui subtotal
   function updateSubtotal(input) {
      let row = input.parentNode.parentNode;
      let harga = parseFloat(row.querySelector('.harga').innerText);
      let quantity = parseInt(input.value);
      let sub_total = harga * quantity;
      row.querySelector('.sub_total').innerText = sub_total;
      updateTotal();
   }

   // Fungsi untuk memperbarui total
   function updateTotal() {
      let total = 0;
      document.querySelectorAll('.sub_total').forEach(function(subtotalCell) {
         total += parseFloat(subtotalCell.innerText);
      });
      document.getElementById('total-amount').innerText = total;
   }
</script>