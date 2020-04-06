<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title?></title>
    <meta name="description" content="<?php echo $description?>">
    
    <?php foreach ($styles as $style):?>
    <link rel="stylesheet" type="text/css" href="<?php echo URL::base();?>public/bootstrap/css/<?php echo $style ?>.css">
    <?php endforeach;?>
    
</head>
<body>
  <nav class="navbar navbar-dark bg-primary fixed-top">
  	<a class="navbar-brand" href="/">Little Blog</a>
  </nav>
  <div class="container" style="margin-top: 60px">

    <?php echo $content ?>

  </div>  
</body>
</html>