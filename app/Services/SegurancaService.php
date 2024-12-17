<?php 
namespace App\Services;

class SegurancaService {
    
    public function criandoHashSenha($senhaUsuario)
    {
        $md5 = 'P0rtf0l10Felipe@kel' . $senhaUsuario . '01_CriandoUmaHashMaisForte_10';
        return md5($md5);
    }
}