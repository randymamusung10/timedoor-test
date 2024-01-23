@extends('layouts.main')
@section('title', 'Insert Rating')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Insert Rating</h1>
    </div>

    @if (session()->has('danger'))
        <div class="alert alert-danger col-lg-12" role="alert">
            {{ session('danger') }}
        </div>
    @endif

    <form action="{{ route('rating.store') }}" method="POST" id="form">
        @csrf

        <div class="col-lg-6 mb-3">
            <div class="row">
                <div class="col-md-3 text-end">
                    <label for="author_id" class="form-label">Book Author : </label>
                </div>
                <div class="col-md-9">
                    <select class="form-select" name="author_id" id="author_id">
                        <option selected disabled> == Select Book Author ==</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->author_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 mb-3">
            <div class="row">
                <div class="col-md-3 text-end">
                    <label for="book_id" class="form-label">Book Name : </label>
                </div>
                <div class="col-md-9">
                    <select class="form-select" name="book_id" id="book_id">
                        <option selected disabled> == Select Book Name ==</option>
                    </select>
                </div>
            </div>
        </div>
        
    
        <div class="col-lg-6 mb-3">
            <div class="row">
                <div class="col-md-3 text-end">
                    <label for="rating" class="form-label">Rating : </label>
                </div>
                <div class="col-md-9">
                    <select class="form-select" name="rating" id="rating">
                        <option selected disabled> == Select Rating ==</option>
                        @for($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
    
        <div class="col-lg-6 mb-3 text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#author_id').change(function () {
                let selectedAuthorId = $(this).val();

                $.ajax({
                    url: "{{ route('rating.filterBooks') }}",
                    method: 'GET',
                    data: { 
                        author_id: selectedAuthorId 
                    },
                    success: function (response) {
                        console.log(response);

                        if (response.length > 0) {
                            $('#book_id').empty().append('<option value="all"> == Select Book Name ==</option>');
                            $.each(response, function (index, book) {
                                $('#book_id').append('<option value="' + book.id + '">' + book.book_title + '</option>');
                            });
                        } else {
                            alert('Book not found');
                        }
                        
                        
                    },
                    error: function (error) {
                        alert(error.responseText);
                    }
                });
            });
        });
    </script>
@endpush