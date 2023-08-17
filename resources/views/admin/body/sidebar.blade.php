<ul class="metismenu" id="menu">
	<li>
					<a href="{{route('admin.dashboard')}}">
						<div class="parent-icon"><i class='bx bx-home'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				

				<li class="menu-label">Master Data</li>
				<!-- awal -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-data"></i>
						</div>
						<div class="menu-title">Setup Data</div>
					</a>
					<ul>
						</li>
						<li> <a href="{{route('lihat.tahunajaran')}}"><i class="bx bx-right-arrow-alt"></i>Tahun Ajaran</a>
						</li>
						
					</ul>

					<ul>
						<li> <a href="{{route('sekolah')}}"><i class="bx bx-right-arrow-alt"></i>Sekolah</a>
						</li>
					</ul>

					<ul>
						</li>
						<li> <a href="{{route('lihat.jadwal.pelajaran')}}"><i class="bx bx-right-arrow-alt"></i>Jadwal Pelajaran</a>
						</li>
						
					</ul>

					<ul>
						</li>
						<li> <a href="{{route('lihat.waktu.sholat')}}"><i class="bx bx-right-arrow-alt"></i>Waktu Sholat</a>
						</li>
						
					</ul>

					<ul>
						</li>
						<li> <a href="{{route('lihat.bobot.pelanggaran')}}"><i class="bx bx-right-arrow-alt"></i>Bobot Pelanggaran</a>
						</li>
						
					</ul>
					
					
					<ul>
						</li>
						<li> <a href="{{route('lihat.agama')}}"><i class="bx bx-right-arrow-alt"></i>Agama</a>
						</li>
						
					</ul>

					<ul>
						<li> <a href="{{route('lihat.jurusan')}}"><i class="bx bx-right-arrow-alt"></i>Jurusan</a>
						</li>
						
	
					</ul>
					<ul>
						<li> <a href="{{route('lihat.kelas')}}"><i class="bx bx-right-arrow-alt"></i>Kelas</a>
						</li>
						
	
					</ul>

					<ul>
						<li> <a href="{{route('lihat.group')}}"><i class="bx bx-right-arrow-alt"></i>Group</a>
						</li>
						
	
					</ul>

					

					
				</li>
				<!-- Akhir -->

				<!-- awal -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-cog"></i>
						</div>
						<div class="menu-title">Setting Data</div>
					</a>
					<ul>
						<li> <a href="{{route('lihat.guru')}}"><i class="bx bx-right-arrow-alt"></i>PTK</a>
						</li>
						
	
					</ul>
					<ul>
						<li> <a href="{{route('lihat.rombel')}}"><i class="bx bx-right-arrow-alt"></i>Rombongan Belajar</a>
						</li>
						
	
					</ul>

					<ul>
						<li> <a href="{{route('lihat.peserta_didik')}}"><i class="bx bx-right-arrow-alt"></i>Peserta Didik</a>
						</li>
						
	
					</ul>

					

					<ul>
						<li> <a href="{{route('lihat.anggota.rombel')}}"><i class="bx bx-right-arrow-alt"></i>Anggota Rombel</a>
						</li>
						
	
					</ul>

					<ul>
						<li> <a href="{{route('lihat.pengumuman')}}"><i class="bx bx-right-arrow-alt"></i>Pengumuman</a>
						</li>
						
	
					</ul>
					

					
				</li>
				<!-- Akhir -->

				<!-- awal -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-user"></i>
						</div>
						<div class="menu-title">Hak Akses</div>
					</a>
					<ul>
						<li> <a href="{{route('lihat.user')}}"><i class="bx bx-right-arrow-alt"></i>RFID</a>
						</li>
						
	
					</ul>
					<ul>
						<li> <a href="{{route('barcode.peserta_didik')}}"><i class="bx bx-right-arrow-alt"></i>Barcode Siswa</a>
						</li>
						
	
					</ul>

					<ul>
						</li>
						<li> <a href="{{route('lihat.user.guru')}}"><i class="bx bx-right-arrow-alt"></i>User Guru</a>
						</li>
						
					</ul>

					<ul>
						</li>
						<li> <a href="{{route('lihat.user.siswa')}}"><i class="bx bx-right-arrow-alt"></i>User Siswa</a>
						</li>
						
					</ul>

					
				</li>
				<!-- Akhir -->

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-export"></i>
						</div>
						<div class="menu-title">Laporan</div>
					</a>
					<ul>
						<li> <a href="{{route('laporan.all')}}"><i class="bx bx-right-arrow-alt"></i>Semua ROmbel</a>
						</li>
					</ul>
					<ul>
						<li> <a href="{{route('export.userrfid')}}"><i class="bx bx-right-arrow-alt"></i>Export UserRFID</a>
						
					</ul>

					<ul>
						<li> <a href="{{route('export.guru')}}"><i class="bx bx-right-arrow-alt"></i>Export Guru</a>
						
					</ul>


					<!-- <ul>
						<li> <a href=""><i class="bx bx-right-arrow-alt"></i>Export Guru</a>
						
					</ul> -->
				</li>



				

				

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-export"></i>
						</div>
						<div class="menu-title">Export</div>
					</a>
					<ul>
						<li> <a href="{{route('export.user')}}"><i class="bx bx-right-arrow-alt"></i>Export User</a>
						</li>
					</ul>
					<ul>
						<li> <a href="{{route('export.userrfid')}}"><i class="bx bx-right-arrow-alt"></i>Export UserRFID</a>
						
					</ul>

					<ul>
						<li> <a href="{{route('export.guru')}}"><i class="bx bx-right-arrow-alt"></i>Export Guru</a>
						
					</ul>


					<!-- <ul>
						<li> <a href=""><i class="bx bx-right-arrow-alt"></i>Export Guru</a>
						
					</ul> -->
				</li>


				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-export"></i>
						</div>
						<div class="menu-title">Presensi</div>
					</a>
					<ul>
						<li> <a href="{{route('lihat.barcode.sholat')}}"><i class="bx bx-right-arrow-alt"></i>Scan Barcode</a>
						</li>
					</ul>
					<!-- <ul>
						<li> <a href="{{route('export.userrfid')}}"><i class="bx bx-right-arrow-alt"></i>Export UserRFID</a>
						
					</ul>

					<ul>
						<li> <a href="{{route('export.guru')}}"><i class="bx bx-right-arrow-alt"></i>Export Guru</a>
						
					</ul> -->


					<!-- <ul>
						<li> <a href=""><i class="bx bx-right-arrow-alt"></i>Export Guru</a>
						
					</ul> -->
				</li>
				

				
			</ul>