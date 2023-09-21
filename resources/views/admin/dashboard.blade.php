@extends('template')
@section('content')

<div class="container mt-5">
    <table id='tblUserList' class="table table-striped">
        <thead>
            <tr>
                <th width="10%">{{ __('label.admin.user_list.sno') }}</th>
                <th width="30%">{{ __('label.admin.user_list.email') }}</th>
                <th width="20%">{{ __('label.admin.user_list.referral_key') }}</th>
                <th width="15%">{{ __('label.admin.user_list.current_position') }}</th>
                <th width="15%">{{ __('label.admin.user_list.referrers') }}</th>
                <th width="10%">{{ __('label.admin.user_list.actions') }} </th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection

@push('child-template-scripts')

    $(function() {
        var dtUserList = $('#tblUserList').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.dashboard') }}",
           
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'referral_key',
                    name: 'referral_key'
                },
                {
                    data: 'current_position',
                    name: 'current_position',
                    orderable: true,
                    searchable: false,
                    className: 'dt-center'
                },
                {
                    data: 'referrers',
                    name: 'referrers',
                    orderable: false,
                    searchable: false,
                    className: 'dt-center'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        //delete a user
        $('#tblUserList').on('click', '.btn', function() {
            var data = dtUserList.row($(this).parents('tr')).data();
            $.ajax({
                method: 'POST',
                url: URL + '/user/delete',
                dataType: 'json',
                data: {
                    'user': data.id,
                },
                success: function(data, status, xhr) {
                    if (data.error != undefined) {
                        alert('Some error occurred...');
                    } else {
                        dtUserList.ajax.reload();
                    }
                },
                error: function(jqXhr, textStatus, errorMessage) {
                    alert('Some error occurred...');
                }
            });
        });
    });
    @endpush