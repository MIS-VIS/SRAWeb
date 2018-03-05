<?php
 
namespace App\Repositories\DV;
 
use Illuminate\Http\Request;

interface DVInterface{


	public function fetchAllPaginate($n);

	public function search($key);

	public function whereA();

	public function filters($array = []);

	public function dateBetween($from, $to);	

	 public function getByUser_SNF(Request $request);

	 public function getByIncomings_SNF(Request $request);

	 public function updateDvNo(Request $request);

	 public function create(Request $request);

	 public function show($slug);

	 public function update(Request $request,$slug);

	 public function delete($slug);


}