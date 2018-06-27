<label>Coordinación:</label>
<?php foreach ($items as $item){ ?>
  <div class="checkbox">
    <label>
      <input id="dependencia[]" name="dependencia[]" type="checkbox" data-id_dependencia="<?= $item["ID"] ?>" value="<?= $item["ID"] ?>"><?= $item["TEXT"] ?>
    </label>
  </div>
<?php } ?>
