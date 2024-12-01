<div class="col-lg-3">
    <form action="{{ url('users') }}" method="POST">
        @csrf
        @method('POST')
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="2" class="text-center">{{ __('Create New User') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th role="col">{{ __('Name') }}: </th>
                    <td>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name', '') }}"
                            required>
                        @error('name')
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th role="col">{{ __('Code') }}: </th>
                    <td>
                        <input type="number" name="code" id="code"
                            class="form-control @error('code') is-invalid @enderror" value="{{ old('code', '') }}"
                            required>
                        @error('code')
                            <div class="invalid-feedback">{{ $errors->first('code') }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th role="col">{{ __('Branch') }}: </th>
                    <td>
                        <select name="branch" class="form-control" size="1" required>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch }}" @selected(old('branch') == $branch)>{{ $branch }}
                                </option>
                            @endforeach
                        </select>
                        @error('branch')
                            <div class="invalid-feedback">{{ $errors->first('branch') }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th role="col">{{ __('Department') }}: </th>
                    <td>
                        <select name="department" class="form-control" size="1" required>
                            @foreach ($departments as $dept)
                                <option value="{{ $dept }}" @selected(old('department') == $dept)>{{ $dept }}
                                </option>
                            @endforeach
                        </select>
                        @error('department')
                            <div class="invalid-feedback">{{ $errors->first('department') }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th role="col">{{ __('Role') }}: </th>
                    <td>
                        <select name="role" class="form-control" size="1" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role }}" @selected(old('role') == $role)>{{ $role }}
                                </option>
                            @endforeach
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $errors->first('role') }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th role="col">{{ __('Email') }}: </th>
                    <td>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email', '') }}"
                            required>
                        @error('email')
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th role="col">{{ __('Password') }}: </th>
                    <td>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            value="{{ old('password', '') }}" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th role="col">{{ __('Confirm') }}: </th>
                    <td>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            value="{{ old('password_confirmation', '') }}" required>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                        @enderror
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="text-end">
                        <button type="submit" class="btn btn-success">{{ __('Submit') }}</button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</div>
