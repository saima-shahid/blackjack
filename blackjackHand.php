<?php

function blackjackHand($card1,$card2) 
{
        
	$count = 0;
        $value = 0;
	$errors = array();

        $faces = array(2,3,4,5,6,7,8,9,10,'J','Q','K','A');
	$suits = array("S"=>"Spades","C"=>"Clubs","D"=>"Diamond","H"=>"Hearts");

	$cards = array($card1,$card2);

	foreach($cards as $card)
	{
		$revsuit = strrev($card);
		$suit = $revsuit{0};
		$face = strtoupper(substr($card,0, -1));

		if(!array_key_exists($suit,$suits))
		{
			$errors['suit'] = "Invalid suit in card".$count.". Example: 9S .. (Nine of Spades)";
		}

		if(!in_array($face,$faces))
		{
			$errors['face'] = "Invalid face in card".$count.". Example: 9S .. (Nine of Spades)";
		}

        		if($face=="Q" OR $face=="J" OR $face=="K")
		{	
			$value = intval($value) + 10;
        		} 
		elseif($face == "A") 
		{
            		$value = intval($value) + 11;
        		} 
		else 
		{
            		$value = intval($value) + intval($face);
        		}

		if(!empty($errors))
		{
			foreach($errors as $error)
			{
				echo $error;
			}
		}
			
		$count++;
	}
		
	return $value;
		
    }
?>