@extends('admin.layouts.news')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-1 mb-3">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-block btn-primary">Submit</a>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th colspan="3" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td class="text-center"><a href="{{ route('admin.users.show', $user->id) }}"><i class="far fa-eye"></i></a></td>
                                    <td class="text-center"><a href="{{ route('admin.users.edit', $user->id) }}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.users.destroy', $user->id) }}"
                                              method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="border-0 bg-transparent">
                                                <i class="fas fa-trash text-danger" role="button"></i>
                                              </button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-outline status-change-btn" data-user-id="{{ $user->id }}">
                                            @if($user->status === \App\Enums\UserStatus::$registered)
                                                <i class="fa fa-lock"></i>
                                            @else
                                                <i class="fa fa-lock-open"></i>
                                            @endif
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('scripts')
<script>
    $('.status-change-btn')
        .click(function(e) {
            let userId = $(this).data('user-id');

            let isUserBanned = $(this).find("i:first").hasClass('fa-lock-open');

            $.ajax("/admin/users/change-status/" + userId, {
                type: "get",
                beforeSend: () => {
                    if(isUserBanned) {
                        $(this).find('i').removeClass('fa-lock-open').addClass('fa-lock');
                    } else {
                        $(this).find('i').removeClass('fa-lock').addClass('fa-lock-open');
                    }
                }
            });
        })
</script>
@endsection
