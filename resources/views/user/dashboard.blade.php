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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newTaskModal">
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
                <div class="card">
                    <div class="card-header">Quote</div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source
                                    Title</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal to add New Task --}}
    <div class="modal fade" id="newTaskModal" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add New Task</h5>
                    <button type="button" class="btn-close" data-bs-ripple-init data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">...</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-ripple-init
                        data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-mdb-ripple-init>Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection
