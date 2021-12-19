<!-- Modal -->
<div style="margin-top: 240px" class="modal fade" id="modalComment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Thông báo</h4>
            </div>
            <div class="modal-body">
                <span class="text-success">Gửi bình luận thành công!</span>
                <br>
                Vui lòng chờ phê duyệt!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal Login -->


<!-- Modal -->
<div class="modal fade" id="my-Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body auth-login">
        <h2 class="text-center" style="font-weight:600">Xin chào</h2>
        <h4  class="text-center title-h4">Đăng nhập để tiếp tục trải nghiệm được trọn vẹn hơn nhé!</h4>
        <div class="form-group input-group-lg">
            <input class="form-control input-login" type="email" id="name" placeholder="Email">
        </div>
        <div class="form-group input-group-lg">
            <input class="form-control input-login" id="password" type="password" placeholder="Mật khẩu">
        </div>
        <div class="form-group input-group-lg">
            <input style="vertical-align: top" type="checkbox" id="remember" checked value="true">
            <label for="remember" >Nhớ tôi</label>
            <a href="#" class="forgot-password"><strong>Quên mật khẩu?</strong></a>
        </div>
        <div class="form-group input-group-lg">
            <button  class="form-control btn-primary btn-login btn-login-submit">Đăng nhập</button >
        </div>
        <div class="login-bottom">
            <h4 class="text-center">hoặc đăng nhập bằng</h4>
            <div class="text-center">
                <a href="#">
                    <img class="icon-facebook"  src="{{ asset('/images/facebook.png') }}">
                </a>
                <a href="#">
                    <img class="icon-google" src="{{ asset('/images/google.png') }}">
                </a>
            </div>
            <h4 class="text-center mt-5">Bạn chưa có tài khoản?<a  href="#" data-toggle="modal" data-target="#my-Register"> <strong class="btn-login-now">Đăng ký ngay!</strong></a></h4>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal Register -->


<!-- Modal -->
<div class="modal fade" id="my-Register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body auth-login">
                <h2 class="text-center" style="font-weight:600">Đăng ký thành viên</h2>
                <h4  class="text-center title-h4">Chào mừng gia nhập cộng đồng người dùng tindoisong.tk!</h4>
                <div class="form-group input-group-lg">
                    <input class="form-control input-login" type="text" id="username" placeholder="Họ Tên">
                </div>
                <div class="form-group input-group-lg">
                    <input class="form-control input-login" type="text" id="email" placeholder="Email">
                </div>
                <div class="form-group input-group-lg">
                    <input class="form-control input-login" type="password" id="password_register" placeholder="Mật khẩu">
                </div>
                <div class="form-group input-group-lg">
                    <input class="form-control input-login" type="password" id="password_register_re" placeholder="Nhập lại mật khẩu">
                </div>
                <div class="form-group input-group-lg" style="display: flex">
                    <input style="vertical-align: top; margin-right: 10px" type="checkbox" id="checkbox_re" >
                    <label style="font-weight: 100" for="checkbox_re">Bằng việc đăng ký tài khoản, bạn đã đồng ý với các <strong><a href="#">Điều khoản</a></strong> trên website của tindoisong.tk</label>
                </div>
                <div class="form-group input-group-lg">
                    <button  class="form-control btn-primary btn-login btn-register-submit">Đăng ký tài khoản</button >
                </div>
                <div class="login-bottom">
                    <h4 class="text-center">hoặc đăng nhập bằng</h4>
                    <div class="text-center">
                        <a href="#">
                            <img class="icon-facebook"  src="{{ asset('/images/facebook.png') }}">
                        </a>
                        <a href="#">
                            <img class="icon-google" src="{{ asset('/images/google.png') }}">
                        </a>
                    </div>
                    <h4 class="text-center mt-5">Bạn đã có tài khoản?<a  href="#" data-toggle="modal" data-target="#my-Modal"> <strong class="btn-register-now">Đăng nhập ngay!</strong></a></h4>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #my-Modal {
        font-family: Roboto, sans-serif;

    }
    .auth-login {
        padding: 50px;
    }
    .title-h4 {
        margin-bottom: 40px;
        margin-top: 35px;
        font-size: 16px;
    }
    .input-login {
        font-size: 15px !important;
    }
    .forgot-password {
        float: right;
    }
    .login-bottom {
        margin-top: 30px;
    }
    .login-bottom .icon-facebook,.login-bottom .icon-google {
        width: 35px;
        margin: 10px;
    }
    .auth-login h2 ,.auth-login h4,.login-bottom h4{
        font-family: Roboto, sans-serif;
    }
    .btn-login {
        background: #547dbf;
    }
    .login-bottom h4 {
        font-size: 16px;
    }
    .btn-login:hover {
        background: #547dbf;
        opacity: 0.9;
    }
