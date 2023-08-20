
@php
    $id = Auth::user()->id;
    $agentId = App\Models\User::find($id);
    $status = $agentId->status;
    $user = Auth::user()->guru_id;
    $walas = App\Models\Rombongan_belajar::where('guru_id', $user )->get();
    $implode_rombel = $walas->implode('rombongan_belajar_id');

    	$date_now = date('d-m-Y H:i');
        $time = strtotime(date('H:i'));
        $waktuZuhurMulai = (App\Models\WaktuSholat::where('nama', 'Zhuhur')->select('waktu_mulai', 'waktu_selesai')->get())->implode('waktu_mulai');
        $waktuZuhurSelesai = (App\Models\WaktuSholat::where('nama', 'Zhuhur')->select('waktu_mulai', 'waktu_selesai')->get())->implode('waktu_selesai');
        $waktuAsharMulai = (App\Models\WaktuSholat::where('nama', 'Ashar')->select('waktu_mulai', 'waktu_selesai')->get())->implode('waktu_mulai');
        $waktuAsharSelesai = (App\Models\WaktuSholat::where('nama', 'Ashar')->select('waktu_mulai', 'waktu_selesai')->get())->implode('waktu_selesai');
        $selectedTimeZuhur = strtotime(date($waktuZuhurMulai));
        $endTimeZuhur = strtotime(date($waktuZuhurSelesai));
        $selectedTimeAshar = strtotime(date($waktuAsharMulai));
        $endTimeAshar = strtotime(date($waktuAsharSelesai));


        $dataRombongan_belajar_all = App\Models\Rombongan_belajar::all();
        $walas_id = App\Models\Rombongan_belajar::where('guru_id', $user)->get();
        $kelas =  $walas_id->implode('kelas_id');
        $jurusan =  $walas_id->implode('jurusan_id');
        $group =  $walas_id->implode('group_id');
        if($kelas || $jurusan || $group  == !NULL){
            $kelas_nama = (App\Models\Kelas::where('id', $kelas)->get())->implode('nama');
            $jurusan_kode = (App\Models\Jurusan::where('id', $jurusan)->get())->implode('kode');
            $group_nama = (App\Models\Group::where('id', $group)->get())->implode('nama');
        }else{
            $kelas_nama = App\Models\Kelas::all();
            $jurusan_kode = App\Models\Jurusan::all();
            $group_nama = App\Models\Group::all();
        }
@endphp
<ul class="metismenu" id="menu">
				<li>
					<a href="{{route('guru.dashboard')}}">
						<div class="parent-icon"><i class='bx bx-home'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
 @if($status === 'active')
 				<li>
					<a href="{{route('lihat.presensi.sholat')}}">
						<div class="parent-icon"><i class="bx bx-cog"></i>
						</div>
						<div class="menu-title">Realtime Presensi</div>
					</a>
				</li>
 				
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-cog"></i>
						</div>
						<div class="menu-title">Jadwal Pelajaran</div>
					</a>
					<ul>
						</li>
						<li> <a href="app-to-do.html"><i class="bx bx-right-arrow-alt"></i>Lihat</a>
						<li> <a href="app-to-do.html"><i class="bx bx-right-arrow-alt"></i>Buat Baru</a>
						</li>
						
					</ul>
				</li>
				

				
								
	@if( $implode_rombel)		
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-scan"></i>
						</div>
						<div class="menu-title">Rombongan Belajar </div>
					</a>
					<ul>
						<li> <a href="{{route('lihat.anggota.rombel.walas')}}"><i class="bx bx-right-arrow-alt"></i>{{$kelas_nama}} {{$jurusan_kode}}{{$group_nama}}</a>
						</li>
						

					</ul>
				</li>
	
				

				<li class="menu-label">Presensi</li>
				@if($time >= $selectedTimeZuhur && $time <= $endTimeZuhur || $time >= $selectedTimeAshar && $time <= $endTimeAshar)
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-scan"></i>
						</div>
						<div class="menu-title">Presensi Sholat</div>
					</a>
					<ul>
						
						<li> <a href="{{route('tambah.presensi.sholat')}}"><i class="bx bx-right-arrow-alt"></i> Presensi Manual</a>
						<li> <a href="app-chat-box.html"><i class="bx bx-right-arrow-alt"></i> Presensi Barcode</a>
						</li>
						<li> <a href="app-file-manager.html"><i class="bx bx-right-arrow-alt"></i>Export</a>
						</li>
						<li> <a href="app-contact-list.html"><i class="bx bx-right-arrow-alt"></i>Cetak Presensi</a>
						</li>

					</ul>
				</li>
				@endif
				<!-- <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-barcode-reader"></i>
						</div>
						<div class="menu-title">Presensi PBM</div>
					</a>
					<ul>
						</li>
						<li> <a href="app-to-do.html"><i class="bx bx-right-arrow-alt"></i>Rekap</a>
						</li>
						<li> <a href="app-invoice.html"><i class="bx bx-right-arrow-alt"></i>Ambil Presensi</a>
						</li>
						<li> <a href="app-fullcalender.html"><i class="bx bx-right-arrow-alt"></i>Cetak</a>
						</li>
					</ul>
				</li> -->


				<!-- <li class="menu-label">Bobot Pelanggaran</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-scan"></i>
						</div>
						<div class="menu-title">Rekap Pelanggaran</div>
					</a>
					<ul>
						<li> <a href="{{route('lihat.bobot.pelanggaran.siswa')}}"><i class="bx bx-right-arrow-alt"></i>Lihat Rekap</a>
						</li>
						<li> <a href="{{route('tambah.bobot.pelanggaran.siswa')}}"><i class="bx bx-right-arrow-alt"></i> Tambah</a>
						
						</li>

					</ul>
				</li> -->

			
				

				<li class="menu-label">Laporan Presensi</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-barcode-reader"></i>
						</div>
						<div class="menu-title">Presensi Sholat</div>
					</a>
					<ul>
						</li>
						<li> <a href="{{route('laporan.presensi.walas')}}"><i class="bx bx-right-arrow-alt"></i>Rekap</a>
						</li>
						<li> <a href="app-invoice.html"><i class="bx bx-right-arrow-alt"></i>Ambil Presensi</a>
						</li>
						<li> <a href="app-fullcalender.html"><i class="bx bx-right-arrow-alt"></i>Cetak</a>
						</li>
					</ul>
				</li>
@endif

@endif

			</ul>