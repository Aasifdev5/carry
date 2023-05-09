@extends('layout.master')
@section('title')
MultiLingual
@endsection
@section('content')
<!-- <div class="container text-center"> -->



<!-- <div class="col-md-6">
   <strong>Select Language: </strong>
   <select class="form-control lang-change">
      <option value="en" {{ session()->get('lang_code')=='en' ? 'selected' : ''}}>English</option>
      <option value="sp" {{ session()->get('lang_code')=='sp' ? 'selected' : ''}}>Spanish</option>
      <option value="ar" {{ session()->get('lang_code')=='ar' ? 'selected' : ''}}>Arabic</option>
   </select>


</div> -->


<!-- <h4 class="mt-5">{{ __('test.dashboard') }}</h4> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
   var url = "{{ route('lang_change') }}";

   $('.lang-change').change(function() {
      let lang_code = $(this).val();
      window.location.href = url + "?lang=" + lang_code;
   });
</script>
<!-- </div> -->
@endsection