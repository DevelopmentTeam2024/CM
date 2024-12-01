<div class="col-lg-3">
    <form action="{{ url('projects') }}" method="POST">
        @csrf
        @method('POST')
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="2" class="text-center">{{ __('Create New Project') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th role="col">{{ __('Project Name') }}: </th>
                    <td>
                        <input type="text" name="project_name" id="name"
                            class="form-control @error('project_name') is-invalid @enderror" value="{{ old('project_name', '') }}"
                            required>
                        @error('project_name')
                            <div class="invalid-feedback">{{ $errors->first('project_name') }}</div>
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