</style>



<div class="modal fade" id="myModal">
    <div class="baoz123" id="baoz1234">
        <center>
            <div class="contain">
                <svg onclick="hideFunction()" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg>
                <div class="contain1">
                    <h1>Xin chào</h1>
                    <p>Đăng nhập để tiếp tục trải nhiệm trọn vẹn hơn nhé!</p>
                    <div class="asdfsw1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                        <input class="email-sig-in" type="email" id="name" placeholder="Email/Tên đăng nhập"><br>
                    </div>
                    <div class="asdfsw1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z" />
                        </svg><input class="pass-sig-in" id="password" type="password" placeholder="Mật khẩu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" onclick="MyFunction()" class="bi bi-eye btn-show-pass" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                        </svg>
                    </div>
                    <ul class="remember-fogot">
                        <li style="float: left"><a class="text-12" href=""><input type="checkbox" id="remember" checked value="true"> nhớ tôi</a></li>
                        <li style="float: right"><a class="text-123" href=""> Quên mật khẩu?</a></li>
                    </ul>
                    <button class="button login__submit btn-login">
                        <span class="button__text">Đăng Nhập</span>

                    </button>
                    <p style="text-align: center; margin: 10px;">hoặc đăng nhập bằng</p>
                    <ul class="remember-fogot1">
                        <li class="cach-nhau-ra1">
                            <button class="btn-login-with">
                                <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                    </svg></a>
                            </button>
                        </li>
                        <li class="cach-nhau-ra">
                            <button class="btn-login-with">
                                <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                    </svg></a>
                            </button>
                        </li>
                    </ul>
                    <p>bạn chưa có tài khoản?<a style="text-decoration: none; cursor: pointer; font-weight:600" onclick="nextFunction()"> Đăng kí ngay!</a> </p>
                </div>
            </div>
        </center>
    </div>
    <div class="baoz1234" id="baoz123">

        <center>
            <div class="contain">
                <svg onclick="hideFunction()" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg>
                <div class="contain1">
                    <h1>Xin chào</h1>
                    <p>Đăng nhập để tiếp tục trải nhiệm trọn vẹn hơn nhé!</p>
                    <div class="asdfsw1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                        <input class="email-sig-in" type="text" id="username" placeholder="Tên đăng nhập"><br>
                    </div>
                    <div class="asdfsw1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                        <input class="email-sig-in" type="email" id="email" placeholder="Email"><br>
                    </div>
                    <div class="asdfsw1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z" />
                        </svg><input class="pass-sig-in" type="password" id="password_register" placeholder="Mật khẩu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" onclick="MyFunction()" class="bi bi-eye btn-show-pass" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                        </svg>
                    </div>
                    <div class="asdfsw1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z" />
                        </svg><input class="pass-sig-in" type="password" id="password_register_re" placeholder="Nhập lại mật khẩu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" onclick="MyFunction()" class="bi bi-eye btn-show-pass" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                        </svg>
                    </div>
                    <ul class="remember-fogot">
                        <li>
                            <p class="text-12" href=""><input type="checkbox" id="checkbox_re" checked> Khi bấm tạo tài khoản bạn đã <a style="text-decoration: none; color: orangered;" href="">đồng ý</a> với <br>quy định của chúng tôi</p>
                        </li>

                    </ul>
                    <button class="button login__submit btn-register">
                        <span class="button__text">Tạo tài khoản</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                    <p style="text-align: center; margin-top: 15px;">hoặc đăng nhập bằng</p>
                    <ul class="remember-fogot1">
                        <li class="cach-nhau-ra1">
                            <button class="btn-login-with">
                                <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                    </svg></a>
                            </button>
                        </li>
                        <li class="cach-nhau-ra">
                            <button class="btn-login-with">
                                <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                    </svg></a>
                            </button>
                        </li>
                    </ul>
                    <p>bạn đã có tài khoản?<a style="text-decoration: none; cursor: pointer;" onclick="nextFunction1()"> Đăng nhập ngay!</a> </p>
                </div>
            </div>
        </center>
    </div>
