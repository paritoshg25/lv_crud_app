

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <x-success-status class="mb-4" :status="session('message')" /> --}}
            <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg" style="
            padding: 1rem;">
                <form action="{{ $student->id == null ? url('/form') :  url('/form/'. $student->id) }}" method="post">
                    @csrf
                    @isset($student->id)  {{ method_field('PUT')}} @endisset 
                    <!-- Student Name -->
                    <div class="form-field">
                        <x-label for="name" :value="__('Student Name')" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name', $student->name) }}" autofocus />
                    </div>
                    @if($errors ->has('name'))
                        <p class="text-danger" role="alert">
                            *{{$errors->first('name')}}
                        </p>
                    @endif

                    <!-- Email Address -->
                    <div class="form-field">
                        <x-label for="email" :value="__('Email')" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$student->email}}" autofocus />
                    </div>
                    @if($errors ->has('email'))
                        <p class="text-danger" role="alert">
                            *{{$errors->first('email')}}
                        </p>
                    @endif

                    <!-- Phone -->
                    <div class="form-field">
                        <x-label for="phone" :value="__('Phone')" />
                        <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" value="{{$student->phone}}" maxlength="10" autofocus />
                    </div>
                    @if($errors ->has('phone'))
                        <p class="text-danger" role="alert">
                            *{{$errors->first('phone')}}
                        </p>
                    @endif

                    <!-- Address -->
                    <div class="form-field">
                        <x-label for="address" :value="__('Address')" />
                        <x-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{$student->address}}" autofocus />
                    </div>
                    @if($errors ->has('address'))
                        <p class="text-danger" role="alert">
                            *{{$errors->first('address')}}
                        </p>
                    @endif


                    <!-- Gender -->
                    <div class="form-field">
                        <x-label for="gender" :value="__('Gender')" />
                        {{-- <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus /> --}}
                        <input type="radio" name="gender" id="male" value="0" {{ ($student->gender == '0')? 'checked': '' }}> &nbsp;Male &nbsp;
                        <input type="radio" name="gender" id="female" value="1" {{ ($student->gender == '1')? 'checked':'' }}> &nbsp;Female<br>
                    </div>
                    @if($errors ->has('gender'))
                        <p class="text-danger" role="alert">
                            *{{$errors->first('gender')}}
                        </p>
                    @endif
                    
                    <!-- Country -->
                    <div class="form-field">
                        <x-label for="country" :value="__('Country')" />
                        <select name="country" id="country" style="width:200px; font-size:16px;">
                            <option value="">Select Country</option>
                            <option value="1" {{ ($student->country == '1')? "selected" : "" }}>India</option>
                            <option value="2" {{ ($student->country == '2')? "selected" : "" }}>US</option>
                            <option value="3" {{ ($student->country == '3')? "selected" : "" }}>UK</option>
                            <option value="4" {{ ($student->country == '4')? "selected" : "" }}>Canada</option>
                            <option value="5" {{ ($student->country == '5')? "selected" : "" }}>Sri-Lanka</option>
                        </select><br>
                    </div>
                    @if($errors ->has('country'))
                        <p class="text-danger" role="alert">
                            *{{$errors->first('country')}}
                        </p>
                    @endif
                    
                    <!-- Hobby -->
                    @php
                        $hobbies= explode(',', $student->hobby);
                    @endphp
                    <div class="form-field"> 
                        <x-label for="hobby" :value="__('Hobby')" /> 
                        <input type="checkbox" name="hobby[]" value="reading" id="reading" @foreach ($hobbies as $hobby) @if($hobby == 'reading' ) checked @endif @endforeach> Reading Book
                        <input type="checkbox" name="hobby[]" value="cooking" id="cooking" @foreach ($hobbies as $hobby) @if($hobby == 'cooking' ) checked @endif @endforeach> Cooking<br>
                        <input type="checkbox" name="hobby[]" value="travelling" id="travelling" @foreach ($hobbies as $hobby) @if($hobby == 'travelling' ) checked @endif @endforeach> Travelling
                        <input type="checkbox" name="hobby[]" value="coding" id="coding" @foreach ($hobbies as $hobby) @if($hobby == 'coding' ) checked @endif @endforeach> Coding<br>
                    </div>
                    @if($errors ->has('hobby'))
                        <p class="text-danger" role="alert">
                            *{{$errors->first('hobby')}}
                        </p>
                    @endif
                    
                    @if(isset($student->id))  <x-button class="ml-4"> {{ __('Update') }}  </x-button>
                    @else <x-button class="ml-4"> {{ __('Submit') }}  </x-button>
                    @endif
                    <x-reset class="ml-4">  {{ __('Reset') }}   </x-reset>
                    
                </form>
            </div>
        </div>
    </div>
</x-app-layout>