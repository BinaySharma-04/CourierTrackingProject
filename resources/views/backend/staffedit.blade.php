<h2>edit Staff</h2>
<form id="addStaffForm" action="/editstaff/{{$c->id}}" method="POST">
    @csrf
    <label for="staffId">Staff ID:</label><br>
    <input type="text" id="staffId" value="{{$c->id}}" ><br>

    <label for="staffName">Name:</label><br>
    <input type="text" id="staffName" name="name" value="{{$c->name}}" required><br>

    <label for="staffAddress">Address:</label><br>
    <input type="text" id="staffAddress" name="address" value="{{$c->address}}" required><br>

    <label for="staffEmail">Email:</label><br>
    <input type="email" id="staffEmail" name="email" value="{{$c->email}}" required><br>

    <label for="staffPhone">Phone:</label><br>
    <input type="tel" id="staffPhone" name="phone" value="{{$c->phone_num}}" required><br>

    <button type="submit">Addd Staff</button>
</form>