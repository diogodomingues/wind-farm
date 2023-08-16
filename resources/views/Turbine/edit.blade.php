<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Turbine Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('turbine.update', $result->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$result->name}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Location</label>
                            <input type="text" class="form-control" name="location" value="{{$result->location}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Size</label>
                            <input type="text" class="form-control" name="size" value="{{$result->size}}">
                        </div>
                        <a href="{{route('turbine.get')}}" class="btn btn-sm btn-outline-danger" role="button"><i class="bi bi-pencil-square"></i>Cancel</a>
                        <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>