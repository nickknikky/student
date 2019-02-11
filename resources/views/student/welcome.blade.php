@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Student Dashboard</div>

                    <div class="panel-body">
                        <div>
                            {{ Auth::user()->name }}, You are logged in to the System as Student with limited Privileges!
                        </div>

                        <br>

                        <div>
                            Click to view your marks<br>
                            <span>
                                <strong>Marks:</strong>
                            </span>
                            <span style="padding: 5px;">
                                <a href="#" title="View" class="btn btn-info" id="view_marks">
                                    <i class="fa fa-eye"> &nbsp;&nbsp;View</i>
                                </a>
                            </span>
                            <br>
                            <br>
                            <span id="marks_span" style="display: none">
                                <table class="table_bound">
                                    <tr>
                                        <th class="table_bound">English</th>
                                        <th class="table_bound">Maths</th>
                                    </tr>
                                    <tr>
                                        <td class="table_bound" id="td1"></td>
                                        <td class="table_bound" id="td2"></td>
                                    </tr>
                                </table>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .table_bound {border: 1px solid; padding: 3px;}
    </style>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $('#view_marks').click(function () {
            $.ajax({
                url: "{{ url('student/get_marks') }}",
                type: "post",
                data: {
                    '_token': '{{ csrf_token() }}',
                    studentId: '{{ Auth::user()->id }}',
                },
                success: function (data) {
                    if ( data.status == true ) {
                        $('#td1').html(data.marks[0].english_score);
                        $('#td2').html(data.marks[0].math_score);
                        $('#marks_span').show();
                    } else {
                        alert("Error Encountered!");
                    }
                }
            });
        });
    </script>
@endsection