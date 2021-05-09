<form method="POST" action="{{ request()->routeIs('admin.users.edit') ? route('admin.users.update', ['user' => $user->id]) : route('admin.users.store') }}">
    @if(request()->routeIs('admin.users.edit'))
        @method('PUT')
    @endif
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputFirstName">First Name</label>
            <input type="text" class="form-control" name="first_name" id="exampleInputFirstName" placeholder="Enter first name" value="{{ request()->routeIs('admin.users.edit') ? $user->first_name : "" }}">
            @error('first_name')
            <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputLastName">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="exampleInputLastName" placeholder="Enter last name" value="{{ request()->routeIs('admin.users.edit') ? $user->last_name : "" }}">
            @error('last_name')
            <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputUsername">Username</label>
            <input type="text" class="form-control" name="username" id="exampleInputUsername" placeholder="Enter username" value="{{ request()->routeIs('admin.users.edit') ? $user->username : "" }}">
            @error('username')
            <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email" value="{{ request()->routeIs('admin.users.edit') ? $user->email : "" }}">
            @error('email')
            <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="text" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" value="{{ request()->routeIs('admin.users.edit') ? $user->input_password : "" }}">
            @error('password')
            <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
