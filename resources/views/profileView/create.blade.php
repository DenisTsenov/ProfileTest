@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-30">
        <div class="card">
            <div class="card-content">
                <h1 class="title">Create a Profile!</h1> 
                <form action="{{ route('store') }}" id="create-form" method="POST" role='form' data-parsley-validate="">
                    {{ csrf_field() }}
                    <div class="field">
                        <label for="fname" class="label">First Name</label>
                        <p class="control">
                            <input class="input {{ $errors->has('first_name') ? 'is-danger' : '' }} "
                                   type="text" name="first_name" id="fname" placeholder="First name..." 
                                   value="{{ old('first_name') }}"
                                   required="" minlength="3" maxlength="30" pattern="^[a-zA-Z]+$">
                        </p>
                        @if ($errors->has('first_name'))
                        <p class="help is-danger">{{$errors->first('first_name')}}</p>
                        @endif

                    </div>

                    <div class="field">
                        <label for="lname" class="label">Last Name</label>
                        <p class="control">
                            <input class="input  {{ $errors->has('last_name') ? 'is-danger' : '' }}  " 
                                   type="text" name="last_name" id="lname" placeholder="Last name..."
                                   value="{{ old('last_name') }}"
                                   required="" minlength="3" maxlength="30" pattern="^[a-zA-Z]+$">
                        </p>
                        @if($errors->has('last_name'))
                        <p class="help is-danger">{{$errors->first('last_name')}}</p>
                        @endif

                    </div>

                    <div class="field">
                        <label for="wnumber" class="label">Work Number</label>
                        <p class="control">
                            <input class="input {{ $errors->has('work_number') ? 'is-danger' : '' }}  "
                                   type="tel" name="work_number" id="wnumber" placeholder="Add number.."
                                   value="{{ old('work_number') }}" 
                                   required="" minlength="4" maxlength="10" data-parsley-type="number" >
                        </p>
                        @if($errors->has('work_number'))
                        <p class="help is-danger">{{$errors->first('work_number')}}</p>
                        @endif

                    </div>

                    <div class="field">
                        <label for="pnumber" class="label">Private Number</label>
                        <p class="control">
                            <input class="input  {{ $errors->has('private_number') ? 'is-danger' : '' }} " 
                                   type="tel" name="private_number" id="pnumber" placeholder="Add your own number..."
                                   value="{{ old('private_number') }}"
                                   required="" minlength="4" maxlength="10" data-parsley-type="number">
                        </p>
                        @if($errors->has('private_number'))
                        <p class="help is-danger">{{$errors->first('private_number')}}</p>
                        @endif

                    </div>

                    <button class="button is-success is-outlined is-fullwidth m-t-30">Create</button>
                </form>   
            </div><!-- end of th  cardcontent -->

        </div>
        <a href="{{ route('index') }}" class="button is-medium is-info is-primary is-fullwidth m-t-30">Home</a>
    </div>

</div>
@endsection

@section('js')
        <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('js/parsley.min.js') }}"></script>
        <script src="{{ URL::asset('js/ajax.js') }}"></script>
@endsection
