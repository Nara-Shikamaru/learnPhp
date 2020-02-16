<html>
<h2>
    PHP变量测试页面
</h2>
<!--    1..变量以 $ 符号开始，后面跟着变量的名称<br>-->
<!--    2..变量名必须以字母或者下划线字符开始<br>-->
<!--    3..变量名只能包含字母数字字符以及下划线（A-z、0-9 和 _ ）<br>-->
<!--    4..变量名不能包含空格<br>-->
<!--    5..变量名是区分大小写的（$y 和 $Y 是两个不同的变量）<br>-->
<?php
	//PHP变量

	$x = 6;
	$y = 11.5;
	$z = $x + $y;

	echo $z;
?>
<!---->
<!--    PHP 没有声明变量的命令。<br>-->
<!--    变量在您第一次赋值给它的时候被创建：<br>-->
<?php
    $txt = "Hello world!";
    $x = 5;
//    $y = 10.5;
?>
<!--PHP 是一门弱类型语言-->
<!--在上面的实例中，我们注意到，不必向 PHP 声明该变量的数据类型。-->
<!--PHP 会根据变量的值，自动把变量转换为正确的数据类型。-->
<!--在强类型的编程语言中，我们必须在使用变量前先声明（定义）变量的类型和名称。-->

PHP 变量作用域
变量的作用域是脚本中变量可被引用/使用的部分。
PHP 有四种不同的变量作用域：
1..local
2..global
3..static
4..parameter

<br>1.global关键字
<?php
    $v1 = 7;
    function myTest(){
//        global $v1;
//		global 关键字用于函数内访问全局变量。
        $v2 = 10;
        echo "<p>测试函数内变量：</p>";
//        echo "变量x为：$v1";
        echo "<br>";
        echo "变量y为：$v2";
    }
	myTest();

	echo "<p>测试函数外变量:<p>";
	echo "变量 x 为: $v1";
	echo "<br>";
//	echo "变量 y 为: $v2";
?>
<!--在以上实例中 myTest() 函数定义了 $x 和 $y 变量。 $x 变量在函数外声明，所以它是全局变量 ， $y 变量在函数内声明所以它是局部变量。-->
<!--当我们调用myTest()函数并输出两个变量的值, 函数将会输出局部变量 $y 的值，但是不能输出 $x 的值，因为 $x 变量在函数外定义，无法在函数内使用，如果要在一个函数中访问一个全局变量，需要使用 global 关键字。-->
<!--然后我们在myTest()函数外输出两个变量的值，函数将会输出全局变量 $x 的值，但是不能输出 $y 的值，因为 $y 变量在函数中定义，属于局部变量-->
<?php
    $a= 1;
    $b = 2;
    function thisTest(){
        global $a,$b;
        $b = $a+ $b;
    }
    thisTest();
    echo "变量b的值为：$b";
?>

<!--PHP 将所有全局变量存储在一个名为 $GLOBALS[index] 的数组中。 index 保存变量的名称。这个数组可以在函数内部访问，也可以直接用来更新全局变量。-->
<!--上述例子也可以这样来写-->
<?php
    $c = 3;
    $d  = 4;
    function anotherTest(){
        $GLOBALS['d'] = $GLOBALS['c'] + $GLOBALS['d'];
    }
    anotherTest();
    echo "变量d的值为：$d";
    echo $GLOBALS['d'];
?>

<br>2.static关键字
<!--当一个函数完成时，它的所有变量通常都会被删除。然而，有时候您希望某个局部变量不要被删除。-->
<!--要做到这一点，请在您第一次声明变量时使用 static 关键字：-->
<?php
    //不用static
    function test(){
        $t = 3;
        echo $t;
        $t ++;
        echo PHP_EOL;
    }

    test();
    test();
    test();
?>

<?php
    //用static关键字
	function test2(){
		static $t = 0;
		echo $t;
		$t ++;
		echo PHP_EOL;
	}

	test2();
	test2();
	test2();
?>

<br>3.parameter作用域
<!--参数是通过调用代码将值传递给函数的局部变量。-->
<!--参数是在参数列表中声明的，作为函数声明的一部分-->
<?php
    function paraTest($para){
        echo $para;
    }
    paraTest(12345);
?>



<br></br>笔记
<!--1、定义在函数外部的就是全局变量，它的作用域从定义处一直到文件结尾。-->
<!--2、函数内定义的变量就是局部变量，它的作用域为函数定义范围内。-->
<!--3、函数之间存在作用域互不影响。-->
<!--4、函数内访问全局变量需要 global 关键字或者使用 $GLOBALS[index] 数组-->
<!--在 php 中函数是有独立的作用域，所以局部变量会覆盖全局变量，即使局部变量中没有全局变量相同的变量，也会被覆盖。-->

<?php
    $i1 = 9;
    $i2 = 19;
    function iTest(){
        echo "i1 - i2 = ";
//        echo $i1 - $i2;
    }
    iTest();
    echo PHP_EOL;
//    <!--对比：-->
    function iTest2(){
        global $i1;
        global $i2;
        echo $i1 - $i2;
    }
    iTest2();
	echo PHP_EOL;
    function iTest3(){
        echo $GLOBALS['i1'] - $GLOBALS['i2'];
    }
    iTest3();
?>


</html>
