<html>
<h3>String字符串</h3>
<ul>

    <li>
        <h3>
            1.语法 [new]
        </h3>
        <p>
            一个字符串可以用四种方式表达：
            （1）单引号
            （2）双引号
            （3）heredoc 语法结构
            （4）nowdoc 语法结构
        </p>

    </li>

    <li>
        <h4>
            1.单引号
        </h4>
        <p>
            定义一个字符串的最简单的方法是用单引号把它包围起来（字符 '）。
            要表达一个单引号自身，需在它的前面加个反斜线（\）来转义。
            <br>要表达一个反斜线自身，则用两个反斜线（\\）。
            <br>其它任何方式的反斜线都会被当成反斜线本身：也就是说如果想使用其它转义序列例如 \r 或者 \n，并不代表任何特殊含义，就单纯是这两个字符本身。
        </p>
        <div>
			<?php
				echo 'this is a simple string.';
				echo "<br>";

				echo 'You can also have embedded newlines
					in strings this way like this.';
				echo "<br>";
				echo 'Arnold once said:"I\'ll be back."';
				echo "<br>";
				echo "You deleted C:\\*.*?";
				echo "<br>";
				echo 'This will not exand :\n a newline.';
				echo "<br>";
				echo 'Variables do not $expand $either.';
			?>
        </div>
    </li>

    <li>
        <h4>
            2.双引号
        </h4>
        <p>
            如果字符串是包围在双引号（"）中， PHP 将对一些特殊的字符进行解析：
            <br>和单引号字符串一样，转义任何其它字符都会导致反斜线被显示出来。只能转义本身和反斜线
            <br>用双引号定义的字符串最重要的特征是变量会被解析
        </p>
        <div>
			<?php
				echo "this is a simple string.";
				echo "<br>";

				echo "You can also have embedded newlines
					in strings this way like this.";
				echo "<br>";
				echo "Arnold once said:\"I'll be back.\"";
				echo "<br>";
				echo "You deleted C:\\*.*?";
				echo "<br>";
				echo "This will not exand :\n a newline.";
				echo "<br>";
				//					echo "Variables do not $expand $either.";
			?>
        </div>
    </li>

    <li>
        <h4>
            3.Heredoc

        </h4>
        <p>
            第三种表达字符串的方法是用 heredoc 句法结构：<<<。在该运算符之后要提供一个标识符，然后换行。接下来是字符串 string 本身，最后要用前面定义的标识符作为结束标志。
            <br></br>结束时所引用的标识符必须在该行的第一列，而且，标识符的命名也要像其它标签一样遵守 PHP 的规则：只能包含字母、数字和下划线，并且必须以字母和下划线作为开头。
            <br>Heredoc 结构就象是没有使用双引号的双引号字符串，这就是说在 heredoc 结构中单引号不用被转义，但是上文中列出的转义序列还可以使用。变量将被替换，但在 heredoc
            结构中含有复杂的变量时要格外小心。
        </p>
        <div>
			<?php
				$str = <<<EOD
Example of string
spanning multiple lines
using heredoc syntax.
EOD;

				class Foo
				{
					var $foo;
					var $bar;

					function afoo()
					{
						$this->foo = "Foo";
						$this->bar = array("Bar1", "Bar2", "Bar3");

					}
				}

				$foo = new Foo();
				$name = "MyName";

				echo <<<EOF
My name is "$name".I am printing some $foo->foo.
Now, I am printing some {$foo->bar[1]}.
This should print a capital 'A'\x41
EOF;
				echo "<br>";
				echo "My name is \"$name\".I am printing some $foo->foo.
Now, I am printing some {$foo->bar[1]}.
This should print a capital 'A'\x41";
				var_dump(array(<<<EOP
foobar!
EOP
				));


				function another_f()
				{
					static $bar = <<<LABEL
Nothing in here...
LABEL;
				}

				class another_c
				{
					const CON = <<<FOOBAR
Constant example
FOOBAR;

					public $baz = <<<FOOBAR
Property example
FOOBAR;
				}

				$another = new another_c();
				echo $another->baz;
				//echo $another->CON;


			?>
        </div>
    </li>

    <li>
        <h4>
            4.nowdoc
        </h4>
        <p>
            (1)就象 heredoc 结构类似于双引号字符串，Nowdoc 结构是类似于单引号字符串的。Nowdoc 结构很象 heredoc 结构，但是 nowdoc 中不进行解析操作。这种结构很适合用于嵌入 PHP
            代码或其它大段文本而无需对其中的特殊字符进行转义。
            <br>(2)一个 nowdoc 结构也用和 heredocs 结构一样的标记 <<<， 但是跟在后面的标识符要用单引号括起来，即 <<<'EOT'。Heredoc 结构的所有规则也同样适用于 nowdoc
            结构，尤其是结束标识符的规则

        </p>
        <div>
			<?php
				$str = <<<'EOF'
