<div class="sidebar" data-background-color="brown" data-active-color="danger">
    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | brown"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="{{asset('assets')}}/img/khanh.jpg" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        <span>
                            Chào {{ Session::get('nameStudent') }}
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li>
                            <a href="">
                                    <i class="ti-user"></i>
                                     Thông tin cá nhân
                                </a>
                            </li>
                            <li>
                                <a href="{">
                                    <i class="ti-settings"></i>
                                        Đổi mật khẩu
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
             <ul class="nav">
                <li class="active">
                <a  href="">
                        <i class="ti-money"></i>
                        <p> Nộp Học phí</p>
                    </a>
                </li>
                <li class="active">
                    <a href="{{ route('logout') }}" class=" btn-magnify">
                        <i class="ti-arrow-circle-left"></i>
                        <p> Đăng xuất </p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
