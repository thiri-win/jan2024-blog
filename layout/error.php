<?php if(isset($error)) : ?>
<ul>
    <?php foreach($error as $err) : ?>
    <li class='list-unstyled text-danger'><?php echo $err; ?></li>
    <?php endforeach ?>
</ul>
<?php endif ?>