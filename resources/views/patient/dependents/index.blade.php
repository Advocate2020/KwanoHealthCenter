@extends('layouts.patient')

@section('content')
    <div class="row pb-4">
        <div class="col-12 d-flex justify-content-between align-items-baseline">
            <h1 class="p-b-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-diagram-3-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zm-6 8A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm6 0A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm6 0a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1z"/>
                </svg>MY DEPENDENTS</h1>
            <a class="btn btn-primary" href="/patient/{{auth()->user()->id}}/dependents/create">Add Dependent</a>
        </div>
    </div>

    @if($dependents->isEmpty())
        <div class="row" style="display:block">
            <div class="col-md-12 col-md-offset-5">
                <div class="nomembers">
                    <div class="text-center empty" role="dialog" aria-modal="true" style="color: white">
                        <div class="swal-title" style="">Sorry</div>
                        <div class="swal-text" style="">
                            Sorry, you have not added any dependents yet.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif($dependents->isNotEmpty())
        <div class="table-responsive bg-white">
            <table class="table table-bordered table-hover">
                <caption>List of dependents</caption>
                <thead>
                <tr>
                    <th scope="col" class="">#</th>
                    <th scope="col">Dependent Name</th>
                    <th scope="col">Dependent Surname</th>
                    <th scope="col">Dependent Cellphone</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dependents as $depend)
                    <tr>
                        <th scope="row">{{$depend->dependentID}}</th>
                        <td>
                            {{ $depend->name}}
                        </td>
                        <td>
                            {{ $depend->surname}}
                        </td>
                        <td>
                            {{ $depend->phone}}
                        </td>
                        <td class="d-flex">
                            <a href="{{ route('dependent.show', ['user' => auth()->user()->id,'dependent' => $depend->dependentID]) }}" class="btn btn-primary btn-sm px-3">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('dependent.delete', ['user' => auth()->user()->id,'dependent' => $depend->dependentID]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm px-3"  onclick="archiveFunction()">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach

            </table>
        </div>
    @endif
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        function archiveFunction() {
            event.preventDefault(); // prevent form submit
            var form = event.target.form; // storing the form
            sweetAlert({
                    title: "Are you sure?",
                    text: "You will not be able to revert this action.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel please!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        form.submit();          // submitting the form when user press yes
                    } else {
                        swal("Cancelled", "Phew that was close :)", "error");
                    }
                });
        }
    </script>
@endsection


