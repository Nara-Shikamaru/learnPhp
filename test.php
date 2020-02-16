<html>
	<h3>PHP5数据类型</h3>
	<h4>1.PHP字符串</h4>
	<?php
		$str = "hello php";
		echo($str);
		echo "<br>";
		$str = "hello world";
		echo $str;
	?>
	<h4>2.PHP整型</h4>
<!--	整数规则:-->
<!--	整数必须至少有一个数字 (0-9)-->
<!--	整数不能包含逗号或空格-->
<!--	整数是没有小数点的-->
<!--	整数可以是正数或负数-->
<!--	整型可以用三种格式来指定：十进制， 十六进制（ 以 0x 为前缀）或八进制（前缀为 0）-->
	<?php
		$x = 5985;
		var_dump($x);
		echo PHP_EOL;
		$x = -345;
		var_dump($x);
		echo PHP_EOL;
		$x = 0x8C;
		var_dump($x);
		echo PHP_EOL;
		$x = 047;
		var_dump($x); //var_dump();用来返回变量的数据类型和值
	?>
	<h4>3.PHP浮点型</h4>
	<?php
		$x = 10.365;
		var_dump($x);
		echo "<br>";
		$x = 2.4e3;
		var_dump($x);
		echo "<br>";
		$x = 8E-5;
		var_dump($x);
		echo "<br>";
	?>
	<h4>4.PHP布尔型</h4>
	<?php
		$x = true;
		$y = false;
		echo $x;
		echo "<br>";
		echo $y;
		var_dump($x);
		var_dump($y);
	?>
	<h4>5.PHP数组</h4>
	<?php
		$stars = array("james","kobe","wade");
		echo "{$stars[0]}";
		echo "第二个球星是$stars[1]";
		echo "第三个球星是{$stars[2]}";
		var_dump($stars);
	?>
	<h4>6.PHP对象</h4>
	<?php
		class Car{
			var $color;
			function __construct($color="green"){
				$this->color = $color;
			}
			function what_color(){
				return $this->color;
			}
		}

		$this_car = new Car("gray");
		echo $this_car->what_color();
	?>
	<h4>7.NULL</h4>
	<?php
		$x = "hello php";
		echo $x;
		$x = null;
		echo $x;
		var_dump($x);
	?>

</html>