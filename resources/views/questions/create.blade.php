@extends('questions.layout')

@section('header')
    @livewireScripts
    @livewire('navigation-dropdown')
@endsection

@section('content')

    <div id="info" class="row">
        <div class="col-lg-12 margin-tb">
            <div id="back" class="pull-left">
                <a class="btn" href="{{ route('questions.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="pull-left">
        <h1>Add A New Question</h1>
    </div>
    <form action="{{ route('questions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>What's your question?</strong>
                    <input type="text" name="question" class="form-control" placeholder="Your Question">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Describe your Problem a little bit more</strong>
                    <textarea class="form-control" style="height:150px" name="content" placeholder="Describe your Problem"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Add an image, if necessary</strong><br>
                    <input type="file" id="image" name="image" class="form-control" placeholder="Image">
                    <small id="error"></small>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button id="submit" type="submit" class="btn btn-primary-outline">Save</button>
            </div>
        </div>

    </form>
@endsection

@section('script')
<script type="text/javascript">
    $('#image').on('change', function() {
        const size =
            (this.files[0].size / 1024 / 1024).toFixed(2);
        if (size > 10 ) {
            $('#image').addClass('is-invalid');
            $('#submit').attr('disabled', 'disabled');
            $("#error").html('<b>' + 'Upload is too large ('+ size +  ' MB)! It should be less then 10MB </b>');
        } else {
            $('#image').removeClass('is-invalid');
            $('#submit').removeAttr('disabled');
        }
    });
</script>
@endsection
