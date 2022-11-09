<?php



/*
 * Complete the 'cardinalitySort' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY nums as parameter.
 * Returns a sorted list of numbers according to the number of bits in the number, first sorted by bits and then sorted by number.
 */

function cardinalitySort($nums)
{
    $array = [];
    $arrayRes = [];
    /* Cria um array de numero => qtd BITS */
    foreach ($nums as $value) {
        $bin = decbin($value);
        $qtd = substr_count($bin, 1);
        $array[$value] = $qtd;
    }

    /* Ordena os valores de acordo com a quantidade de BITS */
    asort($array, 0);
    print_r($array);

    /* Verifica o maior valor de BITS */
    $count = max($array);

    $temp = [];

    /* FOR para o tamanho máximo de BITS */
    for ($i=1; $i <= $count; $i++) { 
        /* Iteracao dentro do array comparando o valor com a quantidade de BITS */
        foreach ($array as $key => $value) {
            /* Se iguais, salva dentro de um array temporario */
            if($value === $i){
                $temp[$i][] = $key;
            }
        }

        /* Verifica se o array não é vazio */
        if($temp[$i]){
            /* Ordena o array */
            sort($temp[$i]);
            /* Salva no array final */
            foreach ($temp[$i] as $value) {
                $arrayRes[] = $value;
            }
        }
    }

    return $arrayRes;
}

/* Gera numeros aleatorios dentro do range */
$random_number_array = range(0, 20000);
/* Embaralha */
shuffle($random_number_array);
/* Corta o array no tamanho especificado */
$test = array_slice($random_number_array ,0,100);

$result = cardinalitySort($test);
print_r($result);
