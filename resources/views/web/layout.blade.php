<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield("title")</title>
    @include("web.header.meta")
   
</head>
<body class="bg-light ">
    <section>
       @yield("navigations")
    </section>
    
    <!-- body -->
    <section>
        @yield("content")
    </section>
    
    <!-- footer -->
    <section>
        @include("web.footer")
    </section>

    <!-- drop down -->
    <section>
        @include("web.dropdowns") 
    </section>
     
    <!-- script -->
    <section>
        @include("web.script")
    </section>

</body>
</html>

