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

   <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
         <h5 class="mb-0">Transaksi Baru</h5>
      </div>
      <div class="card-body">
         <form method="POST" action="modules/transaksi/proses/insert.php">
            <p class="float-end">Tanggal Transaksi : <?php echo date('d-m-Y'); ?></p>
            <div class="mb-3">
               <table class="table table-bordered table-hover">
                  <thead>
                     <tr>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody id="item-list">
                     <!-- Item rows will be added here dynamically -->
                  </tbody>
                  <tfoot>
                     <tr>
                        <td colspan="3" class="total-row">Grand Total</td>
                        <td class="total-row fw-bold" id="total-amount">0</td>
                        <td></td>
                     </tr>
                  </tfoot>
               </table>
            </div>
            <div>
               <button type="button" class="btn btn-primary" onclick="addItem()">Tambah Item</button>
               <button type="submit" class="btn btn-outline-success">Checkout</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- / Content -->

<script>
   const produk = <?php echo json_encode($produk); ?>;

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
         <td>
            <button type="button" class="btn btn-danger" onclick="removeItem(this)">Batal</button>
         </td>
      `;
      updateTotal();
   }

   function removeItem(button) {
      let row = button.parentNode.parentNode;
      row.parentNode.removeChild(row);
      updateTotal();
   }

   function updateHarga(select) {
      let row = select.parentNode.parentNode;
      let harga = select.options[select.selectedIndex].getAttribute('data-price');
      row.querySelector('.harga').innerText = harga;
      updateSubtotal(row.querySelector('input[name="quantity[]"]'));
   }

   function updateSubtotal(input) {
      let row = input.parentNode.parentNode;
      let harga = parseFloat(row.querySelector('.harga').innerText);
      let quantity = parseInt(input.value);
      let sub_total = harga * quantity;
      row.querySelector('.sub_total').innerText = sub_total;
      updateTotal();
   }

   function updateTotal() {
      let total = 0;
      document.querySelectorAll('.sub_total').forEach(function(subtotalCell) {
         total += parseFloat(subtotalCell.innerText);
      });
      document.getElementById('total-amount').innerText = total;
   }
</script>