<!DOCTYPE html>
<html>
<head>
<style>
#judul {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;

}

#judul td, #judul th {
  border: 0px solid #ddd;
  padding: 1px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

hr {
  border-top: 1px solid #000 ;
  border-bottom: 3px solid #000 ;
  margin: 0;
  padding: ;
}
</style>
</head>
@php
        $implodeId = App\Models\Sekolah::select('sekolah_id')->get()->implode('sekolah_id');
        $adminData = App\Models\Sekolah::find($implodeId);
@endphp
<body>


<table id="judul">
  <tr>
    <td>
      <h2>
        <img id ="showImage"src="{{(!empty($adminData->logo_sekolah)) ? url('upload/sekolah_images/'.$adminData->logo_sekolah): url('upload/no_image.jpg')}}" alt="Admin" style="width: 100px; height: 100px;">

      </h2>
    </td>
    <td align="center">
      <h3>
        DINAS PROVINSI SUMATERA BARAT
      </h3>
      <h2>
        SMK NEGERI 1 KINALI
      </h2>
      <p>Jl. Teuku Umar KM. 1 Kecamatan Kinali Kabupaten Pasaman Barat</p>
      <!-- <p>Phone : 343434343434, Email : support@easylerningbd.com</p> -->

    </td>
    <td>
      <h2>
        <img id ="showImageProvinsi"src="{{(!empty($adminData->logo_provinsi)) ? url('upload/sekolah_images/'.$adminData->logo_provinsi): url('upload/no_image.jpg')}}" alt="Admin" style="width: 100px; height: 100px;">

      </h2>
    </td> 
  </tr>
</table>
<hr />

@php 

@endphp 
<h2 align="center">Laporan Presensi Sholat Zhuhur & Ashar</h2>
  
<table id="customers">
  <tr>
    <th width="5%">No</th>
    <th width="45%">Nama Peserta Didik</th>
    <!-- <th width="45%">Kelas</th> -->
    <th width="35%">Waktu Presensi</th>
    <th width="15%">Sholat</th>
  </tr>
  @foreach($dataLaporan as $key => $item)
  <tr>
    <td>{{$key+1}}</td>
    <td><b>{{$item->peserta_didik->nama}}</b></td>
    <!-- <td><b>{{$item->peserta_didik_id}}</b></td> -->
    <td>{{$item->created_at}}</td>
    @if($item->presensi == '2')
    <td>Zhuhur</td>
    @else
    <td>Ashar</td>
    @endif
  </tr>
  @endforeach
    
   
</table>
<br> <br>
  <i style="font-size: 14px; float: right;">Tanggal Cetak : {{ date("d M Y") }}</i>


</body>
<script type="text/javascript">
  window.print();
</script>
</html>
