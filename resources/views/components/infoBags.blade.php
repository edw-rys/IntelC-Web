@if (session('title_success'))
  <script>
    Swal.fire(
      '{{ session('title_success') }}',
      '{{ session('message_success') }}',
      'success'
    )
  </script>
    {{ session()->forget('title_success') }}  
  @endif