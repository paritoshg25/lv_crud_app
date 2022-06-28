<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student List') }}
        </h2>
    </x-slot>

    <div class="py-12">

        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <x-success-status class="mb-4" :status="session('message')" /> --}}
            <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg" style="
            padding: 1rem;">
                 <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Sr. No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Country</th>
                        <th scope="col">Hobby</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php 
                        $i = 1;
                        $countries = ['', 'India', 'US', 'UK', 'Canada', 'Sri-Lanka'];
                        @endphp
                        @foreach($students as $student)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->address }}</td>
                                <td>{{ ($student->gender == '0')? "Male" : "Female" }}</td>
                                <td>{{ $countries[$student->country] }}</td>
                                <td>{{ $student->hobby }}</td>
                                {{-- <td><a href="student-form/{{ $student->id }}"><button type="submit" class="btn btn-primary">Edit</button></a></td> --}}
                                <td><a href="{{route('students.edit', $student->id)}}"><button type="submit" class="btn btn-primary">Edit</button></a></td>
                                
                                <td> 
                                    {{-- <form action="/student-delete/{{ $student->id }}" method="post"> --}}
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                        {{ method_field('delete') }}
                                        @csrf
                                        <a onclick='return deleteRecord()' class='delete'><button type="submit" class="btn btn-danger">Delete</button></a>
                                    </form>
                                    
                                </td>

                            </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>