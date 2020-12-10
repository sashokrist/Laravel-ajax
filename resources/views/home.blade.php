@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="validation-errors"></div>
        <form id="ajaxform">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name" required="">
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required="">
            </div>

            <div class="form-group">
                <strong>Mobile Number:</strong>
                <input type="text" name="mobile_number" class="form-control" placeholder="Enter Mobile" required="">
            </div>
            <div class="form-group">
                <strong>Message:</strong>
                <input type="text" name="message" class="form-control" placeholder="Enter Your Message" required="">
            </div>
            <div class="form-group">
                <button class="btn btn-success save-data">Save</button>
            </div>
        </form>
        <div id="result"></div>
        <button class="btn btn-danger" id="del" style="display: none">Delete</button>
    </div>
    <script>
        $(document).ready(function () {
            $(".save-data").click(function (event) {
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('posts-store') }}",
                    type: "POST",
                    data: $('#ajaxform').serialize(),
                    success: function (users) {
                        console.log(users);
                        if (users) {
                            $('.success').text(users.success);
                            $("#ajaxform")[0].reset();
                           /* $('#result').html([
                                '<div class="content"> Name: ', users['name'], '</div>',
                               '<div class="content"> Email: ', users['email'], '</div>',
                                '<div class="content"> Phone: ', users['mobile_number'], '</div>',
                                '<div class="content"> Message: ', users['message'], '</div>',
                            ]);*/
                            $.each(users, function (key, value) {
                                $('#result').append('<div class="col-10">' + key + ' : ' + value + '</div>');
                            });
                            $('#result').append('<br><hr>');
                        }
                        $('#del').show();
                        $('#result').show();
                    },
                    error: function (xhr) {
                        $('#validation-errors').html('');
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            $('#validation-errors').append('<div class="alert alert-danger">' + value + '</div');
                        });
                    },
                });
            });
        });
        $("#del").click(function () {
            console.log('works');
            $(".content").remove();
            $('#del').hide();
            $('#result').hide();
        });
    </script>
    <script>

    </script>
@endsection
