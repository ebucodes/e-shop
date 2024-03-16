<!-- Vendor Custom -->
<script src="{{ asset('account/assets/js/vendor/jquery-3.6.4.min.js') }}"></script>
<script src="{{ asset('account/assets/js/vendor/simplebar.min.js') }}"></script>
<script src="{{ asset('account/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('account/assets/js/vendor/apexcharts.min.js') }}"></script>
<script src="{{ asset('account/assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('account/assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('account/assets/js/vendor/owl.carousel.min.js') }}"></script>
<!-- Data Tables -->
<script src="{{ asset('account/assets/js/vendor/jquery.datatables.min.js') }}"></script>
<script src="{{ asset('account/assets/js/vendor/datatables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('account/assets/js/vendor/datatables.responsive.min.js') }}"></script>
<!-- Caleddar -->
<script src="{{ ('account/assets/js/vendor/jquery.simple-calendar.js') }}"></script>
<!-- Date Range Picker -->
<script src="{{ asset('account/assets/js/vendor/moment.min.js') }}"></script>
<script src="{{ asset('account/assets/js/vendor/daterangepicker.js') }}"></script>
<script src="{{ asset('account/assets/js/vendor/date-range.js') }}"></script>

<!-- Main Custom -->
<script src="{{ asset('account/assets/js/main.js') }}"></script>
<script src="{{ asset('account/assets/js/data/ecommerce-chart-data.js') }}"></script>
<script src="{{ asset('validation.js') }}"></script>
<script src="{{ asset('account/assets/js/vendor/sweetalert2.min.js') }}"></script>
<script src="{{ asset('account/assets/js/select2.full.min.js') }}"></script>
<script src="{{ asset('account/assets/js/select2.min.js') }}"></script>

<script>
    $(function () {
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>


{{-- session messages --}}
<script>
    @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    text: '{{ implode("\n", $errors->all()) }}',
                    showConfirmButton: false,
                    timer: 5000
                });
            @elseif (session('error'))
                Swal.fire({
                    icon: 'error',
                    text: '{{ session('error') }}',
                    showConfirmButton: false,
                    timer: 3000
                });
            @elseif (session('success'))
                Swal.fire({
                    icon: 'success',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 3000
                });
            @elseif (session('info'))
                        Swal.fire({
                        icon: 'info',
                        text: '{{ session('info') }}',
                        showConfirmButton: false,
                        timer: 3000
                        });
            @endif
</script>

{{-- confirmation message --}}
<script>
    function showConfirmation(form, event, actionType) {
        event.preventDefault(); // Prevent default form submission behavior

        let titleText = '';
        let buttonText = '';

        switch (actionType) {
            case 'submit':
                titleText = 'Are you sure you want to submit?';
                buttonText = 'Submit';
                break;
            case 'delete':
                titleText = 'Are you sure you want to delete?';
                buttonText = 'Delete';
                break;
            case 'update':
                titleText = 'Are you sure you want to update?';
                buttonText = 'Update';
                break;
            default:
                console.log('Invalid action type');
                return;
        }

        if(form.checkValidity()){
            Swal.fire({
                title: titleText,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: buttonText
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user clicks Yes, show "Please wait" dialog
                    Swal.fire({
                        title: 'Please wait...',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        onBeforeOpen: () => {
                            Swal.showLoading(); // Show loading spinner
                        }
                    });
                    // Submit the form
                    form.submit();
                }
            });
        } else {
            // If form validation fails, you can handle it here (e.g., show error messages)
            @if ($errors->any())
            Swal.fire({
            icon: 'error',
            title: 'Validation Error',
            html: `{!! implode('<br>', $errors->all()) !!}`,
            showConfirmButton: true,
            confirmButtonColor: "#23346A",
            });
            @endif
            // Optionally, you can skip showing the confirmation dialog in this case.
            console.log('Form validation failed');
        }
    }
</script>