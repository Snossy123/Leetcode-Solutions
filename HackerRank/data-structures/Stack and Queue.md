## Equal Stacks
Problem Link: https://hackerrank.com/challenges/equal-stacks/problem

```php
<?php
function equalStacks($h1, $h2, $h3) { 
    $h1_sum =  array_sum($h1);
    $h2_sum =  array_sum($h2);
    $h3_sum =  array_sum($h3); 
    $ind1 = 0;
    $ind2 = 0;
    $ind3 = 0;

    while($h1_sum != $h2_sum || $h2_sum != $h3_sum || $h1_sum != $h3_sum){
        if($h1_sum >= $h2_sum && $h1_sum >= $h3_sum)
            {$h1_sum -= $h1[$ind1]; $ind1++;}
        else if($h1_sum <= $h2_sum && $h2_sum >= $h3_sum)
            {$h2_sum -= $h2[$ind2]; $ind2++;}
        else
            {$h3_sum -= $h3[$ind3]; $ind3++;}
    }
    return $h1_sum;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n1 = intval($first_multiple_input[0]);

$n2 = intval($first_multiple_input[1]);

$n3 = intval($first_multiple_input[2]);

$h1_temp = rtrim(fgets(STDIN));

$h1 = array_map('intval', preg_split('/ /', $h1_temp, -1, PREG_SPLIT_NO_EMPTY));

$h2_temp = rtrim(fgets(STDIN));

$h2 = array_map('intval', preg_split('/ /', $h2_temp, -1, PREG_SPLIT_NO_EMPTY));

$h3_temp = rtrim(fgets(STDIN));

$h3 = array_map('intval', preg_split('/ /', $h3_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = equalStacks($h1, $h2, $h3);

fwrite($fptr, $result . "\n");

fclose($fptr);
```

## Queue using Two Stacks
Problem Link: https://hackerrank.com/challenges/queue-using-two-stacks/problem

```php
<?php
$_fp = fopen("php://stdin", "r");
$n = fgets($_fp);
$q = new SplQueue();
while($n){
    $inp = explode(" ", fgets($_fp));
    if($inp[0] == '1'){
        $q->enqueue($inp[1]);
    }else if($inp[0] == '2'){
        $q->dequeue();
    }else{
        echo $q[0];
    }
    
    $n--;
}
?>
```

## Balanced Brackets
Problem Link: https://hackerrank.com/challenges/balanced-brackets/problem

```php
<?php
function isBalanced($s) {
    $st = [];
    for($ch=0; $ch<strlen($s); $ch++){
        if($s[$ch] == '{' || $s[$ch] == '[' || $s[$ch] == '('){
            array_push($st, $s[$ch]);
        }else{
            if(count($st)==0)
                return "NO";
            
            $top = array_pop($st);
            if($top == '[' && $s[$ch] == ']' ||
               $top == '{' && $s[$ch] == '}' || 
               $top == '(' && $s[$ch] == ')')
                    continue;
            else
                return "NO";
        }
    }
    if(count($st)!=0)
        return "NO";
    return "YES";

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $s = rtrim(fgets(STDIN), "\r\n");

    $result = isBalanced($s);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
```
