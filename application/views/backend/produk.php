<?php
	   $mode=$this->uri->segment(3); //menyimpan uri segmen 2 dalam variabel mode
	   if($mode=='cari'): //cek isi var mode. apakah berisi cari? 	   		
			$tmp='Daftar produk';//jika berisi cari. simpan Daftar produk dalam var tmp
			$tmp.='<ol>';//memasukkan ordered list ke dalam var tmp
			foreach ($hasil as $row): //tampilkan nilai array hasil. dengan nama variabel row untuk menyimpan nilai indeks array
				$tmp.='<li>'.$row->ProductName.'</li>'; //menampilkan nilai row dengan kolom ProductName dengan memberi nomor list
			endforeach; //mengakhiri menampilkan nilay array
			$tmp.='</ol>'; //menutup ordered list
			echo $tmp; //mencetak nilai var tmp
			echo br(2); //mencetak baris kosong sebanyak 2 baris
			echo anchor('backend/produk','kembali'); //menampilkan link kembali ke produk		
	   else : //jika segmen 2 tidak berisi cari
			?>
	   		<form action="<?php echo site_url();?>backend/produk/cari" method=POST> <!-- form input dengan tujuan fungsi /produk/cari -->
			Cari produk <!-- mencetak text Cari produk -->
			<br> <!-- baris kosong -->
			<br> <!-- baris kosong -->
			<table border = 0> <!-- tabel dengan nilai border 0 -->
				<tr> <!-- buka baris 1 -->
					<td>Kategori</td> <!-- kolom 1 dengan isi text Kategori -->
					<td>:</td> <!-- kolom 2 dengan isi : -->
					<td><?php echo form_dropdown('kategori', $category); ?></td> <!-- kolom 3 dengan isi dropdown dengan isi var category dengan nama kategori -->
				</tr> <!-- tutup baris 1 -->
				<tr> <!-- buka baris 2 -->
					<td>Nama Produk</td> <!-- kolom 1 dengan isi text Nama Produk -->
					<td>:</td> <!-- kolom 2 dengan isi : -->
					<td><input type='text' name='produk' required='required'></td> <!-- kolom 3 dengan isi input text dengan nama produk -->
				</tr> <!-- tutup baris 2 -->
				<tr> <!-- buka baris 3 -->
					<td></td> <!-- baris 1 kosong -->
					<td></td> <!-- baris 2 kosong -->
					<td><input type='submit' name='cari' value='Cari'></td> <!-- baris 3 berisi tombol dengan nama cari  -->
				</tr> <!-- tutup baris 3 -->
			</table> <!-- tutup tabel -->
			</form> <!-- tutup form -->
			<?php 
	   endif; //mengakhiri if	
?>




