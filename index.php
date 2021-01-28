<?php
require 'config.php';
require 'dao/UsuarioDAOMySQL.php';

$usuarioDAO = new UsuarioDAOMySQL($pdo);
$lista = $usuarioDAO->findAll();
?>

<a href="adicionar.php">ADICIONAR USUÁRIO</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>    

    <?php foreach($lista as $usuario): ?>
        
        <tr>
            <td><?php echo $usuario->getId();?> </td>
            <td><?php echo $usuario->getNome();?></td>
            <td><?php echo $usuario->getEmail();?></td>
            <td>
                <a href="editar.php?id=<?php echo $usuario->getId();?>">[ Editar ] </a>
                <a href="excluir.php?id=<?php echo $usuario->getId();?>" onclick="return confirm('Deseja realmente excluir esse registro ?')">[ Excluir ] </a>
            </td>
        </tr>


    <?php endforeach; ?>       
        
   
</table>    