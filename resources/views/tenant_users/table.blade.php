<div class="table-responsive">
    <table class="table" id="tenantUsers-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Gender</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tenantUsers as $tenantUser)
            <tr>
                <td>{{ $tenantUser->name }}</td>
            <td>{{ $tenantUser->email }}</td>
            <td>{{ $tenantUser->phone }}</td>
            <td>{{ $tenantUser->address }}</td>
            <td>{{ $tenantUser->gender }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['tenantUsers.destroy', $tenantUser->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tenantUsers.show', [$tenantUser->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('tenantUsers.edit', [$tenantUser->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
