<?php 

	function cname($cm)
	{
		if($cm == '0'){

			return '顶级类别';
		} else {

			$rs = DB::table('category')->where('id',$cm)->first();

			return $rs->catename;

		}
	}



 ?>