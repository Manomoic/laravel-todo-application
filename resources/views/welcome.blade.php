<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <title>Laravel toDo Application</title>
    <style>
        .jumbotron {
            padding: 1rem 0 !important;
        }
    </style>
</head>

<body>


    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4 h1 lead text-center">
                    Laravel Todo List
                </h1>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12 col-sm-12">
                <form method="POST" action="{{ route('store') }}">
                    <div class="input-group mt-4">
                        <input type="text" class="form-control @error('todo') is-invalid @enderror" name="todo"
                            value="{{ old('todo') }}" placeholder="Add your to-do list" autocomplete="off" />
                        {{-- Validation Error Message --}}
                        @error('todo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div class="input-group-append">
                            @csrf
                            <button type="submit" class="btn btn-outline-info">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <h6 class="border-bottom border-gray pb-2 mb-0 text-muted text-uppercase">My List</h6>

                    {{-- Display all lists --}}
                    @forelse ($todos as $todo)

                    <div class="media text-muted pt-3">
                        <div class="media-body small lh-125 border-bottom border-gray">
                            <form method="POST" action="{{ route('destroy', $todo->id) }}">
                                @method('delete')
                                @csrf
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="todoCheckfield"
                                        id="todo_{{ $todo->id }}">
                                    <label class="form-check-label" for="defaultCheckbox"> {{ $todo->todo }} </label>

                                    <button type="submit" class="btn btn-sm btn-outline-danger float-right">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    @empty
                    {{-- Print out message if no list available --}}
                    <div class="media text-muted pt-3">
                        <div class="media-body">
                            <p class="media-body pb-3 mb-0 small lh-125">
                                No available to-dos added.
                            </p>
                        </div>
                    </div>
                    @endforelse


                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>