<div class="profile-section">
    <div class="profile-section-01">
        <a href="#"><button>My profile</button></a>
    </div>
    <div class="profile-details">
        <form method="post" action="{{route('customer.update')}}">
            @method('PATCH')
            @csrf
            <div class="profile-details-01">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{$customer->name}}" required>
                <p style="color: red">@error('name'){{$message}}@enderror</p>
            </div>
            <div class="profile-details-01">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{$customer->email}}" required>
                <p style="color: red">@error('email'){{$message}}@enderror</p>
            </div>
            <div class="profile-details-01">
                <label for="address">Address</label>
                <input type="text" name="address" value="{{$customer->address}}" required>
                <p style="color: red">@error('address'){{$message}}@enderror</p>
            </div>
            <div class="profile-details-01">
                <label for="mobile">Mobile</label>
                <input type="number" name="mobile" value="{{$customer->mobile}}" required>
                <p style="color: red">@error('mobile'){{$message}}@enderror</p>
            </div>
            <div class="profile-details-01">
                <label for="dob">Dob</label>
                <input type="date" name="dob" value="{{$customer->dob}}" required>
                <p style="color: red">@error('dob'){{$message}}@enderror</p>
            </div>
            <div class="profile-details-01">
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>
            <div class="profile-details-button">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
    <div class="profile-delete">
        <h3>Delete your account</h3>
        <form method="post" action="{{route('customer.delete')}}">
            @method('DELETE')
            @csrf
            <button type="submit">Delete</button>
        </form>
    </div>
</div>

@if (session('updated'))
    <div class="alert alert-success">
        {{ session('updated') }}
    </div>
    <script>
        setTimeout(function() {
            $('.alert').fadeOut('fast');
        }, 4000);
    </script>
@endif
