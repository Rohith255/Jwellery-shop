<div class="profile-section">
    <div class="profile-section-01">
        <a href="#"><button>My profile</button></a>
        <a href="#"><button style="background-color: white;color: black">My cart</button></a>
    </div>
    <div class="profile-details">
        <form>
            <div class="profile-details-01">
                <label for="name">Name</label>
                <input type="text" name="customer_name">
            </div>
            <div class="profile-details-01">
                <label for="email">Email</label>
                <input type="email" name="customer_email">
            </div>
            <div class="profile-details-01">
                <label for="address">Address</label>
                <input type="text" name="customer_address">
            </div>
            <div class="profile-details-01">
                <label for="mobile">Mobile</label>
                <input type="tel" name="customer_mobile">
            </div>
            <div class="profile-details-01">
                <label for="password">Passowrd</label>
                <input type="password" name="customer_password">
            </div>
            <div class="profile-details-01">
                <label for="name">Confirm passowrd</label>
                <input type="password" name="customer_confirm_password">
            </div>
            <div class="profile-details-button">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
    <div class="profile-delete">
        <h3>Delete your account</h3>
        <form>
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
</div>
