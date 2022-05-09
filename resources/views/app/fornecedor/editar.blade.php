<?php

use App\Models\Fornecedor;

echo 'Chegamos na view editar.blade.php';
    echo '<br><br>';
    $fornecedor = Fornecedor::find($id);
    dd($fornecedor);
