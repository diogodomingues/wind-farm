<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inspection Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('inspection.edit', $result->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="turbine_id" class="form-label">Turbine</label>
                            <select class="form-select" aria-label="Default select example" id="turbine_id" name="turbine_id" required>
                                @foreach($turbines as $row)
                                <option value="{{$row->id}}" {{$row->id == $result->turbine_id ? 'selected' : ''}}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3">{{$result->description}}</textarea>
                        </div>
                        <a href="{{route('inspection.get')}}" class="btn btn-sm btn-outline-danger" role="button"><i class="bi bi-pencil-square"></i>Cancel</a>
                        @if(auth()->user()->inspector == true)
                        <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>