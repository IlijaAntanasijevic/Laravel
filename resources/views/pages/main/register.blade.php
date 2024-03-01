@extends('layouts.layout')

@section('title') Register @endsection

@section('content')

    <div class="login-1">
        <div class="container-fluid ">
            <div class="col-lg-12 row flex-column align-items-center pt-5" style="background-color: #fff7f7">
                <a href="{{route('home')}}" class="logo">
                    <img src="{{asset('assets/img/logos/logo.png')}}" alt="logo">
                </a>
                <h3>Create An Cccount</h3>
            </div>
            <div class="row login-box">
                <div class="col-lg-12 align-self-center pad-0 form-section register-section">
                    <div class="form-inner form-register">
                        <form action="#" method="GET" enctype="multipart/form-data">
                            @csrf
                           <div class="row justify-content-around">
                               <div class="register-block">
                                   <x-text-field
                                       name="userName"
                                       type="text"
                                       placeholder="Name"
                                       id="userName"
                                       parent-class="clearfix"
                                       field-class="form-control"/>

                                   <x-text-field
                                       name="userEmail"
                                       type="email"
                                       placeholder="Email"
                                       id="userEmail"
                                       parent-class="clearfix"
                                       field-class="form-control"/>

                                   <x-text-field
                                       name="userCity"
                                       type="text"
                                       placeholder="City"
                                       id="userCity"
                                       parent-class="clearfix"
                                       field-class="form-control"/>
                                   <x-text-field
                                       name="userPhone"
                                       type="number"
                                       placeholder="Phone | +1234567890"
                                       id="userPhone"
                                       parent-class="clearfix"
                                       field-class="form-control"/>
                               </div>
                               <div class="register-block">
                                   <x-text-field
                                       name="userLastname"
                                       type="text"
                                       placeholder="Last name"
                                       id="userLastname"
                                       parent-class="clearfix"
                                       field-class="form-control"/>
                                   <x-text-field
                                       name="userPassword"
                                       type="password"
                                       placeholder="Password"
                                       id="userPassword"
                                       parent-class="clearfix"
                                       field-class="form-control"/>

                                   <x-text-field
                                       name="userAddress"
                                       type="text"
                                       placeholder="Address"
                                       id="userAddress"
                                       parent-class="clearfix"
                                       field-class="form-control"/>

                                   <div class="clearfix ">
                                       <input type="file" name="userAvatar" id="userAvatar" style="display:none" />
                                       <label for="userAvatar" class="form-control pt-3" id="userAvatarLabel" style="cursor: pointer">Upload Profile Picture</label>
                                        <p id="userAvatarName"></p>
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
        $('#userAvatar').change(function () {
            let path = $(this).val();
            let file = path.split('\\').pop();
            $('#userAvatarLabel').text(file);
        });
    </script>
@endsection


