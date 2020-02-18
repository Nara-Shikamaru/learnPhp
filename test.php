<?php
	//	declare(encoding='utf-8');
?>
<html lang="">

<h2>
    PHP流程控制
</h2>
<ol>
    <li>
        <h3>
            if、else、elseif/else if
        </h3>
        <ul>
            <li>

                if(expr) statement;
                <br>expr按照布尔求值:
                <br>1.true：执行statement
                <br>2.false: 忽略statement

                <br>if语句可以无限嵌套在其他if语句
            </li>
            <li>
                else
                <br>不满足expr时执行的语句，延伸了if语句
                <br>else 仅在if以及elseif语句中的表达式的值为false时执行
            </li>

            <li>
                elseif/else if
                <br>仅在之前的if和elseif的条件表达式值为false，且当前表达式值为true时执行语句
                <br>同一个if可以有多个作为延伸的elseif语句，其中第一个表达式值为true的elseif语句将被执行
                <br>elseif也可以写成else if，二者行为完全一样
                <br><u>elseif与else if使用花括号时相同，使用冒号定义时会产生解析错误.</u>
            </li>
        </ul>
        <p><u>总结：</u>
            1、语句为一句时可以不写冒号或花括号
            <br>2、语句多句时需要用花括号包裹，或用冒号，注意endif</p>
        <div>
			<?php

				$a = 5;
				$b = 3;
				if ($a > $b)
					echo "$a is greater than $b.";
                elseif ($a == $b) {
					echo "$a is equal to $b.";
				} else {
					echo "$a is less than $b.";
				}
				echo "<br>";
				if ($a > $b):
					echo "$a is greater than $b.";

                elseif ($a == $b):
					echo "$a is equal to $b.";

				else:
					echo "$a is less than $b.";
					echo "haha";
				endif;

			?>
        </div>
    </li>

    <li>
        <h3>
            替代语法Alternative Syntax.
        </h3>
        <p>
            基本形式是把{换为：，把}换为endif、endwhile、endfor、endforeach、endswitch
        </p>
        <div>

			<?php
				$a1 = 6;
			?>
			<?php
				if ($a1 == 7):
					?>
                    A is equal to 7
				<?php
                elseif ($a1 > 7):
					?>
                    A is greater than 7
				<?php
				else:
					?>
                    A is less than 7
				<?php
				endif;
			?>

            <!--			--><?php
				//				if($a1 == 7) {
				//					?>
            <!--                    A is equal to 7-->
            <!--					--><?php
				//				}
				//                elseif ($a1>7) {
				//					?>
            <!--                    A is greater than 7-->
            <!--					--><?php
				//				}
				//				else {
				//					?>
            <!--                    A is less than 7-->
            <!--					--><?php
				//				}
				//            ?>
			<?php
				switch ($a1):

					case 6:
						?>
                        A is equal to 6.
					<?php
				endswitch;
			?>
        </div>
    </li>
    <li>
        <h3>
            while/do-while
        </h3>
        <p>
            1.while(expr) statement
            <br>(1)只要expr==true则重复执行statement。
            <br>(2)expr的值在每次循环时检测，即使这个值在循环语句中发生改变，语句也不会立即停止，而是直到本次循环结束。
            <br>(3)如果expr初始值即为false，则statement一次也不会执行

            <br>2.do...statement...while(expr)
            <br>(1)expr的值在每次循环结束时检测
            <br>(2)statement至少会执行一次
            <br>(3)无法使用alternative syntax

        </p>
        <div>
			<?php
				echo "<br>";
				$i = 1;
				while ($i <= 10) {
					echo $i++;
				}

				echo $i;

				echo "<br>";

				$i1 = 1;
				while ($i1 <= 10):
					echo $i1;
					$i1++;
				endwhile;

				echo $i1;

				echo "<br>";
				$i2 = 1;
				do {
					echo $i2++;
				} while ($i2 <= 10);


				$i3 = 2;
				$factor = 3;
				$minimum_limit = 1;
				do {
					if ($i3 < 5) {
						echo 'I3 is not big enough.';
						break;
					}
					$i3 *= $factor;
					if ($i < $minimum_limit) {
						break;
					}
					echo "I3 is OK.";
				} while (0)
			?>


        </div>
    </li>
    <li>
        <h3>
            for
        </h3>
        <p>
            for(expr1;expr2,expr3) statement<br>
            (1) expr1在循环开始前无条件求值并执行一次<br>
            (2) expr2在每次循环开始前求值，如果true，则执行statement，否则终止循环<br>
            (3) expr3在每次循环之后被求值并执行<br>
            (4) 每个expr都可以用逗号分隔，但只取最后一个表达式的结果
        </p>
        <div>
			<?php
				for ($i4 = 1; $i4 <= 10; $i4++) echo "$i4";
				echo "<br>";
				for ($i5 = 1; ; $i5++) {
					if ($i5 > 10) break;
					echo $i5;
				}
				echo "<br>";

				$i6 = 1;
				for (; ;) {
					if ($i6 > 10) {
						break;
					}
					echo "$i6";
					$i6++;
				}

				echo "<br>";
				for ($i7 = 1, $j = 0; $i7 <= 10; $j += $i7, print $i7, $i7++) ;
			?>
        </div>
    </li>
    <li>
        <h3>
            foreach
        </h3>
        <p>
            (1)foreach提供了遍历数组的简单方式。<br>
            (2)foreach仅能应用于数组和对象。<br>
            (3)foreach每次执行时自动将内部指针指向第一个单元
            (4)foreach有两种语法:<br>
            1、foreach(array_expr as $value),遍历给定的数组，每次循环中把当前单元的值赋给$value并且数组内部的指针前移一步<br>
            2、foreach(array_expr as $key=>$value)，同第一种语法，但同时会把当前单元的键名赋给$key<br>
            (5)可通过在$value之前加上&来修改数组的元素,循环结束$value仍会保留，建议用unset($value)将其销毁.<br>
            (6)不支持@抑制错误信息的能力
        </p>
        <div>
			<?php
				$a = array(1, 2, 3, 4);
				$b = [5, 6, 7];
				foreach ($a as $item_value) {
					echo $item_value;
				}
				echo "<br>";
				foreach ($a as $item_key => $item_value) {
					echo "Key: $item_key" . "<br>" . "Value: $item_value" . "<br>";
				}

				foreach ($a as $item_key => &$item_value) {
					$item_value += 2;
					echo "Key: $item_key" . "<br>" . "Value: $item_value" . "<br>";
				}
				unset($item_value);
				foreach ($b as $item_key => &$item_value) {
					$item_value += 2;
					echo "Key: $item_key" . "<br>" . "Value: $item_value" . "<br>";
				}
			?>
        </div>
    </li>
    <li>
        <h3>
            list()给嵌套的数组解包
        </h3>
        <p>
            (1)list($key1,$key2...)<br>
            (2)list中的单元也可以少于嵌套数组的，此时多出来的数组单元将被忽略;若多于则报错<br>
        </p>
        <div>
			<?php
				$arr = [
					[1, 2],
					[3, 4]
				];
				foreach ($arr as list($a, $b)) {
					echo "A: $a; B: $b" . "<BR>";
				}
				//				echo $a;
				foreach ($arr as list($a)) {
					echo "$a" . PHP_EOL;
				}
				//报错
				//				foreach($arr as list($a,$b,$c)){
				//					echo "A: $a; B: $b;C: $c"."<BR>";
				//                }

				$info = array('coffee', 'brown', 'caffeine');
				list($drink, $color, $power) = $info;
				echo "<br>" . "$drink is $color and $power makes it special.";
				echo "<br>";

				list($drink, , $power) = $info;
				echo "$drink has $power." . "<br>";

				list(, , $power) = $info;
				echo "I need $power!\n";

				$data = [
					['id' => 1, 'name' => 'tom'],
					['id' => 2, 'name' => 'fred']
				];
				echo "<br>";
				foreach ($data as list('id' => $id, 'name' => $name)) {
					echo "id: $id,name :$name <br>";
				}

				echo PHP_EOL;
				list(1 => $second, 3 => $fourth, 2 => $third) = [1, 2, 3, 4];
				echo "$second,$third, $fourth\n";

				$foo = array("bob", "fred", "jussi", "jouni", "egon", "marliese");
				@$bar = each($foo);
				@$bar2 = each($foo);
				print_r($bar);
				print_r($bar2);

				$foo2 = array("Robert" => "Bob", "Seppo" => "Sepi");
				$bar3 = each($foo2);
				echo "<br>";
				print_r($bar3);


				echo "<p>each()和list()结合遍历数组</p>";
				echo "<br>";
				$foo = array(2 => 'a', 'foo' => 'b', 0 => 'c');
				$foo[1] = 'd';
				list($x, $y, $z) = $foo;
				var_dump($foo, $x, $y, $z);

				$fruits = array("a" => "apple", "b" => "banana", "c" => "cranberry");
				list('a' => $item1, 'b' => $item2, 'c' => $item3) = $fruits;
				var_dump($item1, $item2, $item3);

				//				reset($fruits);
				$i = 0;
				//				while(list($key,$val) = each($fruits)){
				//				    echo"$key => $val <br>";
				//				    $i++;
				//				    if($i=1){
				//				        break;
				//                    }
				//                }

				foreach ($fruits as $key_ => $val_) {
					echo "$key_ => $val_<br>";
				}

				print_r(each($fruits));

				echo "<br>" . next($fruits);
				echo "<br>" . prev($fruits);
				echo "<br>" . end($fruits);
				echo "<br>" . reset($fruits);

				echo "\$arrr";
			?>
        </div>
    </li>
    <li>
        <h3>
            break
        </h3>
        <p>
            (1)break 结束当前 for，foreach，while，do-while 或者 switch 结构的执行。<br>
            (2)break 可以接受一个可选的数字参数来决定跳出几重循环。<br>
        </p>
        <div>
			<?php
				$arr = array("one", "two", "three", 'four', 'stop', "five");
				while (list(, $vall) = each($arr)) {
					if ($vall == "stop") break 1;
				}
				echo "$vall<br>";

				$i = 0;
				while (++$i) {
					switch ($i) {
						case 5:
							echo "At 5<br />\n";
							break 1;  /* 只退出 switch. */
						case 10:
							echo "At 10; quitting<br />\n";
							break 2;  /* 退出 switch 和 while 循环 */
						default:
							break;
					}
				}
			?>
        </div>
    </li>
    <li>
        <h3>
            continue
        </h3>
        <p>
            (1)continue 在循环结构用用来跳过本次循环中剩余的代码并在条件求值为真时开始执行下一次循环。<br>
            (2)continue 接受一个可选的数字参数来决定跳过几重循环到循环结尾。默认值是 1，即跳到当前循环末尾。 <br>
        </p>
        <div>
			<?php
				$i = 0;
				while ($i++ < 5) {
					echo "Outer<br>\n";
					while (1) {
						echo "Middle<br>\n";
						while (1) {
							echo "Inner<br>\n";
							continue 3;
						}
						echo "This never gets output.<br />\n";
					}
					echo "This never gets output.<br />\n";
				}
			?>
        </div>
    </li>
    <li>
        <h3>
            switch
        </h3>
        <p>
            (1)switch 语句类似于具有同一个表达式的一系列 if 语句。很多场合下需要把同一个变量（或表达式）与很多不同的值比较，并根据它等于哪个值来执行不同的代码。这正是 switch 语句的用途。<br>
            (2)注意和其它语言不同，continue 语句作用到 switch 上的作用类似于 break。如果在循环中有一个 switch 并希望 continue 到外层循环中的下一轮循环，用 continue 2
            <br>
            (3)注意 switch/case 作的是松散比较。<br>
            (4)case 表达式可以是任何求值为简单类型的表达式，即整型或浮点数以及字符串。不能用数组或对象，除非它们被解除引用成为简单类型。<br>
            (5)允许使用分号代替 case 语句后的冒号<br>
        </p>
        <div>
			<?php
				$n = 4;
				switch ($n) {
					case 0;
						echo "n is equal to 0";
						break;
					case 1:
						echo "n is equal to 1";
						break;
					case 4;
						echo "n is equal to 4";
						break;
					case 5:
						echo "n is equal to 5";
						break;
				}
				echo "<br>";
				$txt = 0;
				switch ($txt) {
					case "banana":
						echo "this is banana";
						break;
					case "bar":
						echo "this is bar";
						break;
					case "cake":
						echo "this is cake";
						break;
					default:
						echo "I don't know.";
						break;
				}
				echo "<br>";
				$n1 = 3;
				switch ($n) {
					case 0:

					case 1:

					case 4:
						echo "n1 is less than 4 but not negative.";
						break;
					case 5:
						echo "n1 is equal to 5";
						break;
				}
			?>
        </div>
    </li>
    <li>
        <h3>
            declare
        </h3>
        <p>
            (1) declare 结构用来设定一段代码的执行指令。 <br>
            (2) declare 的语法和其它流程控制结构相似：declare(directive) statement<br>
            (3) directive 部分允许设定 declare 代码段的行为。目前只认识两个指令：ticks（更多信息见下面 ticks 指令）以及 encoding（更多信息见下面 encoding 指令）<br>
            (4) declare 代码段中的 statement 部分将被执行——怎样执行以及执行中有什么副作用出现取决于 directive 中设定的指令。 <br>
            (5) declare 结构也可用于全局范围，影响到其后的所有代码（但如果有 declare 结构的文件被其它文件包含，则对包含它的父文件不起作用）。<br>
        </p>
        <div>
			<?php
				declare(ticks=1);


				function tick_handler()
				{
					echo "tick_handler() called.<br>";

				}

				register_tick_function('tick_handler');

				$a = 1;
				if ($a > 0) {
					$a += 2;
					print($a);
				}

				unregister_tick_function('tick_handler');

				//                phpinfo();
			?>
        </div>
    </li>
    <li>
        <h3>
            return
        </h3>
        <p>

        </p>
        <div>
			<?php
				$string = 'cup';
				$name = 'coffee';
				$str = 'This is a $string with my $name in it.';
				echo $str . "<br>";
				eval("\$str = \"$str\";");
				echo $str . "<br>";
			?>
        </div>
    </li>
    <li>
        <h3>
            include、require、include_once、require_once
        </h3>
        <p>
            include 语句包含并运行指定文件。<br>
            (1)被包含文件先按参数给出的路径寻找，如果没有给出目录（只有文件名）时则按照 include_path 指定的目录寻找。如果在 include_path 下没找到该文件则 include
            最后才在调用脚本文件所在的目录和当前工作目录下寻找。如果最后仍未找到文件则 include 结构会发出一条警告；这一点和 require 不同，后者会发出一个致命错误。<br>
            (2)如果定义了路径——不管是绝对路径（在 Windows 下以盘符或者 \ 开头，在 Unix/Linux 下以 / 开头）还是当前目录的相对路径（以 . 或者 .. 开头）——include_path
            都会被完全忽略。例如一个文件以 ../ 开头，则解析器会在当前目录的父目录下寻找该文件。<br>
            (3)如果定义了路径——不管是绝对路径（在 Windows 下以盘符或者 \ 开头，在 Unix/Linux 下以 / 开头）还是当前目录的相对路径（以 . 或者 .. 开头）——include_path
            都会被完全忽略。例如一个文件以 ../ 开头，则解析器会在当前目录的父目录下寻找该文件<br>
            (4)当一个文件被包含时，其中所包含的代码继承了 include 所在行的变量范围。从该处开始，调用文件在该行处可用的任何变量在被调用的文件中也都可用。不过所有在包含文件中定义的函数和类都具有全局作用域。<br>
            (5)include_once: 如果该文件中已经被包含过，则不会再次包含。如同此语句名字暗示的那样，只会包含一次。<br>
            (6)include_once 可以用于在脚本执行期间同一个文件有可能被包含超过一次的情况下，想确保它只被包含一次以避免函数重定义，变量重新赋值等问题。<br>
            (7)require和include的区别：require找不到指定文件时发出警告，会继续运行；include直接报错（fetal error：致命错误）<br>
        </p>
        <div>
			<?php
				//设置include_path选项

				ini_set('include_path', '.;D:\Programming\wamp\www\learnPhp');
				set_include_path('.;D:\Programming\wamp\www\learnPhp');
				//重置
				//				restore_include_path();
				//获取当前include_path配置选项
				echo "当前include_path配置为：" . get_include_path();
				echo "<br>";
				echo "当前include_path配置为：" . ini_get('include_path');
				echo "<br>";

				require "./includes/hello.php";


				include "./hi.php";
				include_once "./hi.php";
				// ./代表当前目录
				// ../当前目录的上一级目录
				//  /代表根目录
				$hello = new Hello;
				$hello->sayHello();
			?>
        </div>
    </li>
    <li>
        <h3>
            goto
        </h3>
        <p>
            (1)goto 操作符可以用来跳转到程序中的另一位置。该目标位置可以用目标名称加上冒号来标记，而跳转指令是 goto 之后接上目标位置的标记<br>
            (2)PHP 中的 goto 有一定限制，目标位置只能位于同一个文件和作用域，也就是说无法跳出一个函数或类方法，也无法跳入到另一个函数。也无法跳入到任何循环或者 switch 结构中。可以跳出循环或者
            switch，通常的用法是用 goto 代替多层的 break。<br>
        </p>
        <div>
			<?php
//				goto a;
//				echo "Foo";
//				a:
//				echo "Bar";
//
//				for($i1 = 0,$j1=10;$i1<100;$i1++){
//				    while($j1--){
//				        if($j1 == 17){
//				            goto end;
//                        }
//                    }
//                }
//				echo "i= $i1";
//				end:
//                echo "j hit 17";
				for($i=0,$j=1000; $i<100; $i++) {
					while($j--) {
						if($j==17) goto end;
					}
				}
				echo "i = $i";
				end:
				echo 'j hit 17';
			?>
        </div>
    </li>
    <li>
        <h3>

        </h3>
        <p>

        </p>
        <div>
			<?php

			?>
        </div>
    </li>
    <li>
        <h3>

        </h3>
        <p>

        </p>
        <div>
			<?php

			?>
        </div>
    </li>
    <li>
        <h3>

        </h3>
        <p>

        </p>
        <div>
			<?php

			?>
        </div>
    </li>

</ol>
</html>