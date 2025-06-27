<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" class="form-control"
                       placeholder="Admin Full Name" name="name"
                       value="{{ old('name',isset($admin) ? $admin->name : "") }}" required>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control"
                       placeholder="Admin Email" name="email"
                       value="{{ old('email', isset($admin) ?  $admin->email : "") }}" required>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="password">Password </label>
                <input type="password" id="password" class="form-control"
                       placeholder="New Password" name="password">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" class="form-control"
                       placeholder="Confirm New Password" name="password_confirmation" >
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="role_id">Role</label>
                <select id="role_id" class="form-control" name="role_id" required>
                    <option value="">Select Role</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}"
                            {{ (old('role_id', isset($admin) ? $admin->role_id : "") == $role->id ? 'selected' : '' )}}>
                            {{ $role->getTranslation('role', app()->getLocale()) }}
                        </option>
                    @endforeach
                </select>
                @error('role_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" class="form-control" name="status" required>
                    <option value="">Select Status</option>
                    <option value="active" {{ old('status', isset($admin) ? $admin->status : '') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', isset($admin) ? $admin->status : '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="form-actions right">
    <button type="button" class="btn btn-warning mr-1" onclick="window.history.back();">
        <i class="ft-x"></i> Cancel
    </button>
    <button type="submit" class="btn btn-primary">
        <i class="la la-check-square-o"></i> save
    </button>
</div>
