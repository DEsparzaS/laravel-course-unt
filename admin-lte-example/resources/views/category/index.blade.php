@extends('layout.main')
@section('title', 'List Categories')
@section('content')
    <div class="mx-5 my-1 d-flex justify-content-between align-items-center">
        <h1>List Categories</h1>
        <a class="btn btn-success " href="{{ route('category.create') }}">Add Category</a>
    </div>
    <div class="p-5">
        <form action="" class="mb-5 d-flex" method="GET">
            <input class="form-control mr-3" name="description" id="txtSearch" placeholder="Type to search..."
                value="{{ $description }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
        @if (session('alert'))
            <div id="message" class="alert alert-{{ session('alert')['type'] }} alert-dismissible fade show"
                role="alert">
                {{ session('alert')['message'] }}
                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Description</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!count($categories))
                        <tr>
                            <td colspan="3">No categories</td>
                        </tr>
                    @else
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm mr-2"
                                        href="{{ route('category.edit', $category->id) }}">
                                        <i class="fa fa-edit"></i>
                                        Edit</a>
                                    <a class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                        Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
@endsection
@section('script')
    <script>
        setTimeout(() => {
            document.querySelector('#message').remove();
        }, 10000);
    </script>
@endsection
