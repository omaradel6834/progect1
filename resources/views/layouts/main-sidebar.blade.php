<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            @include('layouts.main-sidebar.admin-main-sidebar')
            @if (auth('web')->check())
              
            @endif
            @include('layouts.main-sidebar.student-main-sidebar')
            @if (auth('student')->check())
              
            @endif 
            @include('layouts.main-sidebar.teacher-main-sidebar')
            @if (auth('teacher')->check())
               
            @endif
            @include('layouts.main-sidebar.parent-main-sidebar')
            @if (auth('parent')->check())
              
            @endif 

        </div>

        <!-- Left Sidebar End-->

        <!--=================================
