<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Inspection') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('inspection.create')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="turbine_id" class="form-label">Turbine</label>
                            <select class="form-select" aria-label="Default select example" id="turbine_id" name="turbine_id" required>
                                <option selected disabled value="">---</option>
                                @foreach($result as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="5" required minlength="10"></textarea>
                        </div>
                        <a href="{{route('inspection.get')}}" class="btn btn-sm btn-outline-danger" role="button"><i class="bi bi-pencil-square"></i>Cancel</a>
                        <button type="submit" class="btn btn-outline-primary btn-sm">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>