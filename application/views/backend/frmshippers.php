	<h3 class="tit"><?=$title;?></h3>
	<?php
	   $mode=$this->uri->segment(4);
	   if($mode=='insert'):
	   		$id ='';
	   		$nm_cat = '';
	   		$desk = '';
	   else :	   		
	   		$id = $shippers->ShipperID;
	   		$nm_cat = $shippers->CompanyName;
	   		$desk = $shippers->Phone;
	   endif;		

	?>
			<!-- Table (TABLE) -->
			<br /><br />
			
      <form id="commentForm" name="commentForm"  method="post" action="<?=site_url('backend/categories/process/'.$mode.'/'.$id);?>">
      		<input type="hidden" name='id' value="<?=$id;?>">
      		<input type="hidden" name='mode' value="<?=$mode;?>">
			<fieldset>				
				<table class="nostyle">
					<tr>
						<td style="width:100px;">Company Name:</td>
						<td><input type="text" value="<?=$nm_cat;?>" size="40" name="CompanyName" class="input-text" required="phone" /></td>
					</tr>					
					<tr>
						<td class="va-top">Phone:</td>
						<td><textarea cols="75" rows="7" required="required" name="Phone" class="input-text"><?=$desk;?></textarea></td>
					</tr>					
					<tr>
						<td colspan="2" class="t-right">
							<input type="submit" name="btnSimpan"  class="input-submit" value="Submit" /></td>
					</tr>
				</table>
			</fieldset>
      </form>

		