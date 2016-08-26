<?php

/*DEFINE PROGRAM OPTIONS*/
define("ARRAY_LENGTH","10000"); // Set how much numbers you want to generate and sort

/************************/

/*
fillArray is helper function to fill array with rand numbers

Arguments: $array(array passed by reference), $n (length of array to create)

Returns: void
*/

function fillArray(&$array, $n)
{       
    for ($i=0; $i<$n; $i++)
    {
     $value = rand(1,10000);               //TODO: check if you can rand wittouh variable :)
     $array[$i] = $value;
    }
}

/*
bubbleSort is a sorting function wich uses bubble sort alghoritm

Arguments: $array(array passed by reference)

Returns: void
*/

function bubbleSort(&$array)
{
    $n = count($array);
    
    for($i=1; $i<$n; $i++)
    {
       for($j=0; $j<$n-1; $j++)
        {
            if($array[$j]>$array[$j+1])
            {
                $temp = $array[$j];
                $array[$j] = $array[$j+1];
                $array[$j+1] = $temp;
            }
        } 
    }
}

/*
quickSort is a sorting function wich uses quick sort alghoritm

Arguments: $array(array passed by reference), [$left (optional first index of array to sort, default: 0), $right (optional last index in array to sort, default: 
function will autocalculate last array element)]

Returns: void
*/

function quickSort(&$array, $left = 0, $right = NULL)
{
    // if no end index of array have been provided, get length of array with count() function then substract with 1 to point at last array element
    if($right == NULL) $right = count($array) - 1; 
   
    
    $m = $array[round(($left + $right) / 2)]; // sets the index of ~middle element
	$i = $left;
	$j = $right;
    
	do // until i <= j go through array, compare i and j with m, and swap eachother until they indexes will be equal
	{
		while ($array[$i] < $m) $i++;
		while ($array[$j] > $m) $j--;
		if ($i <= $j)
		{
			$temp = $array[$i];
			$array[$i] = $array[$j];
			$array[$j] = $temp;
			$i++;
			$j--;
		}
	} 
	while ($i <= $j);
    
	if ($j > $left) quickSort($array, $left, $j);
	if ($i < $right) quickSort($array, $i, $right);
    
}

/*
showArray function just echo array

Arguments: $array(array to echo on screen)

Returns: void
*/

function showArray($array)
{
    global $array;
    $n = count($array);
    
    for ($i=0; $i<$n; $i++) echo "[".$i."] ".$array[$i]."<br>";
}

/*MAIN*/

fillArray($array, ARRAY_LENGTH);

$quickArray = $array;
$bubbleArray = $array;

echo ARRAY_LENGTH." numbers to sort <br>";
sleep(3); // a little time for rest

$time_start = microtime($get_as_float = true);
bubbleSort($bubbleArray);
$time_stop = microtime($get_as_float = true);
$elapsed_time = $time_stop - $time_start;
echo "Bubble sort have taken: ".$elapsed_time." seconds <br>";

sleep(3); // a little time for rest

$time_start = microtime($get_as_float = true);
quickSort($quickArray);
$time_stop = microtime($get_as_float = true);
$elapsed_time = $time_stop - $time_start;
echo "Quick sort have taken: ".$elapsed_time." seconds <br>";

/*END OF MAIN*/

?>