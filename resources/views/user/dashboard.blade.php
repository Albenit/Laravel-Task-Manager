@extends('includes.app')
@section('title', 'Dashboard')
@section('scripts')
    <script>
        function openModal(taskId) {
            axios.get('task/' + taskId).then(response => {
                if(response.data != ''){
                    showModal(response.data);
                }
            })
        }
        function showModal(data) {
            document.getElementById('divModal').innerHTML = `
                <div class="modal fade" id="editTaskModal" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header justify-content-center">
                                <h5 class="modal-title " id="staticBackdropLabel">Update Task</h5>
                            </div>
                            <form action="task/update/${data['id']}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="modal-body">
                                    <div class="form-group mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="${data['title']}" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" id="description" cols="10" rows="2" required>${data['description']}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-select" required>
                                            <option value="0" ${data['status'] === 0 ? 'selected' : ''}>Unfinished</option>
                                            <option value="1" ${data['status'] === 1 ? 'selected' : ''}>Finished</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="priority">Priority</label>
                                        <select name="priority" id="priority" class="form-select" required>
                                            <option value="1" ${data['priority'] === 1 ? 'selected' : ''}>High</option>
                                            <option value="2" ${data['priority'] === 2 ? 'selected' : ''}>Average</option>
                                            <option value="3" ${data['priority'] === 3 ? 'selected' : ''}>Low</option>
                                            <option value="0" ${data['priority'] === 0 ? 'selected' : ''}>Non Priority</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-secondary px-4" data-bs-ripple-init
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info px-4" style="color:white"
                                        data-bs-ripple-init>Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>`;

            $('#editTaskModal').modal('show');
        }
    </script>
@endsection
@section('content')
    @extends('includes.header')
    <div class="col-sm-12 col col-lg-6 mx-auto px-3 px-lg-0 ">
        <div class="justify-content-center mt-5">
            <div class="row mb-3">
                <div class="col-6">
                    <h5>Tasks</h5>
                </div>
                <div class="col-6">
                    <div class="text-end">
                        <button type="button" class="btn btn-info" style="color: white" data-bs-toggle="modal"
                            data-bs-target="#newTaskModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="">
                @if (count($tasks) == 0)
                    <div class="text-center " style="border:1px solid rgb(177, 177, 177)">
                        <p class="py-4 mb-0">No Tasks Yet</p>
                    </div>
                @else
                    @foreach ($tasks as $item)
                        <div class="mb-2">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6">
                                            {{ ucFirst($item->title) }}
                                        </div>
                                        <div class="col-6 text-end d-flex justify-content-end align-items-center">
                                            <a style="cursor: pointer; margin-right: 10px;" onclick="openModal({{ $item->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                </svg>
                                            </a>
                                            <form class="mb-0" action="{{ route('task/delete', $item->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    style="border: none; background: none; padding: 0; cursor: pointer;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <h6 class="card-title">Description:</h6>
                                        <p class="card-text">
                                            {{ Illuminate\Support\Str::limit($item->description, 100, '...') }}
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="card-title">Status:</h6>
                                        <p class="card-text">{{ $item->status == true ? 'Finished' : 'Unfinished' }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="card-title">Priority:</h6>
                                        @if ($item->priority == 1)
                                            <p class="card-text">High</p>
                                        @elseif ($item->priority == 2)
                                            <p class="card-text">Average</p>
                                        @elseif ($item->priority == 3)
                                            <p class="card-text">Low</p>
                                        @else
                                            <p class="card-text">Non Priority</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-end me-2">
                                    <p class="mb-1" style="color: #d3d2d2;font-size:13px">{{ $item->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    {{-- Modal to add New Task --}}
    <div class="modal fade" id="newTaskModal" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title " id="staticBackdropLabel">Add New Task</h5>
                </div>
                <form action="/task/store" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="10" rows="2" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="0">Unfinished</option>
                                <option value="1">Finished</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="priority">Priority</label>
                            <select name="priority" id="priority" class="form-select" required>
                                <option value="1">High</option>
                                <option value="2">Average</option>
                                <option value="3">Low</option>
                                <option value="0">Non Priority</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary px-4" data-bs-ripple-init
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info px-4" style="color:white"
                            data-bs-ripple-init>Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal to edit Task --}}
    <div id="divModal"></div>

@endsection
