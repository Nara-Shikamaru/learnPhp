<html>
<h2>
    PHP运算符
</h2>

<ol>
    <li>
        <h3>
            运算符优先级
        </h3>

        <p>
            运算符优先级指定了两个表达式绑定得有多“紧密”。例如，表达式 1 + 5 * 3 的结果是 16 而不是 18 是因为乘号（“*”）的优先级比加号（“+”）高。必要时可以用括号来强制改变优先级。例如：(1 + 5)
            * 3 的值为 18。
            <br>如果运算符优先级相同，那运算符的结合方向决定了该如何运算。例如，"-"是左联的，那么 1 - 2 - 3 就等同于 (1 - 2) - 3 并且结果是 -4. 另外一方面，"="是右联的，所以 $a = $b
            = $c 等同于 $a = ($b = $c)。
            <br>没有结合的相同优先级的运算符不能连在一起使用，例如 1 < 2 > 1 在PHP是不合法的。但另外一方面表达式 1 <= 1 == 1 是合法的, 因为 == 的优先级低于 <=。
            <br>括号的使用，哪怕在不是必要的场合下，通过括号的配对来明确标明运算顺序，而非靠运算符优先级和结合性来决定，通常能够增加代码的可读性。

        </p>

        <div>
			<?php

			?>
        </div>
    </li>
    <li>
        <h3>
            算术运算符
        </h3>

        <p>
            （1）除法运算符总是返回浮点数。只有在下列情况例外：两个操作数都是整数（或字符串转换成的整数）并且正好能整除，这时它返回一个整数。
            （2）取模运算符的操作数在运算之前都会转换成整数（除去小数部分）
            （3）取模运算符 % 的结果和被除数的符号（正负号）相同。即 $a % $b 的结果和 $a 的符号相同。

        </p>

        <div>
			<?php
				echo(5 % 3), "<br>";
				echo(5 % -3), "<br>";
				echo(-5 % 3), "<br>";
				echo(-5 % -3), "<br>";

				echo(5 / 2), "<br>";
				echo(6 / 2), "<br>";
				echo(9.0 / 3.0), "<br>";
				var_dump(9.0 / 3.0);
				var_dump('9.0' / '3');

				echo(15.6 % 4.6), "<br>";
			?>
        </div>
    </li>
    <li>
        <h3>
            赋值运算符
        </h3>

        <p>
            （1）赋值运算表达式的值也就是所赋的值。也就是说，“$a = 3”的值是 3。
            <br> （2）在基本赋值运算符之外，还有适合于所有二元算术，数组集合和字符串运算符的“组合运算符”，这样可以在一个表达式中使用它的值并把表达式的结果赋给它
            <br>（3）注意赋值运算将原变量的值拷贝到新变量中（传值赋值），所以改变其中一个并不影响另一个。这也适合于在密集循环中拷贝一些值例如大数组。
        </p>

        <div>
			<?php
				$a = ($b = 4) + 5;
				echo "a=$a,b=$b";

				$a = 5;
				$a += 4;
				$b = 'hello';
				$b .= ' there!';

				echo "<br>a={$a},b={$b}";

				echo "<br><u>引用赋值</u><br>" .
					<<<'EOF'
    <p>PHP 支持引用赋值，使用“$var = &$othervar;”语法。引用赋值意味着两个变量指向了同一个数据，没有拷贝任何东西。</p>
EOF;

				$a = 3;
				$b = &$a;

				$a = 999;
				echo "a={$a},b={$b}."

			?>
        </div>
    </li>
    <li>
        <h3>
            位运算符
        </h3>

        <p>
            &、|、^、~、<<、>><br>
            位移在 PHP 中是数学运算。向任何方向移出去的位都被丢弃。左移时右侧以零填充，符号位被移走意味着正负号不被保留。右移时左侧以符号位填充，意味着正负号被保留。

        </p>

        <div>
			<?php
				//				$format = '(%1$2d = %1$04b) = (%2$2d = %2$04b)'
				//					. ' %3$s (%4$2d = %4$04b)' . "<br>";
				//				echo <<<EOH
				// ---------     ---------  -- ---------
				// result        value      op test
				// ---------     ---------  -- ---------
				//EOH;
				//				$values = array(0, 1, 2, 4, 8);
				//				$test = 1 + 4;
				//				echo "<br> Bitwise AND <br>";
				//				foreach ($values as $value) {
				//					$result = $value & $test;
				//					printf($format, $result, $value, '&', $test);
				//				}
				//				echo "\n Bitwise Inclusive OR \n";
				//				foreach ($values as $value) {
				//					$result = $value | $test;
				//					printf($format, $result, $value, '|', $test);
				//				}
				//
				//				echo "\n Bitwise Exclusive OR (XOR) \n";
				//				foreach ($values as $value) {
				//					$result = $value ^ $test;
				//					printf($format, $result, $value, '^', $test);
				//				}
				//
				//				echo 12 ^ 9; // Outputs '5'
				//
				//				echo "12" ^ "9"; // Outputs the Backspace character (ascii 8)
				//				// ('1' (ascii 49)) ^ ('9' (ascii 57)) = #8
				//
				//				echo "hallo" ^ "hello"; // Outputs the ascii values #0 #4 #0 #0 #0
				//				// 'a' ^ 'e' = #4
				//
				//				echo 2 ^ "3"; // Outputs 1
				//				// 2 ^ ((int)"3") == 1
				//
				//				echo "2" ^ 3; // Outputs 1
				//				// ((int)"2") ^ 3 == 1
				//				echo "\n--- BIT SHIFT RIGHT ON POSITIVE INTEGERS ---\n";
				//
				//				$val = 4;
				//				$places = 1;
				//				$res = $val >> $places;
				//				p($res, $val, '>>', $places, 'copy of sign bit shifted into left side');
				//
				//				$val = 4;
				//				$places = 2;
				//				$res = $val >> $places;
				//				p($res, $val, '>>', $places);
				//
				//				$val = 4;
				//				$places = 3;
				//				$res = $val >> $places;
				//				p($res, $val, '>>', $places, 'bits shift out right side');
				//
				//				$val = 4;
				//				$places = 4;
				//				$res = $val >> $places;
				//				p($res, $val, '>>', $places, 'same result as above; can not shift beyond 0');
				//
				//
				//				echo "\n--- BIT SHIFT RIGHT ON NEGATIVE INTEGERS ---\n";
				//
				//				$val = -4;
				//				$places = 1;
				//				$res = $val >> $places;
				//				p($res, $val, '>>', $places, 'copy of sign bit shifted into left side');
				//
				//				$val = -4;
				//				$places = 2;
				//				$res = $val >> $places;
				//				p($res, $val, '>>', $places, 'bits shift out right side');
				//
				//				$val = -4;
				//				$places = 3;
				//				$res = $val >> $places;
				//				p($res, $val, '>>', $places, 'same result as above; can not shift beyond -1');
				//
				//
				//				echo "\n--- BIT SHIFT LEFT ON POSITIVE INTEGERS ---\n";
				//
				//				$val = 4;
				//				$places = 1;
				//				$res = $val << $places;
				//				p($res, $val, '<<', $places, 'zeros fill in right side');
				//
				//				$val = 4;
				//				$places = (PHP_INT_SIZE * 8) - 4;
				//				$res = $val << $places;
				//				p($res, $val, '<<', $places);
				//
				//				$val = 4;
				//				$places = (PHP_INT_SIZE * 8) - 3;
				//				$res = $val << $places;
				//				p($res, $val, '<<', $places, 'sign bits get shifted out');
				//
				//				$val = 4;
				//				$places = (PHP_INT_SIZE * 8) - 2;
				//				$res = $val << $places;
				//				p($res, $val, '<<', $places, 'bits shift out left side');
				//
				//
				//				echo "\n--- BIT SHIFT LEFT ON NEGATIVE INTEGERS ---\n";
				//
				//				$val = -4;
				//				$places = 1;
				//				$res = $val << $places;
				//				p($res, $val, '<<', $places, 'zeros fill in right side');
				//
				//				$val = -4;
				//				$places = (PHP_INT_SIZE * 8) - 3;
				//				$res = $val << $places;
				//				p($res, $val, '<<', $places);
				//
				//				$val = -4;
				//				$places = (PHP_INT_SIZE * 8) - 2;
				//				$res = $val << $places;
				//				p($res, $val, '<<', $places, 'bits shift out left side, including sign bit');
				//
				//
				//				/*
				//				 * Ignore this bottom section,
				//				 * it is just formatting to make output clearer.
				//				 */
				//
				//				function p($res, $val, $op, $places, $note = '')
				//				{
				//					$format = '%0' . (PHP_INT_SIZE * 8) . "b\n";
				//
				//					printf("Expression: %d = %d %s %d\n", $res, $val, $op, $places);
				//
				//					echo " Decimal:\n";
				//					printf("  val=%d\n", $val);
				//					printf("  res=%d\n", $res);
				//
				//					echo " Binary:\n";
				//					printf('  val=' . $format, $val);
				//					printf('  res=' . $format, $res);
				//
				//					if ($note) {
				//						echo " NOTE: $note\n";
				//					}
				//
				//					echo "\n";
				//				}

			?>
        </div>
    </li>
    <li>
        <h3>
            比较运算符
        </h3>

        <p>
            ==、!=、===、！==、<>、<、>、<=、>=、<=>、??、三元运算符 ? :
        </p>

        <div>
			<?php
				$a1 = 6;
				$b1 = 4;
				echo $a1 <=> $b1;
				echo 1 <=> 4;

				var_dump(0 == 'b');
				var_dump('1' == "01");
				var_dump('10' == '1e1');
				var_dump(100 == "1e2");

				switch ('a') {
					case 0:
						echo "0" . "<br>";
						break;
					case 'a':
						echo "a" . "<br>";
						break;
				}
				switch ('a') {
					case 'a':
						echo "a" . "<br>";
						break;
					case 0:
						echo "0" . "<br>";
						break;

				}
				//Integers
				echo 1 <=> 1;//0
				echo 1 <=> 2;//-1
				echo 2 <=> 1;//1
				//Floats
				echo "<br>";
				echo 1.5 <=> 1.5;
				echo 1.5 <=> 2.5;
				echo 5.5 <=> 1.5;
				echo "<br>";

				$x = 4.5;
				$y = 2.5;
				echo $x <=> $y;

				// Strings
				echo "a" <=> "a"; // 0
				echo "a" <=> "b"; // -1
				echo "b" <=> "a"; // 1

				echo "a" <=> "aa"; // -1
				echo "zz" <=> "aa"; // 1

				// Arrays
				echo [] <=> []; // 0
				echo [1, 2, 3] <=> [1, 2, 3]; // 0
				echo [1, 2, 3] <=> []; // 1
				echo [1, 2, 3] <=> [1, 2, 1]; // 1
				echo [1, 2, 3] <=> [1, 2, 4]; // -1

				// Objects
				$a = (object)["a" => "b"];
				$b = (object)["a" => "b"];
				echo $a <=> $b; // 0

				$a = (object)["a" => "b"];
				$b = (object)["a" => "c"];
				echo $a <=> $b; // -1

				$a = (object)["a" => "c"];
				$b = (object)["a" => "b"];
				echo $a <=> $b; // 1

				// only values are compared
				$a = (object)["a" => "b"];
				$b = (object)["b" => "b"];
				echo $a <=> $b; // 1

				$obj = (object)['aaa' => 'bbb'];
				var_dump($obj);
			?>
        </div>
    </li>
    <li>
        <h3>
            错误控制运算符
        </h3>

        <p>
            PHP 支持一个错误控制运算符：@。当将其放置在一个 PHP 表达式之前，该表达式可能产生的任何错误信息都被忽略掉。
        </p>

        <div>
			<?php
				//				/* Intentional file error */
				//				$my_file = @file('non_existent_file') or
				//				die ("Failed opening file: error was '$php_errormsg'");
				//
				//				// this works for any expression, not just functions:
				//				$value = @$cache[$key];
				// will not issue a notice if the index $key doesn't exist.

			?>
        </div>
    </li>
    <li>
        <h3>
            执行运算符
        </h3>

        <p>
            PHP 支持一个执行运算符：反引号（``）。注意这不是单引号！PHP 将尝试将反引号中的内容作为 shell
            命令来执行，并将其输出信息返回（即，可以赋给一个变量而不是简单地丢弃到标准输出）。使用反引号运算符“`”的效果与函数 shell_exec() 相同。
            <br></br>与其它某些语言不同，反引号不能在双引号字符串中使用。
        </p>

        <div>
			<?php
				$output = `services.msc`;
				echo "<pre>$output</pre>"
			?>
        </div>
    </li>
    <li>
        <h3>
            递增、递减运算符 ++、--
        </h3>

        <p>
            在处理字符变量的算数运算时，PHP 沿袭了 Perl 的习惯，而非 C 的。例如，在 Perl 中 $a = 'Z'; $a++; 将把 $a 变成'AA'，而在 C 中，a = 'Z'; a++; 将把 a 变成
            '['（'Z' 的 ASCII 值是 90，'[' 的 ASCII 值是 91）。注意字符变量只能递增，不能递减，并且只支持纯字母（a-z 和 A-Z）。递增／递减其他字符变量则无效，原字符串没有变化。
        </p>

        <div>
			<?php

			?>
        </div>
    </li>
    <li>
        <h3>
            逻辑运算符
        </h3>

        <p>
            and、or、xor、&&、||、！
        </p>

        <div>
			<?php
				$a = (false && foo());
				$b = (true || foo());
				$c = (false and foo());
				$d = (true or foo());

				echo "a=$a,b=$b,c=$c,d=$d";

				// "||" 比 "or" 的优先级高

				// 表达式 (false || true) 的结果被赋给 $e
				// 等同于：($e = (false || true))
				$e = false || true;

				// 常量 false 被赋给 $f，true 被忽略
				// 等同于：(($f = false) or true)
				$f = false or true;

				var_dump($e, $f);

				// --------------------
				// "&&" 比 "and" 的优先级高

				// 表达式 (true && false) 的结果被赋给 $g
				// 等同于：($g = (true && false))
				$g = true && false;

				// 常量 true 被赋给 $h，false 被忽略
				// 等同于：(($h = true) and false)
				($h = true) and false;

				var_dump($g, $h);
				var_dump($o = true and false);

			?>
        </div>
    </li>
    <li>
        <h3>
            字符串运算符
        </h3>

        <p>
            . 和 .=
            <br>有两个字符串（string）运算符。第一个是连接运算符（“.”），它返回其左右参数连接后的字符串。第二个是连接赋值运算符（“.=”），它将右边参数附加到左边的参数之后。
        </p>

        <div>
			<?php

				$a = "Hello ";
				$b = $a . "World!"; // now $b contains "Hello World!"

				$a = "Hello ";
				$a .= "World!";     // now $a contains "Hello World!"

			?>
        </div>
    </li>
    <li>
        <h3>
            数组运算符
        </h3>

        <p>
            +、==、===、！=、<>、！==
            <br>+ 运算符把右边的数组元素附加到左边的数组后面，两个数组中都有的键名，则只用左边数组中的，右边的被忽略。
            <br>数组中的单元如果具有相同的键名和值则比较时相等。
        </p>

        <div>
			<?php
				$arr1 = ['a' => 'apple', 'b' => 'banana'];
				$arr2 = ['a' => 'pear', 'b' => 'strawberry', 'c' => 'cherry'];

				var_dump($arr1 + $arr2);

				var_dump($arr2 + $arr1);
			?>
        </div>
    </li>
    <li>
        <h3>
            类型运算符
        </h3>

        <p>
            (1)instanceof 用于确定一个 PHP 变量是否属于某一类 class 的实例
            <br>(2)instanceof　也可用来确定一个变量是不是继承自某一父类的子类的实例：
            <br>(3)检查一个对象是否不是某个类的实例，可以使用逻辑运算符 not。
            <br>(4)instanceof也可用于确定一个变量是不是实现了某个接口的对象的实例
            <br>(5)instanceof右侧为字符串且值为类名也为true、左右都是某个类的对象也为true
        </p>

        <div>
			<?php

				class MyClass
				{


				}

				class NotMyClass
				{

				}

				$a = new MyClass();

				var_dump($a instanceof MyClass);
				var_dump($a instanceof NotMyClass);

				class ParentClass
				{

				}

				class ChildClass extends ParentClass
				{

				}

				$obj = new ChildClass();
				var_dump($obj instanceof ChildClass);
				var_dump($obj instanceof ParentClass);

				var_dump(!($obj instanceof MyClass));

				interface MyInterface
				{

				}

				class ThisClass implements MyInterface{

			}

			$thisobj = new ThisClass();
				var_dump($thisobj instanceof ThisClass);
				var_dump($thisobj instanceof MyInterface);



				interface Interface2{

                }
                class Class2 implements Interface2{

                }
                $aa = new Class2();
				$bb = new Class2();
				$cc = "Class2";
				$dd = "NNNot";
				echo"----------------------------------------";
				var_dump($aa instanceof $bb);
				var_dump($aa instanceof $cc);
				var_dump($aa instanceof $dd);

				var_dump(get_class($aa));
//				var_dump(is_a($aa,Class2));
			?>
        </div>
    </li>
</ol>
</html>