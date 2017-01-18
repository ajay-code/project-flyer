
@if(session()->has('flash_message'))
    <script>
            swal({
                title: "{{session('flash_message.title')}}",
                text: "{{session('flash_message.message')}}",
                timer: 2000,
                type: "{{session('flash_message.level')}}",
                showConfirmButton: false
            });
    </script>
@endif


@if(session()->has('flash_message_overlay'))
    <script>
            swal({
                title: "{{session('flash_message_overlay.title')}}",
                text: "{{session('flash_message_overlay.message')}}",
                type: "{{session('flash_message_overlay.level')}}",
                confirmButtonText: 'Okay'
            });
    </script>
@endif
