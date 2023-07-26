<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengumuman;

class SettingPengumumanController extends Controller
{
    public function lihatPengumuman(){
        $pengumuman = Pengumuman::all();
        return view('backend.setting.pengumuman.lihat_pengumuman', compact('pengumuman'));
    }
}
