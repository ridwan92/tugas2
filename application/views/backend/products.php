			<h1><?=$title;?></h1>
			 <br><center>
			<form action="<?php print site_url();?>backend/products" method="POST" />	
			<input type=text name="nama_prod"> 
			<select name="kategori">
			<option value=''>Pilih Kategori</option>
			<?php
				$kategori=$this->data_model->kategori();
				foreach($kategori as $ktg){
				echo "<option value=".$ktg->CategoryID.">".$ktg->CategoryName."</option> ";
					}	
			?>
			</select>	
			<input type=submit value="CARI">
			</form>
			<br>
			<a href="<?php print site_url();?>backend/products"> <b>Semua Products</b></a>
			</center>

			<table>
				<tr>
					<th>No</th>
					<th>Aksi</th>
					<th>ID Produk</th>
				    <th>Nama Produk</th>
				    <th>ID Supplier</th>
					<th>ID Categori</th>
					<th>QuantityPerUnit</th><th>UnitPrice</th>
					<th>UnitsInStock</th>
					<th>UnitsOnOrder</th>
					<th>ReorderLevel</th>
					<th>Discontinued</th>
				</tr>
				<?php
					$no=0;
					foreach($array_products as $row):	
					$id=$row->ProductID;	
					$no++;	
					$css=($no%2==1)? '' : 'class="bg"';
				?>
				<tr <?=$css;?> >
					<td><?=$no;?>.</td>
				    <td><?=anchor(site_url('backend/products/process/delete/'.$id),'[delete]').' '.
				    	   anchor(site_url('backend/products/form/update/'.$id),'[update]');?></td>				    
				    <td align=center><?=$row->ProductID;?></td>	
					<td><?=$row->ProductName;?></td>
				    <td><?=$row->CompanyName;?></td>
					<td><?=$row->CategoryName;?></td>	
					<td><?=$row->SupplierID;?></td>	
					<td><?=$row->QuantityPerUnit;?></td>
					<td><?=$row->UnitPrice;?></td>	
					<td><?=$row->UnitsInStock;?></td>	
					<td><?=$row->UnitsOnOrder;?></td>
					<td><?=$row->Discontinued;?></td>	
				</tr>
				<?php  endforeach; ?>
			</table>
