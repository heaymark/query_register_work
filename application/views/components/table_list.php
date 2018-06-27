<table class="table table-bordered">
    <thead>
        <tr>
          <?php foreach ($cabezera as $cab){ ?>
          <th><?php echo $cab;?></th>
        <?php }?>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $row){ ?>
      <tr>
        <?php  foreach ($fields as $field) { ?>
            <td><?php echo $row[$field];?></td>
        <?php } ?>
      </tr>
      <?php }?>
    </tbody>
</table>
