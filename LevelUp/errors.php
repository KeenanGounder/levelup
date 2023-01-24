<?php  if (count($errors) > 0) : ?>
  <div style="transform:translate(0,20px); ;" class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p style="color:red; ;"><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>