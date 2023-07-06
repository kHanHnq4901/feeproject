@extends ('layouts.app')
@section('content')
    <div class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div class="card">
					<form method="post" action="{{ route('profile.update', $ministry->idMinistry) }}">
						@method('PUT')
                    	@csrf
		                            <div class="card-header">
									    <h4 class="card-title">
											Thông tin 
										</h4>
									</div>
		                            <div class="card-content">
	                                    <div class="form-group">
	                                        <label>Địa chỉ email</label>
	                                        <input type="text" disabled name='email' value="{{ $ministry->email }}"  class="form-control">
	                                    </div>
	                                    <div class="form-group">
	                                        <label>Tên</label>
	                                        <input type="text" name='nameMinistry' value="{{ $ministry->fullName}}"  class="form-control">
											@if (Session::exists('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error.message') }}
                    </div>
                @endif
	                                    </div>
	                                   
	                                    <button type="submit" class="btn btn-fill btn-info">Sửa</button>
		                            </div>
							    </form>
	                        </div> <!-- end card -->
                </div>
            </div>
            
@endsection