<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/9e02f785ed.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/app.css">
    <title>TODO-LIST</title>
</head>
<body>
    <section class="container m-auto">
        <h1 class="text-center mt-3">TODO-LIST WITH LARAVEL</h1>
        <form action="todo" method="POST">
            @csrf
            <div class="input-group mb-3 mt-4 m-auto">
                <input type="text" class="form-control" placeholder="TODO" aria-label="Todo-list-input-field" aria-describedby="button-addon2" name="Task">
            <button class="btn btn-outline-dark" id="button-addon2">Button</button>
            </div>
            @error('Task')
            <p class="text-center text-danger font-weight-bold task-modal-error">{{ $message }}</p>
                
            @enderror
        </form>
        <div class="row mt-5">
            <table class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th scope="col">Task</th>
                    <th scope="col">Status</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($todo as $item)
                  <tr>
                    <th scope="row">{{ $item->Task }}</th>
                <td class="text-danger font-weight-bold status">
                  <form action="/todo/{{ $item->id }}" method="POST">
                    @csrf
                    @method('put')
                    <button type="submit" class="{{ $item->Status=='To-do' ? 'btn btn-danger' : 'btn btn-success'}}">{{ $item->Status }}</button>
                    
                </form>
                
                </td>
                    <td>
                        <form action="/todo/{{ $item->id }}" method="POST">
                        @csrf
                        @method('delete')
                       <button> <i class="fa-solid fa-trash delete"></i> </button>
                    </form>
                </td>
                    <td>
                        <button data-bs-toggle="modal" data-bs-target="#update-modal{{ $item->id }}"><i class="fa-sharp fa-solid fa-pen edit"></i></button>
                        <div class="modal fade" id="update-modal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">EDIT TASK</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form action="/todo/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="input-group mb-3 mt-4 m-auto">
                                        <input type="text" class="form-control form-update" placeholder="TODO" aria-label="Todo-list-input-field" aria-describedby="button-addon2" name="Tasks" value = {{ $item->Task }}>
                                    <button type="submit" class="btn btn-outline-dark modal-submit" id="button-addon2">Button</button>
                                    </div>
                                   
                                </form>
                              </div>
                              <p class="text-center text-danger font-weight-bold task-modal-error"></p>
                                  
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </td>
                  </tr>
                  @empty
                  <p class="empty text-center">No entries</p>
                  @endforelse
                </tbody>
              </table>

              
        </div>



    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="/js/app.js"></script>
</body>
</html>