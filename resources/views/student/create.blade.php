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
                <form action="{{route('add-student')}}" method="post">
                    @csrf
                    
                    <!-- Student Name -->
                    <div class="form-field">
                        <x-label for="name" :value="__('Student Name')" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus />
                    </div>
                    @if($errors ->has('name'))
                        <p class="text-danger" role="alert">
                            *{{$errors->first('name')}}
                        </p>
                    @endif

                    <!-- Email Address -->
                    <div class="form-field">
                        <x-label for="email" :value="__('Email')" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus />
                    </div>
                    @if($errors ->has('email'))
                        <p class="text-danger" role="alert">
                            *{{$errors->first('email')}}
                        </p>
                    @endif

                    <!-- Phone -->
                    <div class="form-field">
                        <x-label for="phone" :value="__('Phone')" />
                        <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" maxlength="10" autofocus />
                    </div>
                    @if($errors ->has('phone'))
                        <p class="text-danger" role="alert">
                            *{{$errors->first('phone')}}
                        </p>
                    @endif

                    <!-- Address -->
                    <div class="form-field">
                        <x-label for="address" :value="__('Address')" />
                        <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" autofocus />
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
                        <input type="radio" name="gender" id="male" value="0"> &nbsp;Male &nbsp;
                        <input type="radio" name="gender" id="female" value="1"> &nbsp;Female<br>
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
                            <option value="1">India</option>
                            <option value="2">US</option>
                            <option value="3">UK</option>
                            <option value="4">Canada</option>
                            <option value="5">Sri-Lanka</option>
                        </select><br>
                    </div>
                    @if($errors ->has('country'))
                        <p class="text-danger" role="alert">
                            *{{$errors->first('country')}}
                        </p>
                    @endif
                    
                    <!-- Hobby -->
                    <div class="form-field">
                        <x-label for="hobby" :value="__('Hobby')" />
                        <input type="checkbox" name="hobby[]" value="reading" id="reading"> Reading Book
                        <input type="checkbox" name="hobby[]" value="cooking" id="cooking"> Cooking<br>
                        <input type="checkbox" name="hobby[]" value="travelling" id="travelling"> Travelling
                        <input type="checkbox" name="hobby[]" value="coding" id="coding"> Coding<br>
                    </div>
                    @if($errors ->has('hobby'))
                        <p class="text-danger" role="alert">
                            *{{$errors->first('hobby')}}
                        </p>
                    @endif
                    
                    <x-button class="ml-4"> {{ __('Submit') }}  </x-button>
                    
                    <x-reset class="ml-4">  {{ __('Reset') }}   </x-reset>
                    
                </form>
            </div>
        </div>
    </div>
</x-app-layout>