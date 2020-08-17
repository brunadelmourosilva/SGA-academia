 <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript">
            //jQuery(function ($) {
                //MÁSCARA PARA OS CAMPOS CPF
            //    $("#field-telefone").mask("999.999.999-99");
           // });
        </script>        
        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
    </head>
    <body>
        <div>
			<a href='<?php echo site_url('Objetivo/index') ?>'>Objetivo</a> |
			<a href='<?php echo site_url('Planos/index') ?>'>Planos</a> |
			<a href='<?php echo site_url('Categoria/index') ?>'>Categoria</a>|
            <a href='<?php echo site_url('Exercicio/index') ?>'>Exercicio</a> | 
			<a href='<?php echo site_url('Mensalidade/index') ?>'>Mensalidade</a> |
			<a href='<?php echo site_url('Cliente/index') ?>'>Cliente</a>|
			<a href='<?php echo site_url('Treino/index') ?>'>Treino</a>|
			<a href='<?php echo site_url('Frequencia/index') ?>'>Frequência</a> |		 
				
			
		



        </div>
        <div style='height:20px;'></div>  
        <div style="padding: 10px">
            <?php echo $output; ?>
        </div>
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
    </body>
</html>

			
