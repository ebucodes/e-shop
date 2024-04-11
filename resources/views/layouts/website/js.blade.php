<!-- Vendor Custom -->
<script src="{{ asset('website/assets/js/vendor/jquery-3.6.4.min.js') }}"></script>
<script src="{{ asset('website/assets/js/vendor/jquery.zoom.min.js') }}"></script>
<script src="{{ asset('website/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('website/assets/js/vendor/mixitup.min.js') }}"></script>
<script src="{{ asset('website/assets/js/vendor/range-slider.js') }}"></script>
<script src="{{ asset('website/assets/js/vendor/aos.min.js') }}"></script>
<script src="{{ asset('website/assets/js/vendor/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('website/assets/js/vendor/slick.min.js') }}"></script>
<!-- Main Custom -->
<script src="{{ asset('website/assets/js/main.js') }}"></script>
<script src="{{ asset('validation.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script src="{{ asset('account/assets/js/vendor/sweetalert2.min.js') }}"></script>
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
                    // toast:'true',
                    text: '{{ session('error') }}',
                    showConfirmButton: false,
                    timer: 3000
                });
            @elseif (session('success'))
                Swal.fire({
                    icon: 'success',
                    // toast:'true',
                    // position: 'top',
                    text: '{{ session('success') }}',
                    showConfirmButton: true,
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
            case 'approve':
                titleText = 'Are you sure you want to approve?';
                buttonText = 'Approve';
                break;
            case 'reject':
                titleText = 'Are you sure you want to reject?';
                buttonText = 'Reject';
                break;
            // Add more cases for other actions if needed

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

<script>
    // JavaScript to handle quantity change events
    const quantityInputs = document.querySelectorAll('.quantity');

    quantityInputs.forEach(input => {
        input.addEventListener('change', function() {
            const quantity = parseInt(this.value);
            const productId = this.dataset.productId;
            updateTotal(productId, quantity);
        });
    });

    function updateTotal(productId, quantity) {
        // Perform AJAX request to update total
        fetch(`/update-total?product_id=${productId}&quantity=${quantity}`)
            .then(response => response.json())
            .then(data => {
                // Update total in the corresponding table cell
                const totalCell = document.querySelector(`.quantity[data-product-id="${productId}"]`).parentNode.nextElementSibling;
                totalCell.textContent = `$${data.total.toFixed(2)}`;
            })
            .catch(error => console.error('Error:', error));
    }
</script>