Example of string
spanning multiple lines
using nowdoc syntax.
EOF;

				class foo2
				{
					public $foo;
					public $bar;

					function foo()
					{
						$this->foo = 'Foo';
						$this->bar = array('Bar1', 'Bar2', 'Bar3');
					}
				}

				$foo = new foo2();
				$name = 'MyName';
				echo <<<'EOT'
My name is "$name". I am printing some $foo->foo.
Now, I am printing some {$foo->bar[1]}.
This should not print a capital 'A': \x41.
This is \.and this is 'and".And this is Dollar $.
EOT;
				echo "<br>";

				echo <<<EOT
My name is "$name". I am printing some $foo->foo.
Now, I am printing some {$foo->bar[1]}.
This should not print a capital 'A': \x41
This is \.and this is 'and".And this is Dollar $.
EOT;
				echo "<br>";
				echo 'My name is "$name". I am printing some $foo->foo.
Now, I am printing some {$foo->bar[1]}.
This should not print a capital \'A\': \x41
                This is \.and this is \'and".
                And this is Dollar $.';
				echo "<br>";
	echo "My name is \"$name\". I am printing some $foo->foo.
Now, I am printing some {$foo->bar[1]}.
This should not print a capital 'A': \x41
This is \.and this is 'and\".
And this is Dollar $."



			?>
        </div>
    </li>
</ul>
    <ol>
        <h4>字符串定义【总结】：</h4>
        <li>
            单引号：不进行解析（特殊字符\n,\t...、变量），输出本身和反斜线需要转义
        </li>
        <li>
            双引号：进行解析（特殊字符\n,\t...、变量），输出本身和反斜线需要转义
        </li>

        <li>
            nowdoc：不进行解析（特殊字符\n,\t...、变量），输出原生文本，引号和反斜线不需要转义
        </li>
        <li>
            heredocs:进行解析（特殊字符\n,\t...、变量），输出解析文本，引号和反斜线不需要转义
        </li>
    </ol>
