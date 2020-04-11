<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ordenes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
    
    <style>
        .checklist-item {
            position: relative;
            display: flex;
            padding-left: .75rem;
            justify-content: space-between;
            align-items: center;
        }

        .checklist-item-success:before {
            background-color: #2dce89!important;
        }

        .checklist-item:before {
            position: absolute;
            top: 0;
            left: 0;
            width: 3px;
            height: 100%;
            content: '';
            border-radius: 8px;
            background-color: #fb6340;
        }

        .checklist-item-checked .checklist-info * {
            text-decoration: line-through;
        }

        
    </style>

</head>
<body>
    <h1>Listado de ordenes</h1>

    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-4">
                <div class="w-100 bg-light shadow rounded px-4 py-4">
                    <ul class="list-unstyled">
                        @foreach ($orders as $order)
                            <li>
                                <div class="checklist-item {{$order->finished == '0' ? 'checklist-item-success' : 'checklist-item-checked'}} my-4">
                                    <div class="checklist-info">
                                    <a  href="{{route('order.show', ['id' => 1])}}" class="w-100 checklist-title mb-0 h6 c-black">{{$order->order}}</a>
                                    </div>
                                    <div class="border-left h-100 pl-3">
                                        <i class="fas fa-sm {{$order->finished == '0' ? 'fa-check text-success' : 'fa-undo-alt text-danger' }} "></i>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>