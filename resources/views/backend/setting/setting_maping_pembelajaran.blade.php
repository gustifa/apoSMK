@extends('admin.admin_master')
@section('admin')
@section('title')
   Setting Maping Pembelajaran
@endsection
   <!--start page wrapper -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="page-wrapper">
   <div class="page-content">
   
                  <div class="row">
               <div class="col-xl-12 mx-auto">
                  <div class="card">
                     <div class="card-body">
                        <form method="post" action="{{ route('setting.maping.pembelajaran.simpan') }}">
      @csrf

                        
                           <div class="mb-3">
                              <label class="form-label">Kelas:</label>
                                 <select name="kelas" class="form-select" id="kelas">
                                                        <option selected="" disabled="">Pilih Kelas</option>
                                                        @foreach($kelas as $item)
                                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                       @endforeach
                                                       
                                                    </select>
                                 @error('Kelas')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror

                           </div>


                           <div class="mb-3">
                              <label class="form-label">Jurusan:</label>
                                 <select name="jurusan" class="form-select" id="exampleFormControlSelect1">
                                                        <option selected="" disabled="">Pilih Jurusan</option>
                                                        @foreach($jurusan as $item)
                                                        <option value="{{$item->id}}">{{$item->kode}}</option>
                                       @endforeach
                                                       
                                                    </select>
                                 @error('Jurusan')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror

                           </div>

                           <div class="mb-3">
                              <label class="form-label">Group:</label>
                                 <select name="group" class="form-select" id="exampleFormControlSelect1">
                                                        <option selected="" disabled="">Pilih Group</option>
                                                        @foreach($group as $item)
                                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                       @endforeach
                                                       
                                                    </select>
                                 @error('Group')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror

                           </div>


                           <div class="mb-3">
                              <label class="form-label">Nama Siswa:</label>
                                 <select name="siswa_id" class="form-select" id="exampleFormControlSelect1">
                                                        <option selected="" disabled="">Pilih Siswa</option>
                                                        @foreach($userRfid as $item)
                                                        <option value="{{$item->id}}">{{$item->Nama}}</option>
                                       @endforeach
                                                       
                                                    </select>
                                 @error('Jurusan')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror

                           </div>
                           <div class="mb-3">
                              <label class="form-label">Status:</label>
                                 <select name="presensi" class="form-select" id="exampleFormControlSelect1">
                                                        <option selected="" disabled="">Pilih Status</option>
                                                        
                                                        <option value="0">Tidak Hadir</option>
                                                        <option value="1">Sholat Zhuhur</option>
                                                        <option value="10">Tidak Sholat Zhuhur</option>
                                                        <option value="2">Sholat Ashar</option>
                                                        <option value="20">Tidak Sholat Ashar</option>
                                       
                                                       
                                                    </select>
                                 

                           </div>

                           

                           

                           
                           
                           <div class="mb-3">
                              <button type="submit" class="btn btn-primary px-5"><i class='bx bx-save mr-1'></i>Simpan</button>
                           </div>
                        </form>
                     </div>
                  </div>

               </div>
            </div>
         



   </div>
</div>
<script type="text/javascript">
   $(document).ready(function(){
      $('#kelas').on('change', function(){
         var kelas = $(this).val();
         console.log(Kelas);
      });
   });
</script>
      <!--end page wrapper -->
@endsection