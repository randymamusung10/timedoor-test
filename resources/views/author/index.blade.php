@extends('layouts.main')
@section('title', 'Author')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Author</h1>
    </div>

    <div class="table-responsive col-lg-8" >
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Author Name</th>
                    <th scope="col">Voter</th>
                </tr>
            </thead>

            <tbody>
                @if (count($ratings) > 0)
                    @foreach ($ratings as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->book->author->author_name ?? '-' }}</td>
                            <td>{{ $item->voter ?? '-' }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" class="text-center p-2">Data Tidak Ditemukan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="col-lg-8">
        <div class="d-flex justify-content-end">
            {{ $ratings->links() }}
        </div>
    </div>
@endsection