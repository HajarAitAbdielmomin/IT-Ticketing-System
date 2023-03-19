

<header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                          
                            <div class="header-button col-sm-4 offset-sm-9">
                                <div class="account-wrap" style="margin-left:40%">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{ asset('images/'.request()->session()->get('image')) }}"  />
                                        </div>
                                        <div class="content ">
                                            <a class="js-acc-btn" >{{ request()->session()->get('fullname') }} </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="{{ asset('images/'.request()->session()->get('image')) }}"  />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a >{{ request()->session()->get('fullname') }}</a>
                                                    </h5>
                                                    <span class="email">{{ Session::get('email') }}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{ url('/getAccount/'.request()->session()->get('id'))}}">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{ url('destroy') }}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
