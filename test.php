<html>
<h3>PHP EOF使用说明</h3>
<!--	PHP EOF(heredoc)是一种在命令行shell（如sh、csh、ksh、bash、PowerShell和zsh）和程序语言（像Perl、PHP、Python和Ruby）里定义一个字符串的方法。-->
<!--	使用概述：-->
<!--	1. 必须后接分号，否则编译通不过。-->
<!--	2. EOF 可以用任意其它字符代替，只需保证结束标识与开始标识一致。-->
<!--	3. 结束标识必须顶格独自占一行(即必须从行首开始，前后不能衔接任何空白和字符)。-->
<!--	4. 开始标识可以不带引号或带单双引号，不带引号与带双引号效果一致，解释内嵌的变量和转义符号，带单引号则不解释内嵌的变量和转义符号。-->
<!--	5. 当内容需要内嵌引号（单引号或双引号）时，不需要加转义符，本身对单双引号转义，此处相当与q和qq的用法。-->

<div>
	<?php
		echo <<<EOF
			<h1>我的第一个标题</h1>
			<h2>我的第二个标题</h2>
EOF;
		//结束需要独立一行且前后不能有空格
		echo <<<EOL
			<h3>我的第三个标题</h3>
			<h4>我的第四个标题</h4>
EOL;

	?>
</div>
<!--	注意：-->
<!--	1.以 <<<EOF 开始标记开始，以 EOF 结束标记结束，结束标记必须顶头写，不能有缩进和空格，且在结束标记末尾要有分号 。-->
<!--	2.开始标记和结束标记相同，比如常用大写的 EOT、EOD、EOF 来表示，但是不只限于那几个(也可以用：JSON、HTML等)，只要保证开始标记和结束标记不在正文中出现即可。-->
<!--	3.位于开始标记和结束标记之间的变量可以被正常解析，但是函数则不可以。在 heredoc 中，变量不需要用连接符 . 或 , 来拼接，如下：-->
<div>
	<?php
		$name = "cyh";
		$a = <<<EOF
				"abc"$name
				"123"
EOF;
		echo $a;
		$b = <<<"EOF"
			$name<br><a>html格式会被解析</a><br>双引号和html格式以外的其他内容都不会被解析
				"双引号外所有被排列好的格式都会被保留",
				"但是双引号内会保留转义符的转义效果，比如table:\t和换行：\n下一行
EOF;
		echo $b;
	?>
</div>
</html>