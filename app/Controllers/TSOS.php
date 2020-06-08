<?php namespace App\Controllers;

use App\Helpers\Error;
use App\Models\TSO;

class TSOS extends BaseController
{
	public function index()
	{
		$tsoModel = new TSO();
		$data = [
			'tsos' => $tsoModel->orderby('id', 'DESC')->paginate(20),
			'pager' => $tsoModel->pager,
		];
		return view('tso/list', $data);
	}
	
	public function create()
	{
		if ($this->request->getMethod() == "get") return view('tso/form');
		
		return $this->saveItem($this->request);
	}
	
	public function edit($id)
	{
		if (!is_numeric($id)) return Error::notFound($this->response, "Numeric ID Field Required");
		
		if ($this->request->getMethod() == "post") {
			return $this->saveItem($this->request, $id);
		}
		
		$tsoModel = new TSO();
		$tso = $tsoModel->find($id);
		$tso['edit'] = true;
		return view('tso/form', compact('tso'));
	}
	
	protected function saveItem($request, $id = null)
	{
//		helper(['form']);
		$validate = $this->validate([
			'name' => ['label' => 'Name', 'rules' => 'required'],
			'mobile_no' => ['label' => 'Phone Number', 'rules' => 'required|exact_length[11]|regex_match[/01[1-9]/]'],
		]);
		
		if (!$validate) {
			$data['tso'] = array_merge([], $request->fetchGlobal('post'));
			if (!empty($id)) {
				$data['tso']['id'] = $id;
				$data['tso']['edit'] = true;
			}
			empty($request->fetchGlobal('post')['is_active']) ? $data['tso']['is_active'] = 0 : $data['tso']['is_active'] = $request->fetchGlobal('post')['is_active'] === "on" ? 1 : 0;
			
			return view('tso/form', $data);
		}
		
		$data = [
			'name' => $request->getVar('name', FILTER_SANITIZE_STRING),
			'mobile_no' => $request->getVar('mobile_no'),
			'is_active' => $request->getVar('is_active') === "on" ? 1 : 0,
			'hr_id' => $request->getVar('hr_id', FILTER_SANITIZE_STRING),
		];
		
		if (!empty($id)) {
			$data['id'] = $id;
		}
		
		$tsoModel = new TSO();
		$tsoModel->save($data);
		
		session()->setFlashdata('success', (!empty($id) ? "Updated" : "Inserted") . " Successfully");
		return redirect()->to("/tsos");
	}
}
