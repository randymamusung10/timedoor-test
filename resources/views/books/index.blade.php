@extends('layouts.main')
@section('title', 'Books')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Books</h1>
    </div>
    
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('books.filter') }}" method="GET" id="form">
        <div class="col-md-5 mb-3">
            <div class="row">
                <div class="col-md-4 text-end">
                    <label for="book_author" class="form-label">List shown : </label>
                </div>
                <div class="col-md-8">
                    <select class="form-select" name="shown" id="shown">
                        @for($i = 0; $i < count($shown); $i++)
                            <option value="{{ $shown[$i] }}" {{ $shown[$i] == request()->shown ? 'selected' : '' }}>{{ $shown[$i] }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
    
        <div class="col-md-5 mb-3">
            <div class="row">
                <div class="col-md-4 text-end">
                    <label for="book_author" class="form-label">Search : </label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="search" id="search" value="{{ request()->search ?? '' }}" placeholder="Search">
                </div>
            </div>
        </div>
    
        <div class="col-md-5 mb-3 text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <div class="table-responsive col-md-12">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" width="40%">Book Name</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Author Name</th>
                    <th scope="col">Average Rating</th>
                    <th scope="col">Voter</th>
                </tr>
            </thead>

            <tbody>
                @if (count($ratings) > 0)
                    @foreach ($ratings as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->book->book_title ?? '-' }}</td>
                            <td>{{ $item->book->category->category_name ?? '-' }}</td>
                            <td>{{ $item->book->author->author_name ?? '-' }}</td>
                            <td>{{ $item->average_rating ?? '0' }}</td>
                            <td>{{ $item->voter ?? '0' }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center p-2">Data Tidak Ditemukan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            {{ $ratings->links() }}
        </div>
    </div>
@endsection