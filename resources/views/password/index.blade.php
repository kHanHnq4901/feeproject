@extends ('layouts.app')
@section('content')
    <div class="content">
               <div class="col-md-6">
	                        <div class="card">
							<form class="form-horizontal" method="post" action="{{ route('password.update', $ministry->idMinistry) }}">
								@method('PUT')
                    			@csrf
		                            <div class="card-header">
										<h4 class="card-title">
											Đổi mật khẩu
										</h4>
									</div>
		                            <div class="card-content">
										<div class="form-group">
		                                    <label class="col-md-3 control-label">Nhập mật khẩu cũ</label>
		                                    <div class="col-md-9">
		                                        <input type="password" placeholder="Nhập mật khẩu cũ" class="form-control">
		                                    </div>
		                                </div>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Nhập mật khẩu mới</label>
		                                    <div class="col-md-9">
		                                        <input type="password" placeholder="Nhập mật khẩu mới" class="form-control">
		                                    </div>
                                        </div>
                                        <div class="form-group">
		                                    <label class="col-md-3 control-label">Nhập lại mật khẩu mới</label>
		                                    <div class="col-md-9">
		                                        <input type="password" name="password" placeholder="Nhập lại mật khẩu mới" class="form-control">
		                                    </div>
		                                </div>
									</div>  
									<div class="card-footer">
										<div class="form-group">
											<label class="col-md-3"></label>
											<div class="col-md-9">
												@if (Session::exists('error'))
												<div class="alert alert-danger">
													{{ Session::get('error.message') }}
												</div>
											@endif
												<button type="submit" class="btn btn-fill btn-info">
													Cập nhật
												</button>
											</div>
										</div>
									</div>
								</form>
	                    	</div> <!-- end card -->
	                	</div> <!--  end col-md-6  -->
	                        
            </div>
            
@endsection