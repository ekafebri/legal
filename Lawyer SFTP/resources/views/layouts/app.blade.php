
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>@yield('title') | {{config('app.name')}}</title>

  <!-- Custom fonts for this template-->
  <link href="{{url('public/plugins/sb-admin')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="{{url('public/plugins/sb-admin')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{url('public/plugins/sb-admin')}}/css/sb-admin-2.min.css" rel="stylesheet">
  @include('layouts.image')
  @yield('css')

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  @include('layouts.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            @include('layouts.header')
            @include('layouts.alert')
            @yield('content')
        
        </div>
        <!-- End of Main Content -->
        
  @include('layouts.footer')

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  @include('layouts.modal')
  @yield('modal')
 


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="{{url('public/plugins/sb-admin')}}/vendor/jquery/jquery.min.js"></script>
  <script src="{{url('public/plugins/sb-admin')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{url('public/plugins/sb-admin')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{url('public/plugins/sb-admin')}}/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="{{url('public/plugins/sb-admin')}}/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="{{url('public/plugins/sb-admin')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- <script src="{{url('public/plugins/sb-admin')}}/vendor/chart.js/Chart.min.js"></script>
  <script src="{{url('public/plugins/sb-admin')}}/js/demo/datatables-demo.js"></script> -->

  <!-- Page level custom scripts -->
  <!-- <script src="{{url('public/plugins/sb-admin')}}/js/demo/chart-area-demo.js"></script>
  <script src="{{url('public/plugins/sb-admin')}}/js/demo/chart-pie-demo.js"></script> -->
  <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  </script>
  <script>
    $('table tbody').on( 'click', '.delete',function (e) {
      //menghentikan link/event agar tidak jalan
        var id = $(this).attr('id')
        var method = $(this).attr('name')
        console.log(method);
        e.preventDefault();
        Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Hapus Data!',
        focusCancel: true,
        
        }).then((confirm,value)=>{
        if(confirm.value === true){
          $.ajax({
            type:"post",
            url:"{{ url('')}}/"+ method + '/' + id,
            data:{_method:'delete'},
            success:function(data){
        console.log(data)
              Swal.fire({
                title:"Berhasil",
                text:"Data Berhasil Dihapus",
                type:"success",
                showConfirmButton:false,
                timer: 3000}),
                location.reload()
            },
            error : function(data){
              console.log(data)
              alert('Sorry, Something error :(')
            }
          })
        }
      })
    });
  </script>
  <script>
    $('table tbody').on( 'click', '.activation',function (e) {
      //menghentikan link/event agar tidak jalan
        var id = $(this).attr('id')
        var method = $(this).attr('name')
        var value = $(this).attr('value')
        if(value == 1){
          var message = 'Non-Aktifkan?';
        }else{
          var message = 'Aktifkan?';
        }
        e.preventDefault();
        Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Status akan di "+ message,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: message,
        focusCancel: true,
        }).then((confirm,value)=>{
        if(confirm.value === true){
          $.ajax({
            type:"post",
            url: "{{url('')}}/"+ method + id,
            success:function(data){
            console.log(data)
              Swal.fire({
                title:"Berhasil",
                text:"Status Berhasil Di ubah",
                type:"success",
                showConfirmButton:false,
                timer: 5000}),
                location.reload()
            },
            error : function(data){
              console.log(data)
              alert('Sorry, Something error :(')
            }
          })
        }
      })
    });
  </script>
  <script>
    $('table tbody').on( 'click', '.confirmation',function (e) {
      //menghentikan link/event agar tidak jalan
        var id = $(this).attr('id')
        var method = $(this).attr('name')
        var text = $(this).attr('value')
        var type = $(this).data('type')
        e.preventDefault();
        Swal.fire({
        title: 'Apakah anda yakin?',
        type: 'warning',
        text: text,
        input: type,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Ya',
        focusCancel: true,
        }).then((confirm,value)=>{
        var alasan_tolak = confirm.value
        if(confirm.value){
          $.ajax({
            type:"post",
            url: "{{url('')}}/"+ method + id,
            data: {alasan_tolak:confirm.value},
            success:function(data){
            console.log(data)
              Swal.fire({
                title:"Berhasil",
                text:"Berhasil Di ubah",
                type:"success",
                showConfirmButton:false,
                timer: 5000}),
                location.reload()
            },
            error : function(data){
              console.log(data)
              alert('Sorry, Something error :(')
            }
          })
        }
      })
    });
  </script>
  <script>
    $('.changePassword').on('click', function(){
      var id = $(this).data('id');
      console.log(id)
      var url = "{{url('change')}}/"+id
      $('.form-changepassword').attr( 'action', url)
    })
  </script>

  <script>
      function enlargeImage() {
      document.getElementById("img01").src = this.src;
      document.getElementById("caption").innerHTML = this.alt;
      document.getElementById('myModal').style.display = "block";
      }

      (function() {
      var images = document.getElementsByClassName("myImg");
      for (i = 0; i < images.length; i++) {
          images[i].onclick = enlargeImage;
      }
      })();
  </script>

  <script>
      $('.editProfile').on('click' ,function (e) {
      var id = $(this).attr('id');
      var method = $(this).attr('name');
      var url = "{{url('admin')}}/"+id;
      $.ajax({
              type:"get",
              url:"{{url('admin')}}/"+id+"/edit",
              success:function(data){
                $('.form-admin').attr('action', url)
                $('.form-admin #username').val(data.username)
                $('.form-admin #email').val(data.email)
                $('.form-admin #telp').val(data.telp)
                $(".form-admin .image").attr('src', "{{asset('/')}}"+ data.avatar)
              },
              error : function(data){
                console.log(data.responseText)
              }
            });
    });
  </script>
  
   @yield('js')
</body>

</html>
