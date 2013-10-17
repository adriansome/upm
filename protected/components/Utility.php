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
        
    /**
     * Outputs a weeks select dropdown in the specified format
     * @param string $format
     *      The format to output the week select in
     */
    public function get_week_options($format)
    {
        // Get the first day of the current week
        $current_date =  strtotime(date('Y-m-d', strtotime('last week')));
        
        for ($i = 1; $i <= 52; $i++) {
            $this_date = date($format, strtotime('next week', $current_date));
            $current_date = strtotime($this_date);
            $week_value = date('Y-m-d', strtotime($this_date));
            $weeks[$week_value] = $this_date;
        }
        
        return $weeks;
        
    }
    
    /**
     * Formats a date into a human readable format
     * 
     * @param string $format
     *      The format of the date string supplied
     * @param string $date
     *      The date string to format
     * @param bool $includeYear
     *      Include year with output?
     */
    public function get_formatted_date($format, $date, $includeYear=FALSE)
    {
        $parsed_date = date_parse_from_format($format, $date);
        $month_name =  date("F", mktime(0, 0, 0, $parsed_date['month']));
        $formatted = $month_name . " " . $parsed_date['day'];
        if ($includeYear) {
            $formatted .= " " . $parsed_date['year'];
        }
        return $formatted;
    }
}
?>