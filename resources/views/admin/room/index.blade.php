@extends('layouts.Admin.app')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <h4 class="w-100"><i class="fa fa-bullhorn"></i> CAGAYAN STATE UNIVERSITY - APARRI CAMPUS ROOMS</h4>

                <form method="GET" action="{{ route('admin.room.create', ['building_name' => request()->get('building_name')]) }}">
                    @csrf
                    <button type="submit" class="btn btn-flat btn-success" style="margin-bottom: 10px;">
                        <i class="fa fa-check-circle"></i> ADD ROOMS
                    </button>
                    <br>
                    <div class="box-body">
                        <div class='table-responsive'>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Room Id</th>
                                        <th class="text-center">Room Area</th>
                                        <th class="text-center">Room Capacity</th>
                                        <th class="text-center">Doors</th>
                                        <th class="text-center">Windows</th>
                                        <th class="text-center">Room Size</th>
                                        <th class="text-center">Room Use</th>
                                        <th class="text-center">Room Remark</th>
                                        <th class="text-center">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rooms as $room)
                                    <tr>
                                        <td>{{ $room->room_id }}</td>
                                        <td>{{ $room->room_area }}</td>
                                        <td>{{ $room->room_capacity }}</td>
                                        <td>{{ $room->room_door }}</td>
                                        <td>{{ $room->room_window }}</td>
                                        <td>{{ $room->room_size }}</td>
                                        <td>{{ $room->room_use }}</td>
                                        <td>{{ $room->room_remark }}</td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('admin.room.edit', $room->id) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
