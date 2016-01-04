<?php
/* library functions for develop 
   author : Wahyu Widodo

*/

function setpesan($id='',$msg='')
{
	switch ($id) {
	 	case 1  :
	 			$pesan= 'Data berhasil '.$msg;
	 			$css  = 'done';
	 		break;

	 	case 2  :
	 			$pesan= 'Data gagal '.$msg;
	 			$css  = 'error';
	 		break;	

	 	case 3  :
	 			$pesan= 'Data '.$msg.' tidak dapat dihapus karena sedang digunakan ditabel lain';
	 			$css  = 'warning';
	 		break;		
	 	
	 	default:
	 			$pesan= '';
	 			$css  = '';
	 		break;
	 } 
	return '<p class="msg {$css}">'.$pesan.'</p>'; 

}

?>