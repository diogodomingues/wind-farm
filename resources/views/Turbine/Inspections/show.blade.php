<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of Inspections') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row">
                <div class="col mb-2">
                    @if(auth()->user()->inspector == true)
                    <a href="{{route('inspection.new')}}" class="btn btn-sm btn-outline-success float-end" role="button"><i class="bi bi-pencil-square"></i> New</a>
                    @endif
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Turbine</th>
                                <th scope="col">Author</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->turbine->name ?? ''}}</td>
                                <td>{{$row->user->name ?? ''}}</td>
                                <td>{{$row->description}}</td>
                                <td>
                                    <div class="row">
                                        @if(auth()->user()->inspector == true)
                                        <div class="col-sm-3">
                                            <a href="{{route('inspection.edit', $row->id)}}" class="btn btn-sm btn-outline-warning" role="button"><i class="bi bi-pencil-square"></i> Edit</a>
                                        </div>
                                        |
                                        <div class="col">
                                            <form action="{{route('inspection.delete', $row->id)}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete" />
                                            </form>
                                        </div>
                                        @else
                                        <div class="col-sm-3">
                                            <a href="{{route('inspection.edit', $row->id)}}" class="btn btn-sm btn-outline-warning" role="button"><i class="bi bi-pencil-square"></i> View</a>
                                        </div>
                                        @endif
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