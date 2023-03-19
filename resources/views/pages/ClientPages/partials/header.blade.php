

   <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="{{asset('images/icon/logo-white.png')}}" alt="" />
                                </a>
                            </div>
                            <div class="header-button2">
                              
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="{{ url('/getAccountCli/'.request()->session()->get('id'))}}">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="{{ url('destroy') }}">
                                                <i class="zmdi zmdi-globe"></i>Logout</a>
                                        </div>
                                      
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
         <!--   <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content col-sm-4 offset-sm-10">                               
                                    <button class="au-btn au-btn-icon au-btn--green">
                                    <a href="#" >  
                                    <i class="zmdi zmdi-plus"></i>add ticket</button>
                                   </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->