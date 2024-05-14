<footer class="main-footer text-xs">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 0.0.1  
        {{ config('app.env', 'production') == 'local' ? '(Development Mode)':'' }}
    </div>
    <span>Copyright &copy; {{date('Y')}} <a href="#" class="text-bold">{{$brand_name}}</a></span> All rights reserved.
</footer>
