<div id="copyright" style="text-align: center">© Copyright 2022 Paritosh Gupta </div>

 <!-- Third Party Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Scripts for Toast Notification -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

 <!-- Custom Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/custom.js') }}" defer></script>
<script src="{{ asset('js/JSvalidation.js') }}" defer></script>  <!-- Scripts for JS validation -->

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true,
                // "positionClass": "toast-bottom-full-width",
            }
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true,
                // "positionClass": "toast-bottom-full-width",
            }
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>