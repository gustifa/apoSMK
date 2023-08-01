$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Apakah dihapus?',
                    text: "Data Ini ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya, Hapus! '
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Hapus!',
                        'Data Berhasil dihapus.',
                        'success'
                      )
                    }
                  }) 


    });

  });

$(function(){
    $(document).on('click','#generate_guru',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Apakah digenerate?',
                    text: "Data Ini ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya, Generate! '
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Generate!',
                        'Data Berhasil digenerate.',
                        'success'
                      )
                    }
                  }) 


    });

  });

$(function(){
    $(document).on('click','#generate_siswa',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Apakah digenerate?',
                    text: "Data Ini ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya, Generate! '
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Generate!',
                        'Data Berhasil digenerate.',
                        'success'
                      )
                    }
                  }) 


    });

  });
