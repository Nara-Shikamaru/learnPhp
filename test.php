<?php
declare(strict_types = 1);
?>
<html lang="">
<h2>
    函数
</h2>
<ol>
    <li><h3>用户自定义函数</h3>
        <p>(1)任何有效的 PHP 代码都有可能出现在函数内部，甚至包括其它函数和类定义。 <br></p>
        (2)函数无需在调用之前被定义，除非是下面两个例子中函数是有条件被定义时。<br>
        1、当一个函数是有条件被定义时，必须在调用函数之前定义。<br>
        2、函数中的函数<br>
        (3)PHP中所有的函数和类都有全局作用域，可以定义在一个函数之内而在之外调用，反之亦然。<br>
        (4)PHP 不支持函数重载，也不可能取消定义或者重定义已声明的函数。
        <div>
			<?php
				$makefoo = true;
				bar();
				if ($makefoo) {
					function foo()
					{
						echo "I don't exist until program execution reaches me." . "<br>";

					}
				}
				if ($makefoo) {
					foo();
				}

				function bar()
				{
					echo "I exist immediately upon program start.<br>";
				}


				function foo1()
				{
					function bar1()
					{
						echo "I don't exist until foo() is called.<br>";
					}
				}

				foo1();
				bar1();

				function foo2()
				{
					echo "This is foo2()";
//					foo2();
				}

				//				foo2();
			?>
        </div>
    </li>
    <li><h3>函数的参数</h3>
        <ul>
            <li>
				<h4>向函数传递数组</h4>
                <div>
					<?php

						function takes_array($input){
							echo "$input[0] + $input[1] =",$input[0]+$input[1];
							echo "<br>";
						}

						takes_array(['1',2,3]);
					?>
				</div>
            </li>
            <li>
				<h4>通过引用传递参数</h4>
				<p>
					(1)默认情况下，函数参数通过值传递（因而即使在函数内部改变参数的值，它并不会改变函数外部的值）。如果希望允许函数修改它的参数值，必须通过引用传递参数。<br>
					(2)如果想要函数的一个参数总是通过引用传递，可以在函数定义中该参数的前面加上符号 &：<br>

				</p>
                <div>
					<?php
						function add_some_extra(&$string){
							$string .= "and something extra";
						}

						$str = "This is a string, ";
						add_some_extra($str);
						echo $str;
					?>
				</div>
            </li>
			<li>
				<h4>
					默认参数
				</h4>
				<p>
					(1)函数可以定义 C++ 风格的标量参数默认值<br>
					(2)PHP 还允许使用数组 array 和特殊类型 NULL 作为默认参数<br>
					(3)默认值必须是常量表达式，不能是诸如变量，类成员，或者函数调用等。<br>
					(4)注意当使用默认参数时，任何默认参数必须放在任何非默认参数的右侧；否则，函数将不会按照预期的情况工作<br>
					(5)传引用的参数也可以有默认值。<br>
				</p>
				<div>
					<?php
						function makecoffee($type = "cappuccino"){
							return "Making a cup of $type.<br>";
						}
						echo makecoffee();
						echo makecoffee(null);
						echo makecoffee("espresso");

						const TYPES = ["cappuccino"];
						function makecoffee1($types=TYPES,$coffeemaker=null){
							$device = is_null($coffeemaker) ? "hands" : $coffeemaker;
							return "Making a cup of ".join(",",$types)." with $device.<br>";

						}
						echo "<br>";
						echo makecoffee1();
						echo makecoffee1(["cappuccino","lavazza"],"teapot");

//						echo "I'am a ".join(",",["person","cat","dog"])." heyhey<br>";


						function update_data(&$data=3){
							$data += 10;
						}

						$test_data = 4;
						update_data($test_data);
						echo $test_data;
					?>
				</div>
			</li>
            <li>
				<h4>
					类型声明
				</h4>
				<p>
					(1)类型声明允许函数在调用时要求参数为特定类型。 如果给出的值类型不对，那么将会产生一个错误<br>
					(2)为了指定一个类型声明，类型应该加到参数名前。这个声明可以通过将参数的默认值设为NULL来实现允许传递NULL。 <br>
				</p>
                <div>
					<?php
						function test(bool $param){
							var_dump($param);
							echo $param;
							echo get_class((object)($param));
                        }
						test(false);
						echo "<br>";