<ul>
    <li>
        <h3>
            2.变量解析
        </h3>
        <p>
            字符串使用双引号或heredo时，变量会被解析。
            <br>
            (1)简单语法：当 PHP 解析器遇到一个美元符号（$）时，它会和其它很多解析器一样，去组合尽量多的标识以形成一个合法的变量名。可以用花括号来明确变量名的界线。
            <br>
            (2)复杂语法：任何具有 string 表达的标量变量，数组单元或对象属性都可使用此语法。只需简单地像在 string 以外的地方那样写出表达式，然后用花括号 { 和 } 把它括起来即可。由于 { 无法被转义，只有 $ 紧挨着 { 时才会被识别。可以用 {\$ 来表达 {$。
        </p>
        <div>
            <?php
                //简单语法：
//                1.普通变量
                $juice = "apple";
                echo "He drank some $juice juice.".PHP_EOL;
//                echo "He drank some juice make of $juices."
//                2.数组元素
                $juices = array("apple","orange","koolaid1"=>"purple");

                echo "He drank some $juices[0] juice.".PHP_EOL;
				echo "He drank some $juices[0] juice.".PHP_EOL;
				echo "He drank some juice make of $juices[0]s.".PHP_EOL;
				echo "He drank some $juices[koolaid1] juice.".PHP_EOL;

//				3.对象
                class people{
                    public $john = "John Smith";
                    public $jane = "Jane Smith";
                    public $robert = "Robert Paulsen";
                    public $smith = "Smith";
                }

                $people = new people();
                echo "<br>";
                echo "$people->john drank some $juices[0] juice.".PHP_EOL;
                echo "$people->john then said hello to $people->jane.".PHP_EOL;
                echo "$people->john's wife greeted $people->robert.".PHP_EOL;
				echo"<br>";
//                echo "$people->robert greeted the two $people->smiths.";

                //复杂语法（花括号）
                error_reporting(E_ALL);
                $greet = "fantastic";
                echo "This is { $greet}";echo"<br>";
                echo "This is {$greet}";echo"<br>";
                echo "This is ${greet}";echo"<br>";
                echo "<u>只有通过花括号语法才能正确解析带引号的键名</u><br>";
                echo "He drank some {$juices['koolaid1']} juice.";echo"<br>";
                echo "This works: {$juices['koolaid1'][2]}";echo"<br>";
                echo "This works:" ,$juices['koolaid1'][2];echo"<br>";
				echo "This is the value of the var named $greet: {$greet}";

				function getName(){
				    return "CYH";
                }
                echo "<br>";
                echo "This is the return value of getName():".getName();
				echo "<br>";
				echo "this is $ {\$";
				echo "<br>";

				class foo3{
				    var $bar = "I am bar.";

                }
                $foo3 = new foo3();
				$bar = 'bar';
				$baz = array("foo",'ta'=>"bar",'th'=>"baz","quux");
				echo "{$foo3->{$bar}}\n";
				echo "<br>";
				echo "{$foo3->{$baz['ta']}}"

            ?>

			<?php
				// 显示所有错误
				error_reporting(E_ALL);

				class beers {
					const softdrink = 'rootbeer';
					public static $ale = 'ipa';
				}
				$beer = new beers();
				$rootbeer = 'A & W';
				$ipa = 'Alexander Keith\'s';

				// 有效，输出： I'd like an A & W
				echo "I'd like an {${beers::softdrink}}\n";

				// 也有效，输出： I'd like an Alexander Keith's
				echo "I'd like an {${beers::$ale}}\n";
    echo "<br>";

			?>
        </div>
    </li>
    <li>
        <h3>
            3.存取和修改字符
        </h3>
        <p>
            string 中的字符可以通过一个从 0 开始的下标，用类似 array 结构中的方括号包含对应的数字来访问和修改，比如 $str[42]。可以把 string 当成字符组成的 array。函数 substr() 和 substr_replace() 可用于操作多于一个字符的情况。
            <br><u><b>自 PHP 5.4 起字符串下标必须为整数或可转换为整数的字符串，否则会发出警告。</b></u>
        </p>
        <div>
			<?php
                $str = "This is a test.";
                $first = $str[0];
                echo "{$first}","<br>";
                $third = $str[2];
				echo "{$third}","<br>";
                $last = $str[strlen($str)-1];
				echo "{$last}","<br>";
				$str[strlen($str)-1] = '9';
				$last = $str[strlen($str)-1];
				echo "{$last}","<br>";

				$str = "abc";
                    //报错
//				echo count($str);

				var_dump($str[1]);
				var_dump(isset($str[1]));

//				var_dump($str['1']);
//				var_dump(isset($str['1']));

//				var_dump($str['1.0']);
//				var_dump(isset($str['1.0']));
//
//				var_dump($str['x']);
//				var_dump(isset($str['x']));
//
//				var_dump($str['1x']);
//				var_dump(isset($str['1x']));
			?>
        </div>
    </li>
    <li>
        <h3>
            4.转换为字符串
        </h3>

            <ol>
                <li>一个值可以通过在其前面加上 (string) 或用 strval() 函数来转变成字符串。在一个需要字符串的表达式中，会自动转换为 string。比如在使用函数 echo 或 print 时，或在一个变量和一个 string 进行比较时，就会发生这种转换</li>
                <li>一个布尔值 boolean 的 TRUE 被转换成 string 的 "1"。Boolean 的 FALSE 被转换成 ""（空字符串）。这种转换可以在 boolean 和 string 之间相互进行。</li>
                <li>一个整数 integer 或浮点数 float 被转换为数字的字面样式的 string（包括 float 中的指数部分）。使用指数计数法的浮点数（4.1E+6）也可转换。 </li>
                <li>数组 array 总是转换成字符串 "Array"，因此，echo 和 print 无法显示出该数组的内容。要显示某个单元，可以用 echo $arr['foo'] 这种结构</li>
                <li>在 PHP 4 中对象 object 总是被转换成字符串 "Object"，如果为了调试原因需要打印出对象的值，请继续阅读下文。为了得到对象的类的名称，可以用 get_class() 函数。自 PHP 5 起，适当时可以用 __toString 方法。</li>
                <li>NULL 总是被转变成空字符串。 </li>
                <li>资源 resource 总会被转变成 "Resource id #1" 这种结构的字符串，其中的 1 是 PHP 在运行时分配给该 resource 的唯一值。不要依赖此结构，可能会有变更。要得到一个 resource 的类型，可以用函数 get_resource_type()。</li>
                <li>如上面所说的，直接把 array，object 或 resource 转换成 string 不会得到除了其类型之外的任何有用信息。可以使用函数 print_r() 和 var_dump() 列出这些类型的内容。 </li>




            </ol>

        <div>
			<?php

			?>
        </div>
    </li>
    <li>
        <h3>
            4.字符串转换为数值
        </h3>

        <p>
            (1)如果该字符串没有包含 '.'，'e' 或 'E' 并且其数字值在整型的范围之内（由 PHP_INT_MAX 所定义），该字符串将被当成 integer 来取值。其它所有情况下都被作为 float 来取值。
            <br>(2)该字符串的开始部分决定了它的值。如果该字符串以合法的数值开始，则使用该数值。否则其值为 0（零）。合法数值由可选的正负号，后面跟着一个或多个数字（可能有小数点），再跟着可选的指数部分。指数部分由 'e' 或 'E' 后面跟着一个或多个数字构成。
            <br>(3)不要想像在 C 语言中的那样，通过将一个字符转换成整数以得到其代码。使用函数 ord() 和 chr() 实现 ASCII 码和字符间的转换。
        </p>

        <div>
			<?php
//				$foo = 1 + "10.5";                // $foo is float (11.5)
//				$foo = 1 + "-1.3e3";              // $foo is float (-1299)
//				$foo = 1 + "bob-1.3e3";           // $foo is integer (1)
//				$foo = 1 + "bob3";                // $foo is integer (1)
//				$foo = 1 + "10 Small Pigs";       // $foo is integer (11)
//				$foo = 4 + "10.2 Little Piggies"; // $foo is float (14.2)
//				$foo = "10.0 pigs " + 1;          // $foo is float (11)
//				$foo = "10.0 pigs " + 1.0;        // $foo is float (11)

                $str = '1';
                echo ord($str),"<br>";

                echo chr(50);
			?>
        </div>
    </li>
    <li>
        <h3>字符串类型详解</h3>
        <ol>
            <li>
                PHP 中的 string 的实现方式是一个由字节组成的数组再加上一个整数指明缓冲区长度。并无如何将字节转换成字符的信息，由程序员来决定。字符串由什么值来组成并无限制；特别的，其值为 0（“NUL bytes”）的字节可以处于字符串任何位置（不过有几个函数，在本手册中被称为非“二进制安全”的，也许会把 NUL 字节之后的数据全都忽略）
            </li>
            <li>
                字符串类型的此特性解释了为什么 PHP 中没有单独的“byte”类型 - 已经用字符串来代替了。返回非文本值的函数 - 例如从网络套接字读取的任意数据 - 仍会返回字符串。
            </li>
            <li>
                由于 PHP 并不特别指明字符串的编码，那字符串到底是怎样编码的呢？例如字符串 "á" 到底是等于 "\xE1"（ISO-8859-1），"\xC3\xA1"（UTF-8，C form），"\x61\xCC\x81"（UTF-8，D form）还是任何其它可能的表达呢？答案是字符串会被按照该脚本文件相同的编码方式来编码。因此如果一个脚本的编码是 ISO-8859-1，则其中的字符串也会被编码为 ISO-8859-1，以此类推。不过这并不适用于激活了 Zend Multibyte 时；此时脚本可以是以任何方式编码的（明确指定或被自动检测）然后被转换为某种内部编码，然后字符串将被用此方式编码。注意脚本的编码有一些约束（如果激活了 Zend Multibyte 则是其内部编码）- 这意味着此编码应该是 ASCII 的兼容超集，例如 UTF-8 或 ISO-8859-1。不过要注意，依赖状态的编码其中相同的字节值可以用于首字母和非首字母而转换状态，这可能会造成问题
            </li>
        </ol>
    </li>
</ul>


</html>