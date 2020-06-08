<?php namespace App\Controllers;

use App\Helpers\Error;
use App\Models\Thana;
use App\Models\TSO;
use App\Models\TSOMapping;

class Mapping extends BaseController
{
	public function index()
	{
		$model = new TSOMapping();
		
		$data = [
			'tsos' => $model->select('tbl_tso_thana_map.id, tbl_tso_thana_map.is_active, tso.name as tso_name, thana.Name as thana_name')
				->join('tbl_tso_list as tso', 'tbl_tso_thana_map.tso_id = tso.id')
				->join('tbl_thana as thana', 'tbl_tso_thana_map.thana_id = thana.id')
				->orderby('tbl_tso_thana_map.id', 'desc')->paginate(20),
			'pager' => $model->pager,
		];
		
		return view('tso-map/list', $data);
	}
	
	public function create()
	{
		if ($this->request->getMethod() == "post") return $this->saveItem($this->request);
		
		$tsoModel = new TSO();
		$thanaModel = new Thana();
		
		$data = [
			'tsos' => $tsoModel->orderBy('name')->get()->getResult(),
			'thanas' => $thanaModel->orderBy('name')->get()->getResult(),
		];
		
		return view('tso-map/form', $data);
	}
	
	public function edit($id)
	{
		if (!is_numeric($id)) return Error::notFound($this->response, "Numeric ID Field Required");
		
		if ($this->request->getMethod() == "post") return $this->saveItem($this->request, $id);
		
		$tsoMappingModel = new TSOMapping();
		$map = $tsoMappingModel->find($id);
		$tsoModel = new TSO();
		$thanaModel = new Thana();
		
		$data = [
			'map' => $map,
			'tsos' => $tsoModel->orderBy('name')->get()->getResult(),
			'thanas' => $thanaModel->orderBy('name')->get()->getResult(),
		];
		
		return view('tso-map/form', $data);
	}
	
	protected function saveItem($request, $id = null)
	{
//		helper(['form']);
		
		$validate = $this->validate([
			'tso_id' => ['label' => 'TSO Id', 'rules' => 'required|numeric'],
			'thana_id' => ['label' => 'Thana Id', 'rules' => 'required|numeric'],
		]);
		
		if (!$validate) {
			session()->setFlashdata('error', "Something went wrong!");
			return redirect()->to('/mapping');
		}
		
		$data = [
			'tso_id' => $request->getVar('tso_id'),
			'thana_id' => $request->getVar('thana_id'),
			'is_active' => $request->getVar('is_active') === "on" ? 1 : 0,
		];
		
		if (!empty($id)) {
			$data['id'] = $id;
		}
		
		$tsoMappingModel = new TSOMapping();
		$tsoMappingModel->save($data);
		
		session()->setFlashdata('success', (!empty($id) ? "Updated" : "Inserted") . " Successfully");
		return redirect()->to("/mapping");
	}
}