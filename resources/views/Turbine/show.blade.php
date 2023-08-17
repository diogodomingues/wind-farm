<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of Turbines') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row">
                <div class="col mb-2">
                    <a href="{{route('turbine.new')}}" class="btn btn-sm btn-outline-success float-end" role="button"><i class="bi bi-pencil-square"></i> New</a>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Location</th>
                                <th scope="col">Size</th>
                                <th scope="col">N. Components</th>
                                <th scope="col">N. Inspections</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->location}}</td>
                                <td>{{$row->size}}</td>
                                <td>{{count($row->components)}}</td>
                                <td>{{count($row->inspections)}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a href="{{route('turbine.edit', $row->id)}}" class="btn btn-sm btn-outline-warning" role="button"><i class="bi bi-pencil-square"></i> Edit</a>
                                        </div>
                                        |
                                        <div class="col">
                                            <form action="{{route('turbine.delete', $row->id)}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete" />
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>