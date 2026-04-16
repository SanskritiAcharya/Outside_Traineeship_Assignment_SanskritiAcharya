<?php
class RomanCalculate {
    private $number;  
    public function putValue($n) {
        $this->number = $n;
    }
    public function makeRoman() {
        $num = $this->number;
        $res = "";
        while ($num >= 1000) {
            $res = $res . "M";
            $num = $num - 1000;
        }
        if ($num >= 900) {
            $res = $res . "CM";
            $num = $num - 900;
        }
        if ($num >= 500) {
            $res = $res . "D";
            $num = $num - 500;
        }
        if ($num >= 400) {
            $res = $res . "CD";
            $num = $num - 400;
        }
        while ($num >= 100) {
            $res = $res . "C";
            $num = $num - 100;
        }
        if ($num >= 90) {
            $res = $res . "XC";
            $num = $num - 90;
        }
        if ($num >= 50) {
            $res = $res . "L";
            $num = $num - 50;
        }
        if ($num >= 40) {
            $res = $res . "XL";
            $num = $num - 40;
        }
        while ($num >= 10) {
            $res = $res . "X";
            $num = $num - 10;
        }
        if ($num >= 9) {
            $res = $res . "IX";
            $num = $num - 9;
        }
        if ($num >= 5) {
            $res = $res . "V";
            $num = $num - 5;
        }
        if ($num >= 4) {
            $res= $res . "IV";
            $num = $num - 4;
        }
        while ($num >= 1) {
            $res= $res. "I";
            $num = $num - 1;
        }
        return $res;
    }
}

$output = "";
$hasError = false; 
if (isset($_POST['num'])) {
    $n = $_POST['num'];
    if ($n >= 1 && $n <= 3999) {
        $obj = new RomanCalculate();
        $obj->putValue($n);
        $output = $obj->makeRoman();

    } else {
        $output = "Please Enter number between 1 and 3999";
        $hasError = true;
    }
}
?>
<html>
<body>
<h2>Roman Calculator</h2>
<form method="post">
    Enter number:
    <input type="number" name="num">
    <input type="submit" value="Convert">
</form>
<h4 style='color:gray;'>Result: <?php echo $output; ?></h4>
</body>
</html>