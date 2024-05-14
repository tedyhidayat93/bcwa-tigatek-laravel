
<!-- jQuery -->
<script src="{{asset('assets/ui-admin/')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/ui-admin/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- pace-progress -->
<script src="{{asset('assets/ui-admin/')}}/plugins/pace-progress/pace.min.js"></script>
<!-- Animatecss -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<!-- Select2 -->
<script src="{{asset('assets/ui-admin/')}}/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('assets/ui-admin/')}}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="{{asset('assets/ui-admin/')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('assets/ui-admin/')}}/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="{{asset('assets/ui-admin/')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="{{asset('assets/ui-admin/')}}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/ui-admin/')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('assets/ui-admin/')}}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-custom input file -->
<script src="{{asset('assets/ui-admin/')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- BS-Stepper -->
<script src="{{asset('assets/ui-admin/')}}/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- Summernote -->
<script src="{{asset('assets/ui-admin/')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- dropzonejs -->
<script src="{{asset('assets/ui-admin/')}}/plugins/dropzone/min/dropzone.min.js"></script>
<!-- Sweetalert bs4 -->
<script src="{{asset('assets/ui-admin/')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/ui-admin/')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('assets/ui-admin/')}}/dist/js/demo.js"></script> --}}
<!-- AdminLTE for demo purposes -->
<script>
    function question(event) {
        event.preventDefault();
        var deleteUrl = event.currentTarget.getAttribute('href');
        var deleteTitle = event.currentTarget.dataset.deleteTitle ?? '';
        Swal.fire({
            title: 'Are you sure to delete ?',
            html: 'This data <b>'+deleteTitle+'</b> will be deleted from the database!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#FF1717',
            cancelButtonColor: '#286CFF',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Delete!',
            showClass: {
                popup: 'animate__animated animate__zoomInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__zoomOut'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = deleteUrl;
            }
        });
    }

    // Memanggil function question saat tombol penghapusan diklik
    document.querySelectorAll('.btn-delete').forEach(item => {
        item.addEventListener('click', question);
    });
</script>

<script>
    $(function () {
        $('.summernote').summernote({
            placeholder: 'Type here...',
            tabsize: 2,
            height: 300,
            toolbar: [
                // ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                // ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                // ['table', ['table']],
                // ['insert', ['link', 'picture']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'help']]
            ],
            // fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather'],
            fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '22', '24', '36', '48', '64', '82'],
            // callbacks: {
            //     onImageUpload: function(files) {
            //         uploadImage(files[0]);
            //     }
            // }
        });
    });
</script>

<script>
  $(function () {
    //Fomrater number pricing
    // $('.price-formatter-idr, .price-formatter-usd').on('input', function(){
    //   // Menghapus karakter non-digit
    //   $(this).val(function(index, value) {
    //     return value.replace(/\D/g, "");
    //   });
      
    //   // Memformat angka dengan pemisah ribuan
    //   if ($(this).hasClass('price-formatter-idr')) {
    //     $(this).val(function(index, value) {
    //       return Number(value).toLocaleString('id');
    //     });
    //   } else if ($(this).hasClass('price-formatter-usd')) {
    //     $(this).val(function(index, value) {
    //       return Number(value).toLocaleString('en');
    //     });
    //   }
    // }).trigger('input'); // Trigger input event saat halaman dimuat

    $('.price-formatter-idr, .price-formatter-usd').each(function() {
        // Menetapkan nilai awal hanya jika input kosong
        if ($(this).val() === '') {
            $(this).val('');
        }
    }).on('input', function(){
        // Menghapus karakter non-digit
        var value = $(this).val().replace(/\D/g, "");
        
        // Memformat angka dengan pemisah ribuan jika ada angka, jika tidak kosongkan
        if (value != "") {
            if ($(this).hasClass('price-formatter-idr')) {
                $(this).val(Number(value).toLocaleString('id'));
            } else if ($(this).hasClass('price-formatter-usd')) {
                $(this).val(Number(value).toLocaleString('en'));
            }
        } else {
            $(this).val('');
        }
    }).trigger('input'); // Trigger input event saat halaman dimuat

    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    $(document).ready(function() {
      // Ambil nilai parameter date dari URL
      var dateParam = new URLSearchParams(window.location.search).get('date');
      
      // Periksa apakah parameter date ada dan tidak kosong
      if (dateParam !== null && dateParam !== '') {
        // Jika ada, set nilai input sesuai dengan nilai parameter date
        $('.date-range-picker').val(dateParam);
      } else {
        $('.date-range-picker').val('');
      }

        // Inisialisasi date range picker
        $('.date-range-picker').daterangepicker({
            autoUpdateInput: false,
            locale: {
                format: 'DD/MM/YY',
                showDropdowns: true
            }
        });

        // Menangani peristiwa ketika rentang tanggal dipilih
        $('.date-range-picker').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YY') + ' - ' + picker.endDate.format('DD/MM/YY'));
        });

        // Menangani peristiwa ketika rentang tanggal dibatalkan
        $('.date-range-picker').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });1

    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })


  });

  // Autohide Notification flash message
  const hideNotification = () => {
        setTimeout(() => {
            document.querySelectorAll('.alert-notif').forEach(alert => {
                alert.style.display = 'none';
            });
        }, 10000); // 5000 milidetik (10 detik)
    };

    // Panggil fungsi hideNotification() segera setelah halaman dimuat
    document.addEventListener('DOMContentLoaded', hideNotification);
</script>
@yield('scripts')

</body>
</html>