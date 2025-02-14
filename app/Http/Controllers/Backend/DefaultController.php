<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\Category;
use App\Models\SubCategory;
use Auth;
use DB;

class DefaultController extends Controller
{
	public function PageNotFound()
	{
		return view('backend.unauthorize');
	}

	public function getSubcat(Request $request){
        $allData = SubCategory::where('category_id',$request->category_id)->get();
        return response()->json($allData);
    }

	public function getDivision(Request $request){
		$region_id = $request->region_id;
		if(count(session()->get('userareaaccess.sdivisions')) != 0){
			$allDivision = RegionAreaDetail::with(['regional_division'])->whereIn('division_id',session()->get('userareaaccess.sdivisions'))->where('region_id',$region_id)->where('status','1')->groupBy('division_id')->get();
		}else{
			$allDivision = RegionAreaDetail::with(['regional_division'])->where('region_id',$region_id)->where('status','1')->groupBy('division_id')->get();
		}
		return response()->json($allDivision);
	}

	public function getgetDistricByRegion(Request $request){
		$region_id = $request->region_id;
		$division_id = $request->division_id;

		if(count(session()->get('userareaaccess.sdistricts')) != 0){
			$allDistrict = RegionAreaDetail::with(['regional_district'])->whereIn('district_id',session()->get('userareaaccess.sdistricts'))->where([['division_id',$division_id],['region_id',$region_id]])->where('status','1')->groupBy('district_id')->get();
		}else{
			$allDistrict = RegionAreaDetail::with(['regional_district'])->where([['division_id',$division_id],['region_id',$region_id]])->where('status','1')->groupBy('district_id')->get();
		}

		// dd($allDistrict);
		return response()->json($allDistrict);
	}

	public function getDistrict(Request $request){
		$division_id = $request->division_id;
		$allDistrict = District::where('division_id',$division_id)->get();
		$allCityCorporation = CityCorporation::where('division_id',$division_id)->get();
		return response()->json([$allDistrict,$allCityCorporation]);
	}

	public function getUpazila(Request $request){
		$district_id = $request->district_id;
		$allUpazila = Upazila::where('district_id',$district_id)->get();
		$allPourosova = Pourosova::where('district_id',$district_id)->get();
		return response()->json([$allUpazila,$allPourosova]);
	}

	public function getDistrictMaster(Request $request){
		$division_id = $request->division_id;
		$allDistrict = District::where('division_id',$division_id)->get();
		// $allCityCorporation = CityCorporation::where('division_id',$division_id)->get();
		return response()->json($allDistrict);
	}

	public function getUpazilaMaster(Request $request){
		$district_id = $request->district_id;
		$allUpazila = Upazila::where('district_id',$district_id)->get();
		// $allPourosova = Pourosova::where('district_id',$district_id)->get();
		return response()->json($allUpazila);
	}

	public function getUnion(Request $request){
		$upazila_id = $request->upazila_id;
		$allUnion = Union::where('upazila_id',$upazila_id)->get();
		return response()->json($allUnion);
	}

	public function getViolenceSubCategory(Request $request){
		$violence_category_id = $request->violence_category_id;
		$allSubCategory = ViolenceSubCategory::where('violence_category_id',$violence_category_id)->get();
		return response()->json($allSubCategory);
	}

	public function getViolenceName(Request $request){
		$violence_sub_category_id = $request->violence_sub_category_id;
		$allViolenceName = ViolenceName::where('violence_sub_category_id',$violence_sub_category_id)->get();
		return response()->json($allViolenceName);
	}

	public function getOrganizationName(Request $request){
		$organization_type_id = $request->organization_type_id;
		$allOrganizationType = OrganizationName::where('support_organization_id',$organization_type_id)->get();
		return response()->json($allOrganizationType);
	}

	public function getSupportName(Request $request){
		$survivor_support_organization_id = $request->survivor_support_organization_id;
		$allSupportName = SurvivorFinalSupport::where('survivor_support_organization_id',$survivor_support_organization_id)->get();
		return response()->json($allSupportName);
	}

	public function getEmployees()
	{
		$data = BracEmployee::all();

		foreach ($data as $key => $d) {
			$sub = substr($d->LevelDate,0,10);
			$subbb = substr($d->TransferDate,0,10);
			$subbbb = substr($d->StatusDate,0,10);
			$update = BracEmployee::find($d->id);
			$update->LevelDate = $sub;
			$update->TransferDate = $subbb;
			$update->StatusDate = $subbbb;
			$update->save();
		}
	}

