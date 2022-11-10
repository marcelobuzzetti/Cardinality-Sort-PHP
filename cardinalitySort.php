<?php



/*
 * Complete the 'cardinalitySort' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY nums as parameter.
 * Returns a sorted list of numbers according to the number of 1's in binary number, first sorted by qty 1's and then sorted by number.
 */

function cardinalitySort($nums)
{
    $array = [];
    $arrayRes = [];
    /* Create an array of numbers => qty 1's in binary number */
    foreach ($nums as $value) {
        $bin = decbin($value);
        $qtd = substr_count($bin, 1);
        $array[$value] = $qtd;
    }

    /* Sort values by qty number of 1's */
    asort($array, 0);

    /* Uncomment to see quantity of number 1's */
    /* print_r($array); */

    /* Check max value */
    $count = max($array);

    $temp = [];

    /* Iterate according max value */
    for ($i=1; $i <= $count; $i++) { 
        /* Compare qty 1's and value */
        foreach ($array as $key => $value) {
            /* If true, save number in temp array */
            if($value === $i){
                $temp[$i][] = $key;
            }
        }

        /* Check if array is not empty */
        if($temp[$i]){
            /* Sort array */
            sort($temp[$i]);
            /* Put values in final array */
            foreach ($temp[$i] as $value) {
                $arrayRes[] = $value;
            }
        }
    }

    return $arrayRes;
}

/* Generate random numbers */
$random_number_array = range(0, 20000);
/* Shuffle */
shuffle($random_number_array);
/* Array size determination */
$test = array_slice($random_number_array ,0,100);

$result = cardinalitySort($test);
print_r($result);
