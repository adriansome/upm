<?php
class Utility extends CApplicationComponent {
    public function object_to_array($d) {
        if (is_object($d))
            $d = get_object_vars($d);

        return is_array($d) ? array_map(__METHOD__, $d) : $d;
    }
	
	public function string_to_slug($str) {
		return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $str)));
	}

    public function array_to_object($d) {
        return is_array($d) ? (object) array_map(__METHOD__, $d) : $d;
    }

    public function truncate_text($string, $limit, $break=".", $pad="...")
	{
	  if(strlen($string) <= $limit) return $string;

	  if(false !== ($breakpoint = strpos($string, $break, $limit)))
	  {
	    if($breakpoint < strlen($string) - 1)
	    	$string = substr($string, 0, $breakpoint) . $pad;
	  }
	  return $string;
	}
}
?>