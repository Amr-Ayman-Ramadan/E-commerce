<div class="form-body">
    <h4 class="form-section"><i class="la la-tag"></i> Role Information</h4>

    <div class="form-group">
        <label for="role_en">Role English</label>
        <input type="text" id="role_en" class="form-control border-primary" placeholder="Admin, Editor, etc." name="role[en]"
            value="{{ old('role.en', isset($role) ? $role->getTranslation('role', 'en') : '') }}">
        @error('role.en')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="role_ar">Role Arabic</label>
        <input type="text" id="role_ar" class="form-control border-primary" placeholder="مدير, محرر, إلخ" name="role[ar]"
            value="{{ old('role.ar', isset($role) ? $role->getTranslation('role', 'ar') : '') }}">
        @error('role.ar')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<h4 class="form-section"><i class="la la-key"></i> Permissions</h4>
<div class="form-group">
    <div class="row">
        @php
            $currentLocale = app()->getLocale();
            $permissionsConfig = config("permissions_{$currentLocale}");
            $oldPermissions = old('permissions', isset($role) ? $role->permissions : []);
        @endphp

        @foreach($permissionsConfig as $key => $permission)
            <div class="col-md-3 col-sm-6">
                <div class="form-check">
                    <input type="checkbox"
                           class="form-check-input"
                           id="permission-{{ $key }}"
                           name="permissions[]"
                           value="{{ $key }}"
                           @if(in_array($key, $role->permissions ?? [])) checked @endif>
                    <label class="form-check-label" for="permission-{{ $key }}">
                        {{ $permission }}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
    @error('permissions')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-actions right">
    <button type="button" class="btn btn-warning mr-1" onclick="window.history.back();">
        <i class="ft-x"></i> Cancel
    </button>
    <button type="submit" class="btn btn-primary">
        <i class="la la-check-square-o"></i> Save
    </button>
</div>
