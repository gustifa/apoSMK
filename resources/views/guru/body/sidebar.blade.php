
@php
    $id = Auth::user()->id;
    $agentId = App\Models\User::find($id);
    $status = $agentId->status;
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
								
				<li class="menu-label">Data</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-scan"></i>
						</div>
						<div class="menu-title">Data Siswa</div>
					</a>
					<ul>
						<li> <a href="{{route('lihat.anggota.rombel.walas')}}"><i class="bx bx-right-arrow-alt"></i>Lihat Data</a>
						</li>
						

					</ul>
				</li>
				<li class="menu-label">Presensi Sholat</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-scan"></i>
						</div>
						<div class="menu-title">Presensi Sholat</div>
					</a>
					<ul>
						<li> <a href="{{route('lihat.presensi.sholat')}}"><i class="bx bx-right-arrow-alt"></i>Lihat Presensi</a>
						</li>
						<li> <a href="{{route('tambah.presensi.sholat')}}"><i class="bx bx-right-arrow-alt"></i> Presensi Manual</a>
						<li> <a href="app-chat-box.html"><i class="bx bx-right-arrow-alt"></i> Presensi Barcode</a>
						</li>
						<li> <a href="app-file-manager.html"><i class="bx bx-right-arrow-alt"></i>Export</a>
						</li>
						<li> <a href="app-contact-list.html"><i class="bx bx-right-arrow-alt"></i>Cetak Presensi</a>
						</li>

					</ul>
				</li>

				<li class="menu-label">Presensi PBM</li>

				<li>
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
				</li>
@endif

			</ul>