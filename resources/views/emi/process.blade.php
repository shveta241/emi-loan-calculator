@extends('layouts.app')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Process EMI Data</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('emi.process') }}">
            @csrf
            <button type="submit" class="btn btn-success">Process Data</button>
        </form>
    </div>
</div>
@if(isset($emiDetails) && count($emiDetails))
    <div class="card shadow">
        <div class="card-header bg-secondary text-white">
            <h6 class="mb-0">EMI Details</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            @foreach(array_keys((array)$emiDetails[0]) as $col)
                                <th>{{ $col }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($emiDetails as $row)
                            <tr>
                                @foreach((array)$row as $cell)
                                    <td>{{ $cell }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif
@endsection