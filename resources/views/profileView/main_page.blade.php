@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('flash_message'))
        <div class="notification is-success">{{ Session::get('flash_message') }}</div>
    @endif
    <div class="columns">
        <div class="column">
            <h1 class="title is-pulled-right">List of Profiles</h1>
        </div>
        <div class="column">
            <a href="{{ route('create') }}" class="button is-primary is-pulled-right">Add New Profile</a>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-content">
            <table class="table is-narrow">
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Work number</th>
                <th>Private number</th>
                <th>Created ad</th>
                <th>Updated at</th>
                <th>Actions</th>
                <th></th>
                 <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php $i=1 ?>
                
                @foreach($profiles as $profile)
                <tr>
                <th><?php echo $i++ ?></th>
                <td>{{ $profile->first_name}}</td>
                <td>{{ $profile->last_name}}</td>
                <td>{{ $profile->work_number}}</td>
                <td>{{ $profile->private_number}}</td>
                <td>{{ $profile->created_at}}</td>
                <td>{{ $profile->updated_at}}</td>
                <td class="has-text-right"><a href="{{ route('show', $profile->id) }}" class="button is-primary  is-outlined">Show</a></td>
                <td class="has-text-right"><a href="{{ route('edit', $profile->id) }}" class="button is-info is-outlined">Edit</a></td>
                
                <td> <form method="POST" action="{{ route('destroy', $profile->id) }}">
                <input type="submit" class="button is-danger is-outlined" value="Delete">
                <input type="hidden" name="_token" value="{{ Session::token() }}"> 
                {{ method_field('DELETE') }}
                </form></td>
                </tr>
                @endforeach
        </tbody>
    </table>
        </div>
    </div>
    {{ $profiles->links() }}
</div>
@endsection