//Basic class type declaration
						//继承了父类的子类也为父类对象类型，反之不成立
						class C{}
						class D extends C{}
						class E{}
						function f(C $c){
							echo get_class($c)."<br>";
						}
						f(new C);
						f(new D);
//						f(new E);
						//Basic interface type declaration
//实现了接口的类，其对象类型也为接口类型
						interface I {public function f();}
						class G implements I{public function f(){}}
						class H{}

						function f1(I $i){
							echo get_class($i);
						}

						f1(new G);
//						f1(new H);

						class J{}
						function f2(J $j=null){
							var_dump($j);

						}
						f2(new J);
						f2(null);
					?>
				</div>
            </li>
            <li>
				<h4>严格类型</h4>
				<p>
					(1)默认情况下，如果能做到的话，PHP将会强迫错误类型的值转为函数期望的标量类型<br>
					(2)可以基于每一个文件开启严格模式。在严格模式中，只有一个与类型声明完全相符的变量才会被接受，否则将会抛出一个TypeError。 唯一的一个例外是可以将integer传给一个期望float的函数。<br>
					(3)使用 declare 语句和strict_types 声明来启用严格模式： <br>
				</p>
                <div>
					<?php
						function sum3(float $a,float $b){
							return $a + $b;
						}

						var_dump(sum3(1,2.6));
						echo "======================================";
						function sum(int $a,int $b){
							return $a + $b;
						}
//						var_dump(sum(1,2));
//						var_dump(sum(1.2,2.5));
						try {
							var_dump(sum(1,2));
							var_dump(sum(1.2,2.5));
						}catch(TypeError $e){
							echo "Error: ".$e->getMessage();
						}
					?>
				</div>
            </li>
        </ul>
	<li>
		<h4>可变数量的参数列表</h4>
		<p>
			(1) argument lists may include the ... token to denote that the function accepts a variable number of arguments. The arguments will be passed into the given variable as an array; <br>
			(2)You can also use ... when calling functions to unpack an array or Traversable variable or literal into the argument lis<br>
<!--			(3)使用 declare 语句和strict_types 声明来启用严格模式： <br>-->
		</p>
		<div>
			<?php
				function sum1(...$numbers){
					$acc = 0;
					foreach($numbers as $number){
						$acc += $number;
					}
					return $acc;
				}

				echo sum1(1,2,'3','4.6',5.3);

