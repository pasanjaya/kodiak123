@if (count($errors) > 0)
    @foreach ($errors->all() as $error)

    <div id="ERROR" style="display: none" class="alert alert-danger">{{$error}}</div>

    @endforeach
@endif

@if (session('success'))
    <div id="info" style="display:none" class="alert alert-success">{{session('success')}}</div>
    <script>
        swal({
            title: "Success",
            text: jQuery('#info').html(),
            icon: "success",
            showCloseButton: true,
        });
    </script>
@endif

@if (session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
@endif


