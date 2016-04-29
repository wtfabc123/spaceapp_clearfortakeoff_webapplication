<!DOCTYPE html>

<html>

<body>












<?php 
class Matrix {
    public $arr, $rows, $cols;

    function Matrix($row, $col) {
        if ($row > 0 && $col > 0) {
            $arr        = array();
            $this->rows = $row;
            $this->cols = $col;

            for ($a=0; $a < $this->rows; $a++) {
                array_push($arr,array());

                for ($b=0; $b < $this->cols; $b++) {
                    array_push($arr[$a],0);
                }
            }
        }
    }

    function SetElem($x, $y, $val) {
        if ($x > -1 && $x < $this->rows) {
            if ($y > -1 && $y < $this->cols) {
                $this->arr[$x][$y] = $val;
            }
        }
    }

    function GetElem($x, $y) {
        if ($x > -1 && $x < $this->rows) {
            if ($y > -1 && $y < $this->cols) {
                return $this->arr[$x][$y];
            }
        }
    }

    function Add($matrix) {
        if ($this->rows == $matrix->rows && $this->cols == $matrix->cols) {
            $rslt = new Matrix($this->rows,$this->cols);

            for ($a=0; $a < $this->rows; $a++) {
                for ($b=0; $b < $this->cols; $b++) {
                    $rslt->SetElem($a,$b,$this->GetElem($a,$b) + $matrix->GetElem($a,$b));
                }
            }

            return $rslt;
        }
    }

    function Subtract($matrix) {
        if ($this->rows == $matrix->rows && $this->cols == $matrix->cols) {
            $rslt = new Matrix($this->rows,$this->cols);

            for ($a=0; $a < $this->rows; $a++) {
                for ($b=0; $b < $this->cols; $b++) {
                    $rslt->SetElem($a,$b,$this->GetElem($a,$b) - $matrix->GetElem($a,$b));
                }
            }

            return $rslt;
        }
    }

    function Multiply($matrix) {
        if ($this->cols == $matrix->rows) {
            $rslt = new Matrix($this->rows, $matrix->cols);

            for ($a=0; $a < $rslt->rows; $a++) {
                for ($b=0; $b < $rslt->cols; $b++) {
                    $total = 0;

                    for ($c=0; $c < $matrix->rows; $c++) {
                        $total += $this->GetElem($a,$c) * $matrix->GetElem($c,$b);
                    }

                    $rslt->SetElem($a,$b,$total);
                }
            }

            return $rslt;
        }
    }

    function ScalarMultiply($num) {
        $rslt = new Matrix($this->rows,$this->cols);

        for  ($a=0; $a < $rslt->rows; $a++) {
            for  ($b=0; $b < $rslt->cols; $b++) {
                $rslt->SetElem($a,$b,$this->GetElem($a,$b) * $num);
            }
        }

        return $rslt;
    }
}
?>




<?php 
$mat = new Matrix(4,4);

$mat->SetElem(0,0,1,2);
$mat->SetElem(0,1,2,2);
$mat->SetElem(1,0,3,2);
$mat->SetElem(1,1,4,2);

echo $mat->GetElem(0,2);

$mat2 = new Matrix(2,2);

$mat2->SetElem(0,0,5);
$mat2->SetElem(0,1,6);
$mat2->SetElem(1,0,7);
$mat2->SetElem(1,1,8);
echo 2;



$MultiplyResult = $mat->Multiply($mat2);
$ScalarResult   = $mat->ScalarMultiply(2);
$AddResult      = $mat->Add($mat2);
$SubtractResult = $mat->Subtract($mat2);

echo 3;

echo $SubtractResult->GetElem(1,1);
?>





 </body>


</html>
