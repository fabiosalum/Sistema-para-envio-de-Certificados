<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Edu4Med</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/toastr.min.css')}}">
  
  <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-iconpicker.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/select2/dist/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css')}}">
  
  <!-- datatables -->
  <link href="https://cdn.datatables.net/v/dt/dt-2.0.7/datatables.min.css" rel="stylesheet">


<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      @include('user.layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">

        @yield('content')

      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2024 <div class="bullet"></div> Educat 
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('admin/assets/modules/jquery.min.js')}}"></script>
  <script src="{{ asset('admin/assets/modules/popper.js')}}"></script>
  <script src="{{ asset('admin/assets/modules/tooltip.js')}}"></script>
  <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  
  <script src="{{ asset('admin/assets/js/stisla.js')}}"></script>
  
  <!-- Template JS File -->
  <script src="{{ asset('admin/assets/js/scripts.js')}}"></script>
  <script src="{{ asset('admin/assets/js/custom.js')}}"></script>
  
  <!-- datatables -->
  <script src="https://cdn.datatables.net/v/dt/dt-2.0.7/datatables.min.js"></script>
  
  <!-- Toaster -->
  <script src="{{ asset('admin/assets/js/toastr.min.js')}}"></script>
  
  <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
  
  <!-- sweetalert 2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

  <script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
  
  
  <!-- toogle -->
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

   <!-- show dynamic validation message-->
   <script>
    toastr.options.progressBar = true;

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif
</script>

<script>
    $.uploadPreview({
        input_field: "#image-upload", // Default: .image-upload
        preview_box: "#image-preview", // Default: .image-preview
        label_field: "#image-label", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Change File", // Default: Change File
        no_label: false, // Default: false
        success_callback: null // Default: null
    });

    $(document).ready(function() {

        $('body').on('click', '.delete-item', function(e) {
            e.preventDefault()

            let url = $(this).attr('href');

            Swal.fire({
                title: 'Você tem certeza?',
                text: "Você não poderá reverter isso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, deletar!'
            }).then((result) => {
               
                if (result.isConfirmed) {

                    $.ajax({
                        method: 'DELETE',
                        url: url,
                        data: {_token: "{{ csrf_token() }}"},
                        success: function(response) {
                            if(response.status === 'success'){
                                window.location.reload();
                            }else if(response.status === 'error'){
                                toastr.error(response.message)
                            }
                        },
                        error: function(error) {
                            console.error(error);
                        }
                    })
                }
            })
        })

    })

</script>
  
  @stack('scripts')



</body>
</html>