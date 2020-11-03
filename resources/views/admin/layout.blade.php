<!DOCTYPE html>
<html lang="en">
<head>
    @include("admin.header.meta")
    <title>Document</title>
</head>
<body class="bg-light ">
    <section>
    @include("admin.header.navigation")
    @include("admin.header.side-navigation")
    </section>
    
    <!-- body -->
    <section>
        @yield("content")
    </section>
    
    <!-- footer -->
    <section>
       
    </section>

    <!-- drop down -->
    <section>
       
    </section>
     
    <!-- script -->
    <section>
       @include("admin.script")
    </section>

</body>
</html>

