<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Laravel Export Macro</title>
  </head>
  <body>
    <h1 class="bg-success text-center m-3 p-3 text-white">Export Macro Excel With Laravel</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 text-center">
                <form action="{{url('/export')}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="Export Data">
                    </div>
                </form>
            </div>
        </div>
        @if(isset($datas))
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered border ">
                    <thead>
                        <tr>
                            <th> Roll_No </th>
                            <th> Name</th>
                            <th> Email </th>
                            <th> Join_Date </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                        <tr>
                            <td>{{$data->roll_no}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{date('Y年m月d日')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
  </body>
</html>
