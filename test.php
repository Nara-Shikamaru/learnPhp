<html>
<h2>PHP数组</h2>
<div>

    <ul>
        <li>
            <div><p>1.定义数组<br>
                    （1）array()
                    <br>(2)[]</p>
				<?php
					$list = array("students" => array("master" => "tom", "john", "bob"), "teacher" => "nicloson");
					echo $list['teacher'];
					echo $list['students']['master'], $list["students"][1];
					$students = [
						"master" => "tom",
						"john",
						"bob"
					];
					echo $students['master'];
					echo $students[1];

					$array = array("students" => [
						"master" => "tom",
						"john",
						"bob",
					],
						"teacher" => "nicolson");
					echo "<br>";
					echo $array['students']['master'];
					echo $array["teacher"];

					$arr = [
						"students" => array(
							"master" => "tom",
							"bob",
							"john"
						),
						"teacher" => "nicolson"
					];
					echo "<br>";
					echo $arr["students"]['master'];
					echo $arr["teacher"]
				?></div>
        </li>
        <li>
            <div><p>2.[]语法新建、修改<br>
                    $arr[key] = value;
                    $arr[] = value;
                    // key 可以是 integer 或 string
                    // value 可以是任意类型的值</p>
				<?php
					$arr = [];
					$arr[1] = 5;
					echo $arr[1];
					$arr = array(
						5 => 1, 12 => 2
					);
					$arr[] = 56;

					echo "---", $arr[13], "---";
					$arr['x'] = 42;
					echo $arr['x'];
					$arr['x'] = 1001;
					echo $arr['x'];

					unset($arr[1]);
					echo $arr[1];
					unset($arr);
					var_dump($arr);
				?>
                <p>如果给出方括号但没有指定键名，则取当前最大整数索引值，新的键名将是该值加上 1（但是最小为 0）。如果当前还没有整数索引，则键名将为 0。
                    <br>注意这里所使用的最大整数键名不一定当前就在数组中。它只要在上次数组重新生成索引后曾经存在过就行了。以下面的例子来说明： </p>
				<?php
					//创建一个数组
					$array = array(1, 2, 3, 4, 5);
					print_r($array);
					//删除其中的所有元素
					foreach ($array as $i => $value) {
						unset($array[$i]);
					}
					print_r($array);

					//添加一个item（新的键名是4，而不是0）
					$array[] = 6;
					print_r($array);

					//重新索引
					$array = array_values($array);
					$array[] = 7;
					print_r($array);

				?>
            </div>

        </li>
        <li>
            <div><p>3.数组元素的删除
                    <br>unset(key)</p></div>
        </li>
        <li>
            <div><p>4.数组的删除
                    <br>unset(arr)</p></div>
        </li>
        <li>
            <div><p>5.操作数组的函数</p>
                <ol>
                    <li>
                        <h5>
                            (1)array_values() 删除后重建索引
                        </h5>
                        <div>
                            <?php
                                $a = array(1=>"one",2=>"two","number"=>"ten",3=>"three");
                                print_r($a);
                                echo"<br>";
                                unset($a[1]);
								print_r($a);
								echo"<br>";
                                $b = array_values($a);
                                print_r($b);
                            ?>
                        </div>
                    </li>
                    <li>
                        <h5>
                            (2)count() 获取数组个数
                        </h5>
                        <div>
							<?php
								$a = array(1=>"one",2=>"two","number"=>"ten",3=>"three");
								echo count($a);
							?>
                        </div>
                    </li>
                    <li>
                        <h5>
                            (3)sort()数组排序
                        </h5>
                        <div>
							<?php
								$a = array(1=>"one",2=>"two","number"=>"ten",3=>"three");
								sort($a);
								print_r($a);
							?>
                        </div>
                    </li>
                </ol>
            </div>
        </li>
        <li>
            <div><p>6.转换为数组</p>
                (1)对于任意 integer，float，string，boolean 和 resource 类型，如果将一个值转换为数组，将得到一个仅有一个元素的数组，其下标为 0，该元素即为此标量的值。换句话说，(array)$scalarValue 与 array($scalarValue) 完全一样。
                <br>(2)如果一个 object 类型转换为 array，则结果为一个数组，其单元为该对象的属性。键名将为成员变量名，不过有几点例外：整数属性不可访问；私有变量前会加上类名作前缀；保护变量前会加上一个 '*' 做前缀。这些前缀的前后都各有一个 NULL 字符。这会导致一些不可预知的行为：
                (3)null转为array会得到一个空数组
            </div>

            <?php
                $number = 10;
                $text = "hello";
                $number_arr = (array)$number;
                $text_arr = (array)$text;

                print_r($number_arr);
                print_r($text_arr);

                class A{
                    private $A;
                }
                class B extends A{
                    private $A;
                    public $AA;
            }

            var_dump((array) new B());
            ?>
        </li>
        <li>
            <p>7.数组比较</p>
            <br>array_diff()和数组运算符

        </li>
        <li>
            <p>8.示例</p>
			<?php
                $a = array("color"=>"red",
                    "taste"=>"sweet",
                    "shape"=>"round",
                    "name"=>"apple",
                    4);
                $b = array('a','b','c');
				// . . .is completely equivalent with this:
				$a = array();
				$a['color'] = 'red';
				$a['taste'] = 'sweet';
				$a['shape'] = 'round';
				$a['name']  = 'apple';
				$a[]        = 4;        // key will be 0

				$b = array();
				$b[] = 'a';
				$b[] = 'b';
				$b[] = 'c';
				// After the above code is executed, $a will be the array
				// array('color' => 'red', 'taste' => 'sweet', 'shape' => 'round',
				// 'name' => 'apple', 0 => 4), and $b will be the array
				// array(0 => 'a', 1 => 'b', 2 => 'c'), or simply array('a', 'b', 'c').
			?>

            <?php
                echo "------------------";
                $items = array('red','blue','yellow',3=>"green");
                $count = count($items);
                echo $count;
                for($i=0;$i<$count;$i++){
                    echo $items[$i];
                }
                echo "<br>";
                foreach ($items as $item){
                    $item = strtoupper($item);
                    echo $item;
                }
				echo "<br>";
                foreach ($items as $key=>$item){
                    $items[$key] = strtoupper($item);
                    echo $items[$key];
                }
				echo "<br>";

                sort($items);
                print_r($items);
            ?>
        </li>
    </ul>
</div>
</html>