//				function echoparams(...$params){
//					foreach($params as $param){
//						echo $param.'<br>';
//					}
//				}
//				echoparams('haha',1,2,3.6,'4.7')
				function add (int $a,int $b){
					return $a + $b;
				}
				echo "<br>";
				echo add(...[1,2])."<br>";
				$arr = [3,4];
				echo add(...$arr);

				function total_intervals($unid, DateInterval ...$intervals) {
					$time = 0;
					foreach ($intervals as $interval) {
						$time += $interval->$unid;
					}
					return $time;
				}

				$a = new DateInterval('P1D');
				$b = new DateInterval('P2D');
				echo "<br>".total_intervals('d', $a, $b).' days';
			?>
		</div>
	</li>
    </li>


    <li>
		<h3>
			返回值
		</h3>
		<p>
			(1)可以返回包括数组和对象的任意类型。返回语句会立即中止函数的运行，并且将控制权交回调用该函数的代码行<br>
			(2)函数不能返回多个值，但可以通过返回一个数组来得到类似的效果。 <br>
			(3)从函数返回一个引用，必须在函数声明和指派返回值给一个变量时都使用引用运算符 &<br>
			(4)PHP 7 增加了对返回值类型声明的支持。 就如 类型声明一样, 返回值类型声明将指定该函数返回值的类型<br>
			(5)严格类型 也会影响返回值类型声明。在默认的弱模式中，如果返回值与返回值的类型不一致，则会被强制转换为返回值声明的类型。在强模式中，返回值的类型必须正确，否则将会抛出一个TypeError异常.<br>
			(6)当覆盖一个父类方法时，子类方法的返回值类型声明必须与父类一致。如果父类方法没有定义返回类型，那么子类方法可以定义任意的返回值类型声明。<br>

		</p>
		<div>
			<?php
				function sum4(float $a,int $b):float{
					return $a+$b;
				}
				var_dump(sum4(1.2,5));


				function &returns_reference()
				{
					$someref='132';
					return $someref;
				}

				$newref =& returns_reference();
				echo $newref;

				function sum5(int $a,float $b): float{
					return $a + $b;
				}
				var_dump(sum5(1,2));
				var_dump(sum5(1,2.5));

				class K{}
				function getK():K{
					return new K;
				}
				var_dump(getK());
			?>
		</div>
    </li>
    <li>
		<h3>
			可变函数
		</h3>
		<p>
			(1)PHP 支持可变函数的概念。这意味着如果一个变量名后有圆括号，PHP 将寻找与变量的值同名的函数，并且尝试执行它。可变函数可以用来实现包括回调函数，函数表在内的一些用途。<br>
			(2)可变函数不能用于例如 echo，print，unset()，isset()，empty()，include，require 以及类似的语言结构。需要使用自己的包装函数来将这些结构用作可变函数。 <br>
			(3)当调用静态方法时，函数调用要比静态属性优先： <br>
		</p>
		<div>
			<?php
                function fooo(){
                    echo "In fooo() <BR>";
                }

                function barr($arg=''){
                    echo "In barr;argument was '$arg'.<BR>";
                }

                function echoit($string){
                    echo $string."<BR>";
                }

                $func = "fooo";
                $func();

                $func = "barr";
                $func('test');

                $func = "echoit";
                $func('test');

                class MyClass{
                    static $variable = "static property";
                    static function Variable(){
                        echo "Method Variable called.";
                    }

                }


                echo MyClass::$variable;
                $variable = "Variable";
                MyClass::$variable();

                $aa = 1;
                $bb = 2;

                function summ(){
                    global $aa,$bb;
                    $bb = $aa + $bb;
                    return $bb;
                }
                echo summ();
//                function summm(){
//                    return $bb;
//                }

                function testt(){
                    static $aaa = 0;
                    echo "<BR>";
                    echo $aaa;
                    $aaa ++;
                }
                for($i=1;$i<=10;$i++){
                    testt();
                }

                testt();


                class MyTest{
					static function test1(){
						echo "test1";
					}
					static function test2(){
						echo "test2";
					}
					function test3(){
						echo "test3";
					}
                }


                $func =[new MyTest,'test3'];
                $func();
//                $func();
//                $func();
			?>
		</div>
    </li>
    <li>
		<h3>
			匿名函数/闭包函数
		</h3>
		<p>
			(1)临时创建一个没有指定名称的函数。最经常用作回调函数（callback）参数的值。当然，也有其它应用的情况。br>
			(2)匿名函数目前是通过 Closure 类来实现的。 <br>
			(3)闭包函数也可以作为变量的值来使用<br>
			(4)闭包可以从父作用域中继承变量。 任何此类变量都应该用 use 语言结构传递进去<BR>
		</p>
		<div>
			<?php
                echo "<br>";
                echo preg_replace_callback('~-([a-z])~',function($match){
                    return strtoupper($match[1]);
                },'hello-world');

                $greet = function($name){
                    printf("Hello %s \r\n",$name);
                };

                $greet('World');
                $greet("PHP");
                var_dump($greet);

                $message = "hello";
//                $example = function(){
//                    var_dump($message);
//                };

				$example = function () use ($message){
					var_dump($message);
				};
				echo $example();

				$message = "world";
				echo $example();

				$message = "hello";

				$example = function () use (&$message){
					$message = "20";
					var_dump($message);
				};
				echo $example();
				echo $message;

				$example = function ($arg) use ($message) {
					var_dump($arg . ' ' . $message);
				};
				$example("hello");
			?>
		</div>
    </li>
</ol>

</html>