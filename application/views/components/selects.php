<?php
if(isset($todos)  && $todos == 1){
?>
<option value = "0">TODOS</option>
<?php
}else{
?>
<option value = "">Elija una Opción</option>
	<option value = "0">Todos</option>
<?php
}
?>
<?php foreach ($items as $item){ ?>
<option value="<?= $item["ID"] ?>"><?= $item["TEXT"] ?></option>
<?php } ?>
