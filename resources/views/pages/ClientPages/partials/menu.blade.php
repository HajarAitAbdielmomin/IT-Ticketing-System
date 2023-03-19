
 <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('images/helpdesk.png')}}" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                  
                        <img src="{{asset('images/'.request()->session()->get('image'))}}"  />
                    </div>
                    <h4 class="name">{{ request()->session()->get('fullname')}}</h4>
                    <a href="{{ url('destroy') }}">Sign out</a>
                </div>
                <nav class="navbar-sidebar2">
  
                    <ul class="list-unstyled navbar__list" id="nav">
                        <li >
                            <a class="js-arrow" href="{{ url('homepageCli') }}">
                                <i class="fas fa-home"></i>Home
                            </a>
                           
                        </li> 
                        <li >
                            <a href="{{ url('/getAccountCli/'.request()->session()->get('id'))}}">
                                <i class="zmdi zmdi-account"></i>Profile</a>
                          
                        </li>
                        <li class="">
                            <a href="{{ url('repReplies') }}">
                                <i class="fa fa-bell"></i>Replies</a>
                           
                        </li>
                        <li >
                                    <a href="{{ url('/addTicket') }}">
                                        <i class="fa fa-plus-square"></i>Add ticket</a>
                                </li>
                                <li >
                                    <a href="{{url('OpenedTickets')}}">
                                        <i class="fa fa-folder-open"></i>Opened tickets</a>
                                </li>
                                <li >
                                    <a href="{{ url('ClosedTickets') }}">
                                        <i class="fa fa-folder"></i>Closed tickets</a>
                                </li>
                        <li class="has-sub ">
                            <a class="js-arrow" href="{{url('display') }}">
                                <i class="fa fa-eye"></i>Show tickets
                               
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
       