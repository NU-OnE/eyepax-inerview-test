<div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" readonly="readonly" name="name" class="form-control" id="name" aria-describedby="name" value="{{$employee->name}}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" readonly="readonly" name="email" class="form-control" id="email" aria-describedby="email" value="{{$employee->email}}">
    </div>
    <div class="mb-3">
        <label for="telephone" class="form-label">Contact Number</label>
        <input type="text" readonly="readonly" name="telephone" class="form-control" id="telephone" aria-describedby="telephone" value="{{$employee->telephone}}">
    </div>
    <div class="mb-3">
        <label for="working_route" class="form-label">Working Route</label>
        <select readonly="readonly" class="form-control" name="working_route" id="working_route">
            <option value="">{{$employee->working_route}}</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="joined_date" class="form-label">Joined Date</label>
        <input readonly="readonly" type="text" name="joined_date" class="form-control" id="joined_date" aria-describedby="joined_date" value="{{$employee->joined_date}}">
    </div>
    <div class="mb-3">
        <label for="manager_comment" class="form-label">Manager Comment</label>
        <textarea readonly="readonly" class="form-control" name="manager_comment" id="manager_comment" cols="30" rows="10">{{$employee->manager_comment}}</textarea>
    </div>
</div>
