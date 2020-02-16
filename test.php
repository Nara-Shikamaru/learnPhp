<html>
	<h2>
		PHP5常量
	</h2>
	常量是一个简单值的标识符。该值在脚本中不能改变。
	一个常量由英文字母、下划线、和数字组成,但数字不能作为首字母出现。 (常量名不需要加 $ 修饰符)。
	注意： 常量在整个脚本中都可以使用。
	<div>
		<h4>1.设置PHP常量(define()函数)</h4>
			<p>bool define ( string $name , mixed $value ] )</p>
<!--				name：必选参数，常量名称，即标志符。-->
<!--				value：必选参数，常量的值。-->

		<?php
			define("CONSTANT","Hello,world.");
			echo CONSTANT;
//			echo Constant;
			echo PHP_EOL;
			echo "<h4>2.设置PHP常量(const关键字)</h4>";
			const WELCOME = 'Hello world.';
			echo WELCOME;

			echo "hello";
			echo PHP_EOL;
			echo "world";
		?>


	</div>

	<h4>
		数组作为常量
	</h4>
	<div>
		<?php
			define('QUARTLIST',array('1. Quarter'=>array('jan','feb','mar'),'2.Quarter'=>array('may','jun','jul')));
			const CON = array('1.Quarter'=>array('jan','feb','mar'),'2.Quarter'=>array('may','jun','jul'));
			echo CON['1.Quarter'][1];
			echo QUARTLIST['2.Quarter'][0];
			echo defined('CON1');//验证是否定义了名为name的常量
		?>
	</div>

	<p>笔记：和使用 define() 来定义常量相反的是，使用 const 关键字定义常量必须处于最顶端的作用区域，因为用此方法是在编译时定义的。这就意味着不能在函数内，循环内以及 if 语句之内用 const 来定义常量。</p>
</html>