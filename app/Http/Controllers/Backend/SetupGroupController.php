<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;

class SetupGroupController extends Controller
{
    public function LihatGroup(){
    	$dataGroup = Group::all();
    	return view('backend.setup.group.lihat_group', compact('dataGroup'));
    }



    public function SimpanGroup(Request $request){
        
        $validatedData = $request->validate([
	    		'nama' => 'required|unique:group,nama',
	    		
	    	]);

	    	$data = new Group();
	    	$data->nama = $request->nama;
	    	$data->save();

	    	$notification = array(
	    		'message' => 'Group Berhasil ditambahkan',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('lihat.group')->with($notification);
	    }

	    public function EditGroup($id){
	        $editGroup = Kelas::find($id);
	        return view('backend.setup.group.edit_group', compact('editGroup'));
    	}

    	public function UpdateGroup(Request $request, $id){
	       $data = Group::find($id);
     
     		$validatedData = $request->validate([
    		'nama' => 'required|unique:group,nama,'.$data->id
    		
    		]);

    	
	    	$data->nama = $request->nama;
	    	$data->save();

	    	$notification = array(
	    		'message' => 'Group Berhasil diperbaharui',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('lihat.kelas')->with($notification);
    	}

	    public function HapusGroup($id){
	    	$agama = Group::find($id);
	    	$agama->delete();

	    	$notification = array(
	    		'message' => 'Group Berhasil dihapus',
	    		'alert-type' => 'info'
	    	);

	    	return redirect()->route('lihat.group')->with($notification);

	    }
}
