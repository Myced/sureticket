<script type="text/javascript">
    $(document).ready(function(){
        
        @if($flash = session('success'))
          $.toast({
                heading: 'Success',
                text: '{{ $flash }}',
                position: 'top-right',
                loaderBg:'#ff6849',
                icon: 'success',
                hideAfter: 10000,
                stack: 6
          });
          @endif

          @if($flash = session('error'))
          $.toast({
                heading: 'Error',
                text: ' {{ $flash }} ',
                position: 'top-right',
                loaderBg:'#ff6849',
                icon: 'error',
                hideAfter: 10000,
                stack: 6
          });
          @endif

          @if($errors = session('errors'))
                @foreach ($errors as $error)
                $.toast({
                      heading: 'Error',
                      text: ' {{$error}} ',
                      position: 'top-right',
                      loaderBg:'#ff6849',
                      icon: 'error',
                      hideAfter: 10000,
                      stack: 6
                });
                @endforeach

          @endif

          @if($flash = session('info'))
              $.toast({
                    heading: 'Info',
                    text: ' {{ $flash }} ',
                    position: 'top-right',
                    loaderBg:'#ff6849',
                    icon: 'info',
                    hideAfter: 10000,
                    stack: 6
              });
          @endif
    })
</script>
