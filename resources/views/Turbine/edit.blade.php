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

    @if(count($components) > 0)
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneComponents" aria-expanded="true" aria-controls="collapseOne">
                                    Turbine Components
                                </button>
                            </h2>
                            <div id="collapseOneComponents" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Lv. Damage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($components as $row)
                                            <tr>
                                                <td>{{$row['id']}}</td>
                                                <td>{{$row['name']}}</td>
                                                <td>{{$row['description']}}</td>
                                                <td>{{$row['level_damage']}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    
    @if(count($inspections) > 0)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneInspections" aria-expanded="true" aria-controls="collapseOne">
                                    Turbine Inspections
                                </button>
                            </h2>
                            <div id="collapseOneInspections" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Author</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($inspections as $row)
                                            <tr>
                                                <td>{{$row->id}}</td>
                                                <td>{{$row->user->name ?? ''}}</td>
                                                <td>{{$row->description}}</td>
                                                <td>{{Carbon\Carbon::parse($row->created_at)->format('Y-m-d')}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>