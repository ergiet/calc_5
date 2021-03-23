<?php
/* Smarty version 3.1.39, created on 2021-03-23 01:53:46
  from 'C:\xampp\htdocs\kred\app\calc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60593c1a30cce7_36193487',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '436ae3251ff8f8c0907a6f6db689290857610992' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kred\\app\\calc.tpl',
      1 => 1616460823,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60593c1a30cce7_36193487 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7703254060593c1a30ae17_71728491', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_7703254060593c1a30ae17_71728491 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_7703254060593c1a30ae17_71728491',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


		<table>
				<tr>
					<th>Jesteś zalogowany jako: <?php echo '<?php ';?>
echo "$role"<?php echo '?>';?>
</th>
					<td><a href="logout.php"><button>Wyloguj</button></a></td>
				</tr>
		<form action="app/calc_proc.php" method="post">
				<tr>
					<th>Kwota (złotych)</th>
					<td><input id="id_kwota" type="text" name="kwota"/></td>
				</tr>
				<tr>
					<th>Okres (lata)</th>
					<td><input id="id_okres" type="text" name="okres"/></td>
				</tr>
				<tr>
					<th>Oprocentowanie (procent)</th>
					<td><input id="id_oproc" type="text" name="oproc"/></td>
				</tr>
				<tr>
					<th>Oblicz</th>
					<td><input type="submit" value="Klik" /></td>
				</tr>
		</table>
		</form>

<?php
}
}
/* {/block 'content'} */
}
