<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>FRAMEWORK MVC BEWEB</h1>

<table>
    <?php foreach($users as $user): ?>
    <tr>
        <td><?= $user->getUsername(); ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php var_dump($_SERVER) ?>
</body>
</html>
