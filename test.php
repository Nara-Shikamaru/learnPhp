<html>

	<h2>PHP类型比较</h2>

	松散比较：== 只比较值，不比较类型
	严格比较：=== 除了比较值，也比较类型
	<div>
		<?php
			if(42=="42"){
				echo "1、值相等";

			}
			echo PHP_EOL;
			if(42==="42") {
				echo "2、类型相等";
			}
			else{
				echo "3、不相等";
			}
			?>
	</div>

<div>
	<?php
		echo "0 == false";
		var_dump(0 == false);
		echo "0 === false";
		var_dump(0 === false);
		echo PHP_EOL;

		echo "0==null";
		var_dump(0==null);
		echo "0===null";
		var_dump(0===null);
		echo PHP_EOL;

		echo "false==null";
		var_dump(false==null);
		echo "false===null";
		var_dump(false===null);
		echo PHP_EOL;

		echo '"0"==false';
		var_dump("0"==false);
		echo '"0" === false';
		var_dump("0" === false);
		echo PHP_EOL;

		echo '"0" == null: ';
		var_dump("0" == null);
		echo '"0" === null: ';
		var_dump("0" === null);
		echo PHP_EOL;

		echo '"" == false: ';
		var_dump("" == false);
		echo '"" === false: ';
		var_dump("" === false);
		echo PHP_EOL;
		
		echo '"" == null: ';
		var_dump("" == null);
		echo '"" === null: ';
		var_dump("" === null);
	?>
</div>
</html>