</div> -->
<script>

    $(document).ready(function(){

        $('.btn-show-pass').click(function(){
            var type =  $(this).prev().attr('type');
            $(this).prev().attr('type', type === 'password' ? 'text' : 'password')

        });

        $('.btn-register-now').click(function (){
            $('#my-Register').modal('hide');
        });

        $('.btn-login-now').click(function (){
            $('#my-Modal').modal('hide');
        });
    });



    function hideFunction() {
        $('#myModal').modal('hide');
    }

    function nextFunction() {
        document.getElementById("baoz123").style.display = "block";

        document.getElementById("baoz1234").style.display = "none";
    }


</script>
<style>
    .button:hover{
        background-color: #e0e0e0 !important;

    }
    .btn-login-with:hover{
        background-color: #e0e0e0 !important;
    }
    .modal {
        z-index: 9999999;
    }

    .baoz123 {
        display: none;
    }

    .bi-caret-right-square {
        margin-left: 100px;
    }

    .remember-fogot1 {
        display: flex;
        margin-left: -5px;
        list-style: none;
    }

    .login__submit:active,
    .login__submit:focus,
    .login__submit:hover {
        outline: none;
        border-bottom-color: #6A679E;
    }

    .login__submit {
        background: #fff;
        font-size: 14px;
        margin-top: 30px;
        padding: 16px;
        border-radius: 26px;
        border: 1px solid #D4D3E8;
        text-transform: uppercase;
        font-weight: 400;
        display: flex;
        align-items: center;
        width: 100%;
        color: #4C489D;
        box-shadow: 0px 2px 2px #5C5696;
        cursor: pointer;
        transition: .2s;
    }

    .button__text {
        font-weight: 700;
        margin: 0 auto;

    }

    .email-sig-in {
        border: none;
        border-bottom: 2px solid #D1D1D4;
        background: none;
        padding: 10px;
        padding-left: 24px;
        font-weight: 400;
        width: 89%;
        transition: .2s;
        font-size: 14px;

    }

    .btn-login-with {
        width: 120px;
        height: 30px;
        border-radius: 4px;
        text-decoration: none;
        align-items: center;
        background-color: #e0e0e0;
        border: none;
    }

    .asdfsw1 {
        position: relative;
        margin-top: 10px;
    }

    .email-sig-in:active,
    .email-sig-in:focus,
    .email-sig-in:hover {
        outline: none;
        border-bottom-color: #6A679E;
    }

    .pass-sig-in:active,
    .pass-sig-in:focus,
    .pass-sig-in:hover {
        outline: none;
        border-bottom-color: #6A679E;
    }

    .pass-sig-in {
        border: none;
        border-bottom: 2px solid #D1D1D4;
        background: none;
        padding: 10px;
        padding-left: 24px;
        font-weight: 400;
        width: 89%;
        transition: .2s;
        font-size: 14px;
    }

    .bi-person-circle {
        position: absolute;
        top: 10px;
        color: #7875B5;
    }

    .remember-fogot {
        list-style: none;
        margin-top: 10px;
    }

    .bi-shield-lock-fill {
        position: absolute;
        top: 10px;
        color: #7875B5;
    }

    .text-123 {
        text-decoration: none;
        text-align: end;
        margin-left: 10px;
    }

    .text-12 {
        text-decoration: none;
        margin-left: -25px;

    }

    .contain {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f5f5f5;
        width: fit-content;
        height: auto;
        padding: 40px;
        margin-top: 120px;
        border-radius: 10px;
        animation: title-new ease-in 0.2s;
    }

    @keyframes title-new {
        from {
            opacity: 0;
            transform: scale(0);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .bi-facebook {
        color: blue;
    }


    .cach-nhau-ra {
        margin-left: 20px;
    }

    .bi-x-circle {
        position: absolute;
        right: 5px;
        top: 5px;
        cursor: pointer;

    }

    .bi-x-circle:hover {
        color: rgb(200, 230, 230);
    }

    .contain {
        position: relative;
    }

    .bi-eye {
        top: 15px;
        right: 20px;
        position: absolute;
        cursor: pointer;
    }

    .bi-eye:hover {
        background-color: #f5f5f5;
    }
</style>
