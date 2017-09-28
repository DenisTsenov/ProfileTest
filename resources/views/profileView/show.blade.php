@extends('layouts.app')

@section('content')

<div class="card m-t-30">
    @if(Session::has('success'))
        <div class="notification is-success">{{ Session::get('success') }}</div>
    @endif
    <div class="columns">
        <div class="column">
            <a href="{{ route('index') }}" class="button is-medium is-info is-primary is-pulled-right">Home</a>
            <h1 class="title ">User Name : {{ $profile->first_name }} {{  $profile->last_name }}</h1>
            <hr>
            <a href="{{ route('edit', $profile->id) }}" class="button is-medium is-primary is-pulled-right">Edit</a>

            <form method="POST" action="{{ route('destroy', $profile->id) }}">
                <input type="submit" class="button is-medium del is-danger is-primary is-pulled-right" value="Delete">
                <input type="hidden" name="_token" value="{{ Session::token() }}"> 
                {{ method_field('DELETE') }}
            </form>

        </div>
    </div>

    <div class="columns">
        <div class="column">

            <div class="card-content">
                <div class="field">
                    <label for="fname">First Name</label>
                    <pre> {{ $profile->first_name }}</pre>
                </div>
            </div>

            <div class="card-content">
                <div class="field">
                    <label for="lname">Last Name</label>
                    <pre> {{ $profile->last_name }} </pre>
                </div>
            </div>

            <div class="card-content">
                <div class="field">
                    <label for="wnumber">Work number</label>
                    <pre>{{ $profile->work_number }}</pre>
                </div>
            </div>

            <div class="card-content">
                <div class="field">
                    <label for="pnumber">Personal number</label>
                    <pre>{{ $profile->private_number }} </pre>
                </div>
            </div>

            <div class="card-content">
                <div class="field">
                    <label for="created">Created at</label>
                    <pre> {{ $profile->created_at }} </pre>
                </div>
            </div>

            <div class="card-content">
                <div class="field">
                    <label for="updated">Updated at</label>
                    <pre>{{ $profile->updated_at }}</pre>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

