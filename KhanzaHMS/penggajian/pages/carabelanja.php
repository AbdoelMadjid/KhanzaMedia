<div class="t">
<div class="b">
<div class="l">
<div class="r">
<div class="bl">
<div class="br">
<div class="tl">
<div class="tr">
<div class="y">

<div id="post">
    <h1 class="title">Cara Berbelanja</h1><br>
    <div id="entry">
        <b>Pemilihan Produk :</b>
        <ul>
            <li>1.) Pilih produk-produk yang akan anda beli dengan mengekliknya, lalu setelah masuk kemenu Detail, anda cukup mengeklik tombol BELI. Jumlah pembelian produk dimaksud dapat Anda ganti kemudian klik tombol GANTI.</li>
            <li>2.) Untuk melihat produk-produk yang telah anda kumpulkan, klik menu BELANJAAN ANDA dibagian atas.</li>
            <li>3.) Anda bisa mengubah jumlah pembelian untuk masing-masing produk dengan mengganti nilai pada kotak isian disebelah tombol GANTI, atau membatalkannya dengan mengeklik tombol BATAL. </li>
        </ul>
        <br>
        <b>Transaksi :</b>
        <ul>
            <li>1.) Transaksi tidak dilakukan secara online, hanya pemesanan yang dilakukan secra online melaluli situs web ini.</li>
            <li>2.) Untuk melanjutkan transaksi,klik link SELESAIKAN TRANSAKSI pada bagian bawah dari BELANJAAN ANDA.</li>
            <li>3.) Isilah formulir dengan benar untuk memudahkan pengiriman barang. </li>
        </ul>            
    </div>
 </div>
<div id="post">
    <h1 class="title">Jenis Pembayaran</h1>
    <br>
  <?php
    $x=bukaquery("select * from jenis_bayar order by jenis");
    while ($row=mysql_fetch_row($x)){
    echo "<b>$row[1]</b><p>$row[2]</p>";
    }
  ?>
 </div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<br />