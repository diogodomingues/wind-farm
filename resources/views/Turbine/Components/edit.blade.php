<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Component Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('component.edit', $result->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$result->name}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3">{{$result->description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="level_damage" class="form-label">Lv. Damage</label>
                            <select class="form-select" aria-label="Default select example" id="level_damage" name="level_damage" required>
                                <option value="1" {{$result->level_damage == 1 ? 'selected' : ''}}>Perfect</option>
                                <option value="2" {{$result->level_damage == 2 ? 'selected' : ''}}>Very Good</option>
                                <option value="3" {{$result->level_damage == 3 ? 'selected' : ''}}>Good</option>
                                <option value="4" {{$result->level_damage == 4 ? 'selected' : ''}}>Bad</option>
                                <option value="5" {{$result->level_damage == 5 ? 'selected' : ''}}>Broken/Missing</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="turbine_id" class="form-label">Turbine</label>
                            <select class="form-select" aria-label="Default select example" id="turbine_id" name="turbine_id" required>
                                @foreach($turbines as $row)
                                <option value="{{$row->id}}" {{$row->id == $result->turbine_id ? 'selected' : ''}}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <a href="{{route('component.get')}}" class="btn btn-sm btn-outline-danger" role="button"><i class="bi bi-pencil-square"></i>Cancel</a>
                        <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>