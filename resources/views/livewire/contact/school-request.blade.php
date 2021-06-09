<div class="col-12" x-data="schoolReq">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Error!</strong> {{ session('error') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Available Date 1</th>
                    <th>Available Time 1</th>
                    <th>Available Date 2</th>
                    <th>Available Time 2</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr>
                        <td scope="row">{{ $request->contactUs->name }}</td>
                        <td>{{ $request->contactUs->email }}</td>
                        <td>{{ $request->contactUs->phone }}</td>
                        <td>{{ $request->contactUs->ava_date_one }}</td>
                        <td>{{ $request->contactUs->ava_date_two }}</td>
                        <td>{{ $request->contactUs->ava_time_one }}</td>
                        <td>{{ $request->contactUs->ava_time_two }}</td>
                        <td>
                            @if ($request->is_approved)
                                <span class="badge badge-success badge-pill">Approved</span>
                            @elseif ($request->is_rejected)
                                <span class="badge badge-danger badge-pill">Rejected</span>
                            @elseif ($request->is_expired)
                                <span class="badge badge-info badge-pill">School Created</span>
                            @else
                                <span class="badge badge-warning badge-pill">Pending</span>
                            @endif
                        </td>
                        <td>
                            @if ($request->is_approved && !$request->is_expired)
                                <form action="{{ route('addlisting') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="code" value="{{$request->code}}">
                                    <button type="submit" class="btn btn-success">Add School</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@push('scripts')
<script>
    function schoolReq(){
        return {

        }
    }
</script>
@endpush
