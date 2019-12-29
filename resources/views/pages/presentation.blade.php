@extends('layout')
@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <?php
                $message = Session::get('message');
                /**
                 * 1. Nếu message tồn tại thì in ra bên dưới, còn không thì thôi
                 * 2. Cho message hiển thị 1 lần duy nhất bằng cách  dùng Session::get('message', null)
                 */
                if ($message) {
                    // echo $message;
                    echo '<div class="alert alert-success" role="alert">'
                            .$message.'<a href="http://www.thinkpad.com.vn/" style="color: #D10024"><i>Come back home</i></a>
                        </div>';
                    Session::put('message',null);
                }
                ?>
        </div>
        <!-- /row -->
        <div class="section">
            <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vTcTzHkPNxkqIO3RbPyOKd8h7Fx8w39ddcO_LcpD9CyCB4Gpzo6soni4JZBei4rLi1CJVeLZsU9BE2N/embed?start=false&loop=false&delayms=30000" frameborder="0" width="1155" height="690" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection