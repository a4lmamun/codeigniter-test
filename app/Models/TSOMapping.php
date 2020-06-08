<?php namespace App\Models;

use CodeIgniter\Model;

class TSOMapping extends Model
{
	protected $table = 'tbl_tso_thana_map';
	protected $primaryKey = 'id';

//	protected $returnType     = 'array';
//	protected $useSoftDeletes = true;
	
	protected $allowedFields = ['thana_id', 'tso_id', 'is_active'];
	
	protected $useTimestamps = false;
//	protected $createdField  = 'created_at';
//	protected $updatedField  = 'updated_at';
//	protected $deletedField  = 'deleted_at';

//	protected $validationRules    = [];
//	protected $validationMessages = [];
//	protected $skipValidation     = false;
}