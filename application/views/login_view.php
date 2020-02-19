<!doctype html>
<html lang="pt-br">

    <head>
        <title>Login</title>
    </head>

    <body>

        <?php echo form_open('login'); ?>
            <div align="center">
                <div>
                    <h5>Username</h5>
                    <?php echo form_error('matricula'); ?>
                    <input type="text" name="matricula" value="<?php echo set_value('matricula'); ?>"/>    
                </div>

                <div>
                    <h5>Password</h5>
                    <?php echo form_error('senha'); ?>
                    <input type="password" name="senha" value="<?php echo set_value('senha'); ?>" />
                </div>

                <div>
                    <input type="submit" value="Submit" />
                </div>
            </div>
        <?php echo form_close() ?>

    </body>

</html>