	public function getEmployeeApi(Request $request)
	{
        // $string = file_get_contents("http://api.brac.net/v1/staffs?Key=c20f2758-9cd2-4a8d-9473-8fb89b9a677e&q=ProgramID=18&fields=PIN,StaffName,DesignationName,EmailID,MobileNo");
		$i = "";
		for ($i=100000; $i <= 105000; $i++) {
			// $string[] = json_decode(file_get_contents("http://api.brac.net/v1/staffs/".$i."/?Key=7f50671f-09ce-4b68-ac75-5861b1fd22da&fields=StaffPIN,StaffName,DesignationName,EmailID,MobileNo,Age,Sex,DateOfBirth"), true);
			$string[] = json_decode(file_get_contents("http://api.brac.net/v1/staffs/".$i."/?Key=7f50671f-09ce-4b68-ac75-5861b1fd22da"), true);
		}

		$js_array = [];
		foreach ($string as $key => $s) {
			$js_array = array_merge($js_array, (array) $s);
		}

		$data = '';
		foreach ($js_array as $key => $value) {
			$data = new BracEmployee();
			$data->StaffPIN 		= $value['StaffPIN'];
			$data->StaffName 				= @$value['StaffName'];
			$data->DateOfBirth 				= substr(@$value['DateOfBirth'], 0,10);
			$data->Age 						= @$value['Age'];
			$data->Sex 						= @$value['Sex'];
			$data->MobileNo 				= @$value['MobileNo'];
			$data->EmailID 					= @$value['EmailID'];
			$data->Religion 				= @$value['Religion'];
			$data->EducationID 				= @$value['EducationID'];
			$data->LastEducation 			= @$value['LastEducation'];
			$data->EducationGroupID 		= @$value['EducationGroupID'];
			$data->EducationGroupName 		= @$value['EducationGroupName'];
			$data->JoiningDate 				= substr(@$value['JoiningDate'], 0,10);
			$data->DesignationID 			= @$value['DesignationID'];
			$data->DesignationName 			= @$value['DesignationName'];
			$data->DesignationGroupID 		= @$value['DesignationGroupID'];
			$data->DesignationGroupName 	= @$value['DesignationGroupName'];
			$data->LastPromotionDate 		= @$value['LastPromotionDate'];
			$data->JobLevel 				= @$value['JobLevel'];
			$data->LevelDate 				= substr(@$value['LevelDate'], 0,10);
			$data->TransferDate 			= substr(@$value['TransferDate'], 0,10);
			$data->JobBase 					= @$value['JobBase'];
			$data->Status 					= @$value['Status'];
			$data->StatusDate 				= substr(@$value['StatusDate'], 0,10);
			$data->BloodGroup 				= @$value['BloodGroup'];
			$data->ProgramID 				= @$value['ProgramID'];
			$data->HR_ProgramID 			= @$value['HR_ProgramID'];
			$data->ProgramName 				= @$value['ProgramName'];
			$data->ProjectID 				= @$value['ProjectID'];
			$data->HR_ProjectID 			= @$value['HR_ProjectID'];
			$data->ProjectName 				= @$value['ProjectName'];
			$data->DivisionID 				= @$value['DivisionID'];
			$data->HR_DivisionID 			= @$value['HR_DivisionID'];
			$data->DivisionName 			= @$value['DivisionName'];
			$data->DistrictID 				= @$value['DistrictID'];
			$data->HR_DistrictID 			= @$value['HR_DistrictID'];
			$data->DistrictName 			= @$value['DistrictName'];
			$data->UpazilaID 				= @$value['UpazilaID'];
			$data->HR_UpazilaID 			= @$value['HR_UpazilaID'];
			$data->UpazilaName 				= @$value['UpazilaName'];
			$data->BranchID 				= @$value['BranchID'];
			$data->HR_BranchID 				= @$value['HR_BranchID'];
			$data->BranchName 				= @$value['BranchName'];
			$data->RegionID 				= @$value['RegionID'];
			$data->RegionName 				= @$value['RegionName'];
			$data->save();
		}
	}

}
