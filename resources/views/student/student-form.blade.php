

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(isset($student->id))  {{ __('Update Student') }}
            @else  {{ __('Add Student') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        
        

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <x-success-status class="mb-4" :status="session('message')" /> --}}
            <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg" style="
            padding: 1rem;">
                <form id="form" action="{{ $student->id == null ? route('students.store') :  route('students.update', $student->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @isset($student->id)  {{ method_field('PUT')}} @endisset 
                    
                    <!-- Student Image -->
                    <div class="form-field">
                        <x-label for="profile_image" :value="__('Profile Image')" />
                        {{-- <x-input id="profile_image" class="block mt-1 w-full" type="text" name="student-image" value="{{ old('profile_image', $student->profile_image) }}" autofocus /> --}}
                        {{-- <input type="file" name="profile_image" id="profile_image" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"> --}}
                        <input name="profile_image" id="profile_image" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-900 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file">
                        </div>
                        
                    <span class="error_form text-danger" id="profile_image_error_message"></span>
                    @if($errors ->has('profile_image'))
                        <p class="text-danger" role="alert">
                            *{{$errors->first('profile_image')}}
                        </p>
                    @endif

                    <!-- Student Name -->
                    <div class="form-field">
                        <x-label for="name" :value="__('Student Name')" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name', $student->name) }}" autofocus />
                    </div>
                    <span class="error_form text-danger" id="name_error_message"></span>
                    @if($errors ->has('name'))
                        <p class="text-danger" role="alert">
                            *{{$errors->first('name')}}
                        </p>
                    @endif

                    <!-- Email Address -->
                    <div class="form-field">
                        <x-label for="email" :value="__('Email')" />
                        <x-input id="email" class="block mt-1 w-full" type="text" name="email" value="{{ old('email', $student->email) }}" autofocus />
                    </div>
                    <span class="error_form text-danger" id="email_error_message"></span>
                    @if($errors ->has('email'))
                        <p class="text-danger" role="alert">
                            *{{$errors->first('email')}}
                        </p>
                    @endif

                    <!-- Phone -->
                    <div class="form-field">
                        <x-label for="phone" :value="__('Phone')" />
                        <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" value="{{ old('phone', $student->phone) }}" maxlength="10" autofocus />
                    </div>
                    <span class="error_form text-danger" id="phone_error_message"></span>
                    @if($errors ->has('phone'))
                        <p class="text-danger" role="alert">
                            *{{$errors->first('phone')}}
                        </p>
                    @endif

                    <!-- Address -->
                    <div class="form-field">
                        <x-label for="address" :value="__('Address')" />
                        {{-- <x-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{ old('address', $student->address) }}" autofocus /> --}}
                        <textarea name="address" id="address" rows="5" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" autofocus>{{ old('address', $student->address) }}</textarea>
                    </div>
                    <span class="error_form text-danger" id="address_error_message"></span>
                    @if($errors ->has('address'))
                        <p class="text-danger" role="alert">
                            *{{$errors->first('address')}}
                        </p>
                    @endif


                    <!-- Gender -->
                    <div class="form-field">
                        <x-label for="gender" :value="__('Gender')" />
                        {{-- <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus /> --}}
                        <input type="radio" name="gender" id="gender" value="0" {{ old('gender' , $student->gender ) == '0' ? 'checked': '' }}> &nbsp;Male &nbsp;
                        <input type="radio" name="gender" id="gender" value="1" {{ old ('gender', $student->gender ) == '1'? 'checked':'' }}> &nbsp;Female<br>
                    </div>
                    <span class="error_form text-danger" id="gender_error_message"></span>
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
                            <option value="1" {{ old('country', $student->country ) == '1'? "selected" : "" }}>India</option>
                            <option value="2" {{ old('country', $student->country ) == '2'? "selected" : "" }}>US</option>
                            <option value="3" {{ old('country', $student->country ) == '3'? "selected" : "" }}>UK</option>
                            <option value="4" {{ old('country', $student->country ) == '4'? "selected" : "" }}>Canada</option>
                            <option value="5" {{ old('country', $student->country ) == '5'? "selected" : "" }}>Sri-Lanka</option>
                        </select><br>
                    </div>
                    <span class="error_form text-danger" id="country_error_message"></span>
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
                    <span class="error_form text-danger" id="hobby_error_message"></span>
                    @if($errors ->has('hobby'))
                        <p class="text-danger" role="alert">
                            *{{$errors->first('hobby')}}
                        </p>
                    @endif
                    

                    <div class="form-field"> 
                        @if(isset($student->id))  <x-button class="ml-4"> {{ __('Update') }}  </x-button>
                        @else <x-button class="ml-4"> {{ __('Submit') }}  </x-button>
                        @endif
                            <x-reset class="ml-4">  {{ __('Reset') }}   </x-reset>
                    </div>
                    
                    
                </form>
            </div>
        </div>
    </div>
</x-app-layout>