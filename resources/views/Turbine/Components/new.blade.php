<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Component') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('component.create')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="level_damage" class="form-label">Lv. Damage</label>
                            <select class="form-select" aria-label="Default select example" id="level_damage" name="level_damage" required>
                                <option selected disabled value="">---</option>
                                <option value="1">Perfect</option>
                                <option value="2">Very Good</option>
                                <option value="3">Good</option>
                                <option value="4">Bad</option>
                                <option value="5">Broken/Missing</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="turbine_id" class="form-label">Turbine</label>
                            <select class="form-select" aria-label="Default select example" id="turbine_id" name="turbine_id" required>
                                <option selected disabled value="">---</option>
                                @foreach($result as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach 
                            </select>
                        </div>
                        <a href="{{route('component.get')}}" class="btn btn-sm btn-outline-danger" role="button"><i class="bi bi-pencil-square"></i>Cancel</a>
                        <button type="submit" class="btn btn-outline-primary btn-sm">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
