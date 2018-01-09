<?php 
	function pre($data) {
		if(is_array($data) || is_object($data)) {
			print"<pre>";
			print_r($data);
			print"</pre>";
		} else {
			echo "<pre>";
			echo $data;
			echo "</pre>";
		}
	}



function cheakAcl($acl)
    {		
		
       $acl_dejson=json_decode($acl);
       

       in_array(request()->path(), $acl_dejson);
        
       return in_array(request()->path(), $acl_dejson);
         //return strstr(request()->path(), $uri); 
    }
 ?>