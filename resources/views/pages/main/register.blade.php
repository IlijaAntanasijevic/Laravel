@extends('layouts.layout')

@section('title') Register @endsection

@section('content')

    @php
        $firstNameError = $errors->get('name')[0] ?? null;
        $lastNameError = $errors->get('lastName')[0] ?? null;
        $emailError = $errors->get('email')[0] ?? null;
        $passwordError = $errors->get('password')[0] ?? null;
        $cityError = $errors->get('city')[0] ?? null;
        $addressError = $errors->get('address')[0] ?? null;
        $phoneError = $errors->get('phone')[0] ?? null;
        $avatarError = $errors->get('avatar')[0] ?? null;


    @endphp

    @if(session('tmp'))
        @dd(session('tmp'))
    @endif
    <div class="login-1">
        <div class="container-fluid ">
            <div class="col-lg-12 row flex-column align-items-center pt-5" style="background-color: #fff7f7">
                <a href="{{route('home')}}" class="logo">
                    <img src="{{asset('assets/img/logos/logo.png')}}" alt="logo">
                </a>
                <h3>Create An Account</h3>
            </div>
            @if(session("error"))
                <div class="alert alert-danger my-5 w-75 mx-auto">
                    <p class="text-center h3 ">{{session("error")}}</p>
                </div>
            @endif
            <div class="row login-box">

                <div class="col-lg-12 align-self-center pad-0 form-section register-section">

                    <div class="form-inner form-register">
                        <form action="{{route('register.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                           <div class="row justify-content-around">
                               <div class="register-block">
                                   <x-text-field
                                       name="name"
                                       type="text"
                                       placeholder="Name"
                                       id="userRegName"
                                       parent-class="clearfix"
                                       field-class="form-control"
                                       :error="$firstNameError"
                                       :value="old('name')"/>

                                   <x-text-field
                                       name="email"
                                       type="email"
                                       placeholder="Email"
                                       id="userRegEmail"
                                       parent-class="clearfix"
                                       field-class="form-control"
                                       :error="$emailError"
                                       :value="old('email')"/>

                                   <x-text-field
                                       name="city"
                                       type="text"
                                       placeholder="City"
                                       id="userRegCity"
                                       parent-class="clearfix"
                                       field-class="form-control"
                                       :error="$cityError"
                                       :value="old('city')"/>
                                   <x-text-field
                                       name="phone"
                                       type="number"
                                       placeholder="Phone | 0601234567"
                                       id="userRegPhone"
                                       parent-class="clearfix"
                                       field-class="form-control"
                                       :error="$phoneError"
                                       :value="old('phone')"/>
                               </div>
                               <div class="register-block">
                                   <x-text-field
                                       name="lastName"
                                       type="text"
                                       placeholder="Last name"
                                       id="userRegLastName"
                                       parent-class="clearfix"
                                       field-class="form-control"
                                       :error="$lastNameError"
                                       :value="old('lastName')"/>
                                   <x-text-field
                                       name="password"
                                       type="password"
                                       placeholder="Password"
                                       id="userRegPassword"
                                       parent-class="clearfix"
                                       field-class="form-control"
                                       :error="$passwordError"
                                       :value="old('password')"/>

                                   <x-text-field
                                       name="address"
                                       type="text"
                                       placeholder="Address"
                                       id="userRegAddress"
                                       parent-class="clearfix"
                                       field-class="form-control"
                                       :error="$addressError"
                                       :value="old('address')"/>

                                   <div class="clearfix ">
                                       <input type="file" name="avatar" id="userRegAvatar" style="display:none" />
                                       <label for="userRegAvatar" class="form-control pt-3" id="userAvatarLabel" style="cursor: pointer">Upload Profile Picture</label>
                                        <p id="userAvatarName"></p>
                                       <small>Your profile picture is not required</small>
                                       @if($avatarError)
                                           <p class="text-danger"> {{ $avatarError }}</p>
                                        @endif
                                   </div>
                               </div>
                           </div>


                            <div class="form-group w-25 mx-auto mt-5">
                                <button type="submit" class="btn-theme btn-md w-100">Register</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>

                        <div class="clearfix"></div>
                        <p>Already a member?  <a href="{{route('login')}}" class="thembo"> Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_links')

    <style>
        #userAvatarLabel {
            -webkit-user-select: none; /* Safari */
            -ms-user-select: none; /* IE 10 and IE 11 */
            user-select: none; /* Standard syntax */
        }
        #userAvatarLabel::after {
            position: relative;
            content: 'Choose File';
            padding: 10px ;
            color: white;
            margin-left: 10px;
            background-color: red;
        }
    </style>
@endsection

@section('custom_scripts')

    <script>
        $('#userRegAvatar').change(function () {
            let path = $(this).val();
            let file = path.split('\\').pop();
            $('#userAvatarLabel').text(file);
        });
    </script>
@endsection


