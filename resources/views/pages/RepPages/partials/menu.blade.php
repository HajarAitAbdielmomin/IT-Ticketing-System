
<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('images/helpdesk.png') }}" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list" id="menu">
                        <li >
                            <a class="js-arrow" href="{{ url('firstPage') }}">
                                <i class="fas fa-home"></i>Home</a>
                        
                        </li>
                        <li >
                            <a href="{{ url('/getAccount/'.request()->session()->get('id'))}}">
                            <i class="zmdi zmdi-account"></i>Profile</a>
                        </li>
                        <li >
                            <a href="{{ url('getTickets') }}">
                            <i class="fas fa-copy"></i>Tickets </a>
                            
                        </li>

                        <li >
                            <a href="{{ url('openedT') }}">
                            <i class="fa fa-folder-open"></i>Opened tickets</a>
                        </li>
                        
                        <li >
                            <a href="{{ url('closedT') }}">
                            <i class="fa fa-folder"></i>Closed tickets</a>
                        </li>

                        <li class="has-sub ">
                            <a class="js-arrow" href="{{ url('cliReplies') }}">
                                <i class="fas fa-copy"></i>Clients replies</a>
                          
                        </li>
                     
                    </ul>
                </nav>
            </div>
        </aside>