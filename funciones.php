<?php

	function multiexplode ($delimiters,$string) {

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
	}

	function separar_rut($text)
	{
		$aux = str_split($text);
		$x =0;
	    $largo = count($aux);

	    $ruts;
	    
	    for($i=0;$i<$largo-1;$i++)
	    {
	    	if($aux[$i]!="." && $aux[$i]!="-")
	    	{
	    		$ruts[$x]=$aux[$i];
	    		$x++;
	    	}
	    }
	    return $ruts;
	}

	function separar_dv($text)
	{
		$aux = str_split($text);
		$x =0;
	    $largo = count($aux);

	    $ruts;
	    
	    for($i=0;$i<$largo;$i++)
	    {
	    	if($aux[$i]!="." && $aux[$i]!="-")
	    	{
	    		$ruts[$x]=$aux[$i];
	    		$x++;
	    	}
	    }

	    return $ruts[count($ruts)-1];
	}
?>