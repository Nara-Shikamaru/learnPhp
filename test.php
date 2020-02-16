<html>
<h2>
    PHP中的echo和print语句
</h2>
<!--echo 和 print 区别:-->
<!--	echo - 可以输出一个或多个字符串-->
<!--	print - 只允许输出一个字符串，返回值总为 1-->
<!--提示：echo 输出的速度比 print 快， echo 没有返回值，print有返回值1。-->

1.echo：
    echo 是一个语言结构，使用的时候可以不用加括号，也可以加上括号： echo 或 echo()。
<?php
    //显示字符串
	echo "<h4>PHP很有趣！</h4>";
	echo "Hello world";
	echo PHP_EOL;
	echo "我要学PHP！";
	echo  PHP_EOL;
	echo "这是一个","字符串，","使用了","多个参数。";
    //显示变量
    $txt1 = "学习PHP";
	$txt2 = "Shikamaru.com";
	$cars = array("Volvo","BMW","Toyota");

	echo $txt1;
	echo PHP_EOL;
	echo "在$txt2 学习PHP";
	//变量名称和字符要用空格分隔
    echo "<br>";
    echo "我的车品牌是：$cars[0]";
	echo ("我的车品牌是：{$cars[0]}");
	echo "<br>";

?>
2.print
    print 同样是一个语言结构，可以使用括号，也可以不使用括号： print 或 print()。
<?php
    print $txt1;
	echo "<br>";
    print ($txt2);
	echo "<br>";
//    print $txt1,$txt2;
    echo $txt1,$txt2;
	echo "<br>";
	print ("我车的品牌是 ]{$cars[0]}");
?>

</html>