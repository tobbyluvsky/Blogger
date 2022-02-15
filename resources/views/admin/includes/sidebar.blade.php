<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>



                @if(Session::get('admin_page') == 'dashboard')
                    @php $active = "active" @endphp
                @else
                    @php $active = "" @endphp
                @endif



                <li class="{{$active}}">
                    <a href="{{route('adminDashboard')}}"><i class="la la-dashboard"></i>
                    <span>Dashboard</span>
                    </a>
                </li>

                    @if(Session::get('admin_page') == 'category')
                        @php $active = "active" @endphp
                    @else
                        @php $active = "" @endphp
                    @endif
                <li class="{{$active}}">
                    <a href="{{route('category.index')}}"><i class="la la-list-alt"></i>
                        <span>Categories</span>
                    </a>
                </li>


                    @if(Session::get('admin_page') == 'tag')
                        @php $active = "active" @endphp
                    @else
                        @php $active = "" @endphp
                    @endif
                    <li class="{{$active}}">
                        <a href="{{route('tag.index')}}"><i class="la la-list-alt"></i>
                            <span>Tags</span>
                        </a>
                    </li>
            </ul>
        </div>
    </div>
</div>
