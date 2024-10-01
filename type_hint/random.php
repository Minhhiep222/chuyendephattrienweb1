<?php 
    function getUniqueRandomNumber($min, $max, $usedNumbers) {
        $availableNumbers = array_diff(range($min, $max), $usedNumbers);
        if (empty($availableNumbers)) {
            return null;
        }
        $randomIndex = array_rand($availableNumbers);
        return $availableNumbers[$randomIndex];
    }

    $array1 = [];
    $array2 = [];
    $array3 = [];
    $usedNumbers = [];

    for ($i = 0; $i < 18; $i++) {
        $number1 = getUniqueRandomNumber(1, 52, $usedNumbers);
        $number2 = getUniqueRandomNumber(1, 52, $usedNumbers);
        $number3 = getUniqueRandomNumber(1, 52, $usedNumbers);

        if ($number1 === null || $number2 === null || $number3 === null) {
            break; // Not enough unique numbers available
        }

        $array1[] = $number1;
        $array2[] = $number2;
        $array3[] = $number3;

        $usedNumbers = array_merge($usedNumbers, [$number1, $number2, $number3]);
    }

    echo "Minh Hiệp: " . implode(", ", $array1) . "\n";
    echo "Đức Toàn: " . implode(", ", $array2) . "\n";
    echo "Thành Đạt: " . implode(", ", $array3) . "\n";