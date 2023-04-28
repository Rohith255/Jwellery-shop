<div class="profile-section">
    <div class="profile-section-01">
        <a href="#"><button>My profile</button></a>
        <a href="#"><button style="background-color: white;color: black">My cart</button></a>
    </div>
    <div class="profile-details">
        <form method="post" action="{{route('customer.update')}}">
            @method('PUT')
            @csrf
            <div class="profile-details-01">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{$customer->name}}" required>
            </div>
            <div class="profile-details-01">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{$customer->email}}" required>
            </div>
            <div class="profile-details-01">
                <label for="address">Address</label>
                <input type="text" name="address" value="{{$customer->address}}" required>
            </div>
            <div class="profile-details-01">
                <label for="mobile">Mobile</label>
                <input type="number" name="mobile" value="{{$customer->mobile}}" required>
            </div>
            <div class="profile-details-01">
                <label for="dob">Dob</label>
                <input type="date" name="dob" value="{{$customer->dob}}">
            </div>
            <div class="profile-details-01">
                <label for="password">Password</label>
                <input type="password" name="password" value="" required>
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
