<?php namespace App\Models;

use CodeIgniter\Model;

class TSO extends Model
{
	protected $table      = 'tbl_tso_list';
	protected $primaryKey = 'id';
	
//	protected $returnType     = 'array';
//	protected $useSoftDeletes = true;
	
	protected $allowedFields = ['name', 'mobile_no', 'is_active', 'hr_id'];
	
	protected $useTimestamps = false;
//	protected $createdField  = 'created_at';
//	protected $updatedField  = 'updated_at';
//	protected $deletedField  = 'deleted_at';
	
//	protected $validationRules    = [];
//	protected $validationMessages = [];
//	protected $skipValidation     = false;
}