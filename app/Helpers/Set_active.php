<?php
namespace App\Helpers;
use Illuminate\Http\Request;

class Set_active{
	public static function page_active($page,$halaman)
	{
		if($page == $halaman){
			$return = "active";
		}else{
			$return = "";
		}
		return $return;
	}
}

?>