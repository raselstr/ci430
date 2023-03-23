<?php 

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table            = 'pengguna';
    protected $primaryKey       = 'usernama';
    protected $returnType       = 'object';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['usernama','password','name'];
}

?>