<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require "./autoload.php";
        
        $serie = new Serie (['id'=>null,
                            'titre'=>'Alien',
                            'asdfasdfcreateur'=>'Monsieur Z',
                            'genre'=>'SCIFI']);
        
        
        var_dump ($serie);
        
            
        
        
        ?>
    </body>
</html>
