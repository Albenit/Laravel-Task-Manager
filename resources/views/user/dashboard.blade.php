@extends('includes.app')
@section('title', 'Dashboard')
@section('content')
    @extends('includes.header')
    <div class="col-sm-12 col col-lg-6 mx-auto">
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
                @foreach ($tasks as $item)
                    <div class="mb-2">
                        <div class="card">
                            <div class="card-header">{{ ucFirst($item->title) }}</div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <h6 class="card-title">Description:</h6>
                                    <p class="card-text">{{ Illuminate\Support\Str::limit($item->description, 100, '...') }}</p>
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
                        </div>
                    </div>
                @endforeach
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

@endsection
