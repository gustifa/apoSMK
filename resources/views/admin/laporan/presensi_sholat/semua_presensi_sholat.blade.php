@extends('admin.admin_master')
@section('admin')

@section('title')
   Laporan Semua Rombel
@endsection

@php
   $datarombel = App\Models\Rombongan_belajar::all();
@endphp

<script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
<script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script> -->
<!--start page wrapper -->
      <div class="page-wrapper">
         <div class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
               <div class="breadcrumb-title pe-3">Laporan Presensi</div>
               <div class="ps-3">
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Semua Rombel</li>
                     </ol>
                  </nav>
               </div>


            </div>
            <!--end breadcrumb-->
            
            <div class="mb-3">
                              <select id="rombongan_belajar_id" name="rombongan_belajar_id" class="form-select mb-3" aria-label="Default select example">
                                 <option value="" selected="" disabled="">Pilih Rombel</option>
                                 @foreach($datarombel as $item)
                                 <option value="{{$item->rombongan_belajar_id}}">{{$item->nama}}</option>
                                 @endforeach
                              </select>
                           </div>

                                
<div class="mb-3">
     <a id="search" class="btn btn-primary" name="search"> Search</a>
</div>

<!--  ////////////////// Registration Fee table /////////////  -->

 <div class="row">
   <div class="col-md-12">
      <div id="DocumentResults">

   <script id="document-template" type="text/x-handlebars-template">

   <table class="table table-bordered table-striped" style="width: 100%">
   <thead>
      <tr>
        @{{{thsource}}}
      </tr>
    </thead>
    <tbody>
      @{{#each this}}
      <tr>
         @{{{tdsource}}}   
      </tr>
      @{{/each}}
    </tbody>
   </table>
    </script>

    
         
      </div>      
   </div>
   
 </div>
 


    

            <!-- Awala Datatable -->
            
            <!-- Akhir Datatable -->   


            
         </div>
      </div>
      <!--end page wrapper -->

<script type="text/javascript">
  $(document).on('click','#search',function(){
    var rombongan_belajar_id = $('#rombongan_belajar_id').val();
     $.ajax({
      url: "{{ route('student.exam.fee.classwise.get')}}",
      type: "get",
      data: {'rombongan_belajar_id':rombongan_belajar_id},
      beforeSend: function() {       
      },
      success: function (data) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });

</script>

@endsection