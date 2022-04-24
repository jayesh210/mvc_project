<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO PROJECT</title>

    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body class="bg-info">

<div class="container w-25 mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3>TO-DO LIST</h3>
            <form action="{{ route('store') }}" method="POST" autocomplete="off">
                @csrf 
                <div class="input-group">
                    <input type="text" name="content" class="form-control" placeholder="Add the task">
                    <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fas fa-plus"></i> ADD</button>
                </div>


            </form>
            {{-- if tasks count --}}
            @if (count($todolists))
            
            <ul class="list-group list-group-flush mt-3">
            @foreach ($todolists as $todolist)
                <li class="list-group-item">
                    <form action="{{ route('destroy', $todolist->id) }}" method="POST">
                        {{ $todolist->content }}
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-link btn-sm float-end"><i class="fas fa-trash"></i>DELETE</button>
                    </form>
                </li>
            @endforeach

            </ul>
            @else
            <p class="text-center mt-3">No Task!</p>
            @endif
        </div>
        @if (count($todolists))

        <div class="card-footer">
            You have {{ count($todolists) }} pending tasks to complete!
        </div>

        @else
        @endif
    </div>

</div>
    
</body>
</